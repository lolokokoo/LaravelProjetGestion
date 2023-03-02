<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\Utilisateurs;
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


Route::group([
    "middleware" => ["auth", "auth.admin"],
    "as" => "admin."
], function (){
    Route::group([
        "prefix" => "users",
        "as" => "users."
    ], function (){
        Route::get("/index", [Utilisateurs::class,'index'])->name("index");

        Route::get('/create', [Utilisateurs::class, 'create'])->name('create');
        Route::post('/store', [Utilisateurs::class, 'store'])->name('store');

        Route::get('/edit/{id}', [Utilisateurs::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [Utilisateurs::class, 'update'])->name('update');

        Route::get('/delete/{id}', [Utilisateurs::class, 'delete'])->where(['id' => '[0-9]+'])->name('delete');
    });
});



