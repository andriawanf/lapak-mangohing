<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserList extends Component
{
    public function render()
    {
        $data = [
            'users' => User::with('roles')->get(),
            'roles' => Role::all()
        ];
        return view('livewire.admin.user-list', $data);
    }
}
