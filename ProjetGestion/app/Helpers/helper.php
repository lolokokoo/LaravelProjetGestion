<?php

function userFullName()
{
    return auth()->user()->prenom . ' ' . auth()->user()->nom;
}

function userRoles() //retourne les roles de l'user
{
    return auth()->user()->roles()->pluck('nom')->toArray();
}

function getRolesName():string{
    $rolesName = "";
    $i = 0;
    foreach (auth()->user()->roles()->pluck('nom') as $role){
        $rolesName .= $role;
        if ($i < sizeof(auth()->user()->roles()->pluck('nom') )- 1){//on ajoute la virgule sauf au dernier élément
            $rolesName .= ',';
        }
        $i++;
    }
    return $rolesName;
}
