<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Component;

class ProductSearch extends Component
{

    public $q  ,$products=[] ;
    public function search()
    {
        return to_route('client.store.index', ['q'=>$this->q]);
    }

    public function render()
    {
        if ($this->q) {
            $this->products = Product::where('status', 'active')->where('name', 'like', '%' . $this->q . '%')->get();
        }else{
            $this->products = [];
        }
        return view('livewire.client.product-search');
    }
}
