<?php

namespace App\Http\Livewire;

use App\Models\Permission;
use App\Models\Role;
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

    public $rolesPermissions = [];



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
        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        $user = User::find($id);

        $IdsRolesUser = $user->roles->pluck('id')->toArray(); //Ids des roles de l'user dans un tableau

        $IdsPermissionsUser = $user->permissions->pluck('id')->toArray(); //Ids des permissions de l'user dans un tableau

        $this->rolesPermissions["roles"] = [];
        $this->rolesPermissions["permissions"] = [];

        $this->setArrayRolesPermissions($IdsRolesUser, $IdsPermissionsUser);

        return view('livewire.users.edit', [
            'user' => $user,
            'rolesPermissions' => $this->rolesPermissions
        ]);
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
        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        User::destroy($id);
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
        if (!User::find($id)) {
            abort(404, 'User not found.');
        }
        $user = User::find($id);
        $user->password = (Hash::make($this->defaultPassword));
        $user->save();
        return redirect()->route('admin.users.edit', ['id' => $id])->with('success', 'Mot de passe réinitialisé avec succes!');
    }

    public function editRoles($id, Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find($id);

            $IdsRolesUser = [];
            $IdsPermissionsUser = [];
            //On récupére les ids des checkboxs apres soumission du form
            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'customSwitchRole') === 0) {
                    // Si la clé commence par 'customSwitchRole', cela correspond à un rôle
                    $IdsRolesUser[] = intval(substr($key, strlen('customSwitchRole')));
                } elseif (strpos($key, 'customSwitchPermission') === 0) {
                    // Si la clé commence par 'customSwitchPermission', cela correspond à une permission
                    $IdsPermissionsUser[] = intval(substr($key, strlen('customSwitchPermission')));
                }
            }

            $this->setArrayRolesPermissions($IdsRolesUser, $IdsPermissionsUser);

            return view('livewire.users.edit', [
                'user' => $user,
                'rolesPermissions' => $this->rolesPermissions
            ]);
        }
        else{
            return redirect()->route('home');
        }
    }

    /**
     * This function allow us to fill the array rolesPermissions
     *
     * @param $IdsRolesUser
     * @param $IdsPermissionsUser
     * @return void
     */
    private function setArrayRolesPermissions($IdsRolesUser, $IdsPermissionsUser):void
    {
        $toutLesNomsDeRoles = Role::all()->pluck('nom')->toArray();
        $toutLesIdsDeRoles = Role::all()->pluck('id')->toArray();
        $toutLesNomsDePermissions = Permission::all()->pluck('nom')->toArray();
        $toutLesIdsDePermissions = Permission::all()->pluck('id')->toArray();

        $this->rolesPermissions["roles"] = [];
        $this->rolesPermissions["permissions"] = [];

        foreach ($toutLesIdsDeRoles as $roleId){
            if (in_array($roleId, $IdsRolesUser)){
                array_push($this->rolesPermissions["roles"], ["role_id" => $roleId, "role_nom" => $toutLesNomsDeRoles[$roleId - 1], "checked" => true]);
            }else{
                array_push($this->rolesPermissions["roles"], ["role_id" => $roleId, "role_nom" => $toutLesNomsDeRoles[$roleId - 1], "checked" => false]);
            }
        }

        foreach ($toutLesIdsDePermissions as $permissionId){
            if (in_array($permissionId, $IdsPermissionsUser)){
                array_push($this->rolesPermissions["permissions"], ["permission_id" => $permissionId, "permission_nom" => $toutLesNomsDePermissions[$permissionId - 1], "checked" => true]);
            }else{
                array_push($this->rolesPermissions["permissions"], ["permission_id" => $permissionId, "permission_nom" => $toutLesNomsDePermissions[$permissionId - 1], "checked" => false]);
            }
        }
    }
}
