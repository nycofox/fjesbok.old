<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersDatatable extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.admin.users-datatable', [
            'users' => User::paginate(10),
        ]);
    }
}
