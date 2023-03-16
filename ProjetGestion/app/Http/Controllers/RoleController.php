<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{

    private $messagesError =  [
        'nom.required' => 'Veuillez saisir un nom',
        'nom.unique' => 'Ce nom est déjà utilisé.',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('pages.roles.index', compact("roles", "permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createRole()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('pages.roles.createRole', compact("roles", "permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeRole(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("roles", "nom")],
        ], $this->messagesError);

        Role::create($validated);

        return redirect()->route('admin.roles.index')->with('success', 'Role crée avec succès!');
    }

    public function createPermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('pages.roles.createPermission', compact("roles", "permissions"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storePermission(Request $request)
    {
        $validated = $request->validate([
            'nom' => ['required', Rule::unique("permissions", "nom")],
        ], $this->messagesError);
        Permission::create($validated);
        return redirect()->route('admin.roles.index')->with('success', 'Permission crée avec succès!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
