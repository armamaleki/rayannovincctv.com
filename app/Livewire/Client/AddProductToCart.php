<?php

namespace App\Livewire\Client;

use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class AddProductToCart extends Component
{

    public $quantity = 1;
    protected $cartService;
    public $product;


    public function mount($product)
    {
        $this->product = $product;
    }

    public function boot(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function negative()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->dispatch('alert', [
                'icon' => 'success',
                'message' => 'انجام شد.'
            ]);
        } else {
            $this->dispatch('alert', [
                'icon' => 'error',
                'message' => 'کم تر از 1 نمیتونی انتخاب کنی'
            ]);
        }
    }

    public function positive()
    {
        if ($this->quantity < 4) {
            $this->quantity++;
            $this->dispatch('alert', [
                'icon' => 'success',
                'message' => 'انجام شد.'
            ]);
        } else {
            $this->dispatch('alert', [
                'icon' => 'error',
                'message' => 'بیشتر از 4 نمیتونی انتخاب کنی!'
            ]);
        }
    }

    public function addProduct()
    {
        if (auth()->check()) {
            Cart::updateOrCreate([
                'user_id' => auth()->id(),
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
            ]);
        } else {
            $sessionId = Session::getId();
            Cart::updateOrCreate([
                'session_id' => $sessionId,
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
            ]);
        }
        $this->dispatch('success');
    }


    public function render()
    {
        return view('livewire.client.add-product-to-cart');
    }
}
