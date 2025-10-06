<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ipe\Sdk\Facades\SmsIr;


use Livewire\Component;
use Spatie\Permission\Models\Role as ROL;

class Login extends Component
{
    public $registerForm = true;
    public $loginForm = false;

    public $phone;
    public $authCode;
    public $code = '';
    public $cart;
    public $cartItems;

    public function register()
    {
        $data = $this->validate([
            'phone' => 'required|digits:11|numeric|regex:/(09)[0-9]{9}/',
        ]);
        $randomNumber = (string)rand(10000, 99999);
//        $randomNumber = '12345';
        $this->authCode = $randomNumber;
        $parameters = [
            [
                "name" => "Code",
                "value" => $randomNumber,
            ]
        ];
        $response = SmsIr::verifySend($this->phone, 192479, $parameters);
        if (User::where('phone', '=', $this->phone)->exists()) {
            $user['password'] = Hash::make($randomNumber);
            $update = User::where('phone', $this->phone)->update($user);
        } else {
            $user = [
                'name' => '',
                'phone' => $this->phone,
            ];
            $user['password'] = Hash::make($randomNumber);
            $create = User::create($user);
            $role = ROL::where('name', 'user')->get();
            $create->assignRole($role);
        }
        $this->registerForm = false;
        $this->loginForm = true;
        $this->dispatch('autofocus');
        $this->dispatch('alert', [
            'icon' => 'success',
            'message' => 'کد ورود با موفقیت ارسال شد'
        ]);
    }

    public function login()
    {
        $registerCode = $this->validate([
            'code' => 'required|digits:5|numeric|same:authCode',
            'authCode' => 'required|digits:5|numeric',
        ]);
        if (User::where('phone', '=', $this->phone)->exists()) {
            $user = User::where('phone', '=', $this->phone)->latest()->first();
            Auth::attempt(array('phone' => $this->phone, 'password' => $registerCode['code']));
            if (!Auth::guest() && Auth::user()->hasRole('superUser')) {
                return redirect('/manager');
            }
            $this->dispatch('alert', [
                'icon' => 'success',
                'message' => 'ورود با موفقیت انجام شد'
            ]);
            if ($this->cart == '1') {
                foreach ($this->cartItems as $item) {
                    $item->update([
                        'user_id' => $user->id,
                        'session_id' => null
                    ]);
                }
                return to_route('checkout');
            } else {
                return to_route('dashboard.index');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
