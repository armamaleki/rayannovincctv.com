<?php

namespace App\Livewire\Manager;

use App\Models\Product;
use Livewire\Component;

class UpdatePrice extends Component
{
    public $product , $price;
    public $updateForm = false;
    public function mount($product)
    {
        $this->product = Product::find($product);
        $this->price = $this->product->price;
    }

    public function edit()
    {
        $this->updateForm = true;
    }

    public function update(){
        $this->product->price = $this->price;
        $this->product->save();
        $this->updateForm = false;
    }

    public function render()
    {
        return view('livewire.manager.update-price');
    }
}
