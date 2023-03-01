<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

require __DIR__.'/auth.php';


Route::get('/habilitations/utilisateurs',
    [UserController::class, 'index'])
    ->name('utilisateurs.index')
    ->middleware("can:admin"); //On restreint l'acces
