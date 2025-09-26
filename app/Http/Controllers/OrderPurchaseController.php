<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;

//use Cryptommer\Smsir\Classes\Smsir;
use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment as PAY;

class OrderPurchaseController extends Controller
{
//    public function __construct()
//    {
//        $this->smsir = new Smsir();
//    }

    public function purchase(Request $request, Order $order)
    {
        $data = $request->validate([
            'address' => 'required|string|exists:addresses,id',
        ]);
        try {
            $update = $order->update([
                'address_id' => $request->input('address'),
            ]);
            $invoice = new Invoice();
            $invoice->amount($order->total_price);
            $invoice->detail('detail 1', 'detail-2');
            $user = auth()->user();
            $paymentId = md5(uniqid());
            $transaction = $user->transactions()->create([
                'order_id' => $order->id,
                'paid' => $invoice->getAmount(),
                'invoice_details' => $invoice,
                'payment_id' => $paymentId,
            ]);
            $callbackUrl = route('purchase.result', [$order, 'payment_id' => $paymentId]);
            $payment = PAY::callbackUrl($callbackUrl);
            $payment->config('description', 'پرداخت سفارش شماره: ' . $order->order_number);
            $payment->purchase($invoice, function ($driver, $transactionId) use ($transaction) {
                $transaction->transaction_id = $transactionId;
                $transaction->save();
            });
            return $payment->pay()->render();
        } catch (PurchaseFailedException|Exception $exception) {
            $transaction->transaction_result = $exception;
            $transaction->status = 0;
            $transaction->save();
            return to_route('dashboard.');
        }
    }

    public function result(Request $request, Order $order)
    {
        if ($request->missing('payment_id')) {
            return redirect()->route('dashboard.transactions')->with('message',
                [
                    'icon' => 'warning',
                    'text' => 'پرداخت با خطا مواجه شد!!',
                ]);
        }
        $transaction = Transaction::where('payment_id', $request->payment_id)->first();
//        dd($transaction);
        if (empty($transaction)) {
            return redirect()->route('dashboard.transactions')->with('message',
                [
                    'icon' => 'warning',
                    'text' => 'پرداخت با خطا مواجه شد !!',
                ]);
        }

        if ($transaction->user_id <> Auth::id()) {
            return redirect()->route('dashboard.transactions')
                ->with('message',
                    [
                        'icon' => 'warning',
                        'text' => 'پرداخت با خطا مواجه شد!!',
                    ]);
        }
        if ($transaction->order_id <> $order->id) {
            return redirect()->route('dashboard.transactions')
                ->with('message',
                    [
                        'icon' => 'warning',
                        'text' => 'پرداخت با خطا مواجه شد!!',
                    ]);
        }
        if ((string)$transaction->status <> '1') {
            return redirect()->route('dashboard.transactions')->with('message',
                [
                    'icon' => 'warning',
                    'text' => 'پرداخت با خطا مواجه شد!!',
                ]);
        }
        try {
            $receipt = PAY::amount($transaction->paid)
                ->transactionId($request->transaction_id)
                ->verify();
            $transaction->transaction_result = $receipt;
            $transaction->status = '2';
            $transaction->save();
            $order->update([
                'status' => 'paid',
            ]);
            $response = $this->smsir->Send()->Verify($order->user->phone, '827717', array(['name' => 'order_no', 'value' => $order->order_number]));
            return redirect()->route('dashboard.orders')
                ->with('message',
                    [
                        'icon' => 'success',
                        'text' => 'پرداخت با موفقیت انجام شد.',
                    ]);
        } catch (InvalidPaymentException|Exception $exception) {
            if ($exception->getCode() < 0) {
                $transaction->status = '0';
                $transaction->transaction_result = [
                    'message' => $exception->getMessage(),
                    'code' => $exception->getCode()
                ];
                $transaction->save();
                return redirect()->route('dashboard.transactions')
                    ->with('message',
                        [
                            'icon' => 'warning',
                            'text' => 'پرداخت با خطا مواجه شد!!',
                        ]);
            }
        }
    }
}
