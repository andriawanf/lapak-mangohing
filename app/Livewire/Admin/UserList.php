<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UserList extends Component
{
    public function render()
    {
        $data = [
            'users' => User::with('roles')->get()
        ];
        return view('livewire.admin.user-list', $data);
    }
}
