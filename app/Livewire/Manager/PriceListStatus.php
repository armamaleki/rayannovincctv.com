<?php

namespace App\Livewire\Manager;

use App\Models\PriceList;
use Livewire\Component;

class PriceListStatus extends Component
{

    public $status;
    public $priceList;

    public function mount($priceList)
    {
        $this->priceList = PriceList::findOrFail($priceList);
    }

    public function chainge($value)
    {
        $this->priceList->update([
            'status' => $value
        ]);
    }


    public function render()
    {
        return view('livewire.manager.price-list-status');
    }
}
