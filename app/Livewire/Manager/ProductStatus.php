<?php

namespace App\Livewire\Manager;

use App\Models\Product;
use Livewire\Component;

class ProductStatus extends Component
{

    public $status;
    public $product;

    public function mount($product)
    {
        $this->product = Product::findOrFail($product);
    }

    public function chainge($value)
    {
        $this->product->update([
            'status' => $value
        ]);
    }


    public function render()
    {
        return view('livewire.manager.product-status');
    }
}
