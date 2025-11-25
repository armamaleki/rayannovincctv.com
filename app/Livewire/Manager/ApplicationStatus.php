<?php

namespace App\Livewire\Manager;

use App\Models\Application;
use Livewire\Component;


class ApplicationStatus extends Component
{
    public $status;
    public $application;

    public function mount($application)
    {
        $this->application = Application::findOrFail($application);
    }

    public function chainge($value)
    {
        $this->application->update([
            'status' => $value
        ]);
    }
    public function render()
    {
        return view('livewire.manager.application-status');
    }
}
