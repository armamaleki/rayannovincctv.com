<?php

namespace App\Livewire\Client;

use App\Models\Address;
use Livewire\Component;

class AddAddress extends Component
{
    public $showMode = false;
    public $province, $city, $address, $no, $number, $postal_code ;
    public function create()
    {
        $this->showMode = true;
    }

    public function store()
    {
        $data = $this->validate([
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:1000',
            'no' => 'required|string',
            'number' => 'required|string',
            'postal_code' => 'required|string',
        ]);
        $data['user_id']=auth()->user()->id;
        $create = Address::create($data);
        $this->showMode = false;
        return redirect()->route('cart');
    }
    public function render()
    {
        return view('livewire.client.add-address');
    }
}
