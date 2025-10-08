<?php

namespace App\Livewire\Client;

use App\Models\ProjectRequest;
use Livewire\Component;

class RequestProject extends Component
{

    public $name, $phone, $description;

    public function store()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255|min:3',
            'phone' => 'required|string|max:255|min:3',
            'description' => 'required|string|max:500|min:3',
        ]);
        $create = ProjectRequest::create($data);
        $this->reset('name', 'phone', 'description');
        $this->dispatch('alert', [
            'icon' => 'success',
            'message' => 'درخواست شما با موفقیت ارسال شد.'
        ]);

    }

    public function render()
    {
        return view('livewire.client.request-project');
    }
}
