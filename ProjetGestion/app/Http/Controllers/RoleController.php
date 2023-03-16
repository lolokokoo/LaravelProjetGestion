<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
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
        //
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
