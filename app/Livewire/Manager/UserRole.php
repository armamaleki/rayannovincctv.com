<?php

namespace App\Livewire\Manager;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserRole extends Component
{

    public $role;
    public $user;

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
    }

    public function chainge($value)
    {
        $this->user->syncRoles([$value]);
    }

    public function render()
    {
        $roles = Role::orderBy('id','DESC')->paginate(100);
        $userRole = $this->user;
        return view('livewire.manager.user-role' , compact('roles' , 'userRole'));
    }
}
