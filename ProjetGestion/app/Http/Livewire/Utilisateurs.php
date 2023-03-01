<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use  WithPagination;

    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.users.index', [
            "users" => $users,
        ])
            ->extends('layouts.master')
            ->section('contenu');
    }
}
