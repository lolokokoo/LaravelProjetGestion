<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{
    use  WithPagination;

    private $defaultPassword = "password";

    private $messagesError =  [
        'nom.required' => 'Le champ nom est obligatoire.',
        'prenom.required' => 'Le champ prénom est obligatoire.',
        'email.required' => 'Le champ email est obligatoire.',
        'email.email' => 'Le champ email doit être une adresse email valide.',
        'email.unique' => 'Cette adresse email est déjà utilisée.',
        'telephone1.required' => 'Le champ téléphone est obligatoire.',
        'telephone1.unique' => 'Ce numéro de téléphone est déjà utilisé.',
        'pieceIdentite.required' => 'Le champ pièce d\'identité est obligatoire.',
        'sexe.required' => 'Le champ sexe est obligatoire.',
        'numeroPieceIdentite.required' => 'Le champ numéro de pièce d\'identité est obligatoire.',
        'numeroPieceIdentite.unique' => 'Ce numéro de pièce d\'identité est déjà utilisé.',
        'password.required' => 'Le champ mot de passe est obligatoire.'
    ];

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
            'telephone1' => ['required', Rule::unique("users", "telephone1")],
            'pieceIdentite' => ['required'],
            'sexe' => 'required',
            'numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")],
            'password' => 'required'
        ], $this->messagesError);


        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès!');
    }

    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            abort(404, 'User not found.');
        }
        return view('livewire.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => ['required', 'email', Rule::unique("users", "email")->ignore($id)],
            'telephone1' => ['required', Rule::unique("users", "telephone1")->ignore($id)],
            'pieceIdentite' => ['required'],
            'sexe' => 'required',
            'numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")->ignore($id)],
            'password' => 'required'
        ], $this->messagesError);

        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        User::where('id', $id)->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur édité avec succès!');
    }


    public function delete($id)
    {
        User::destroy($id);
        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès!');
    }

    /**
     * This function reset the password of an user
     *
     * @param $id
     *
     */
    public function editPassword($id)
    {
        $user = User::find($id);
        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        $user->password = (Hash::make($this->defaultPassword));
        $user->save();
        return redirect()->route('admin.users.edit', ['id' => $id])->with('success', 'Mot de passe réinitialisé avec succes!');
    }

}
