<?php

use Illuminate\Support\Str;

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
function contains($container, $contenu):bool
{
    return Str::contains($container, $contenu);
}


function setMenuClass($route, $classe):string
{
    $routeActuelle = request()->route()->getName();
    if (contains($routeActuelle, $route)){
        return $classe;
    }
    return "";
}function setMenuActive($route):string
{
    $routeActuelle = request()->route()->getName();
    if ($routeActuelle === $route){
        return 'active';
    }
    return "";
}
