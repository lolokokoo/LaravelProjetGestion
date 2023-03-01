<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use  WithPagination;

    public function index()
    {

        Paginator::useBootstrap();
        $users = User::paginate(10);

        return view('livewire.users.index', [
            "users" => $users,
        ]);
    }

    public function create()
    {
        return view('livewire.users.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', 'email', Rule::unique("users", "email")],
            'telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")],
            'pieceIdentite' => ['required'],
            'sexe' => 'required',
            'numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")],
            'password' => 'required'
        ], [
            'nom.required' => 'Le champ nom est obligatoire.',
            'prenom.required' => 'Le champ prénom est obligatoire.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'Le champ email doit être une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'telephone1.required' => 'Le champ téléphone est obligatoire.',
            'telephone1.numeric' => 'Le champ téléphone doit être un nombre.',
            'telephone1.unique' => 'Ce numéro de téléphone est déjà utilisé.',
            'pieceIdentite.required' => 'Le champ pièce d\'identité est obligatoire.',
            'sexe.required' => 'Le champ sexe est obligatoire.',
            'numeroPieceIdentite.required' => 'Le champ numéro de pièce d\'identité est obligatoire.',
            'numeroPieceIdentite.unique' => 'Ce numéro de pièce d\'identité est déjà utilisé.',
            'password.required' => 'Le champ mot de passe est obligatoire.'
        ]);


        User::create($validated);

        return redirect()->route('admin.habilitations.users.index');
    }
}
