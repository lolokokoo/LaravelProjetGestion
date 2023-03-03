<?php

use App\Http\Controllers\TypeArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateursController;
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
        Route::get("/index", [UtilisateursController::class,'index'])->name("index");

        Route::get('/create', [UtilisateursController::class, 'create'])->name('create');
        Route::post('/store', [UtilisateursController::class, 'store'])->name('store');

        Route::get('/edit/{id}', [UtilisateursController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [UtilisateursController::class, 'update'])->name('update');

        Route::get('/delete/{id}', [UtilisateursController::class, 'delete'])->where(['id' => '[0-9]+'])->name('delete');

        Route::get('/editPassword/{id}',[UtilisateursController::class, 'editPassword'])->where(['id' => '[0-9]+'])->name('editPassword');
        Route::post('/editRoles/{id}', [UtilisateursController::class, 'editRoles'])->name('editRoles');
    });

    Route::group([
        "prefix" => "typesarticles",
        "as" => "typesarticles."
    ], function (){
        Route::get("/index", [TypeArticleController::class,'index'])->name("index");

        Route::get("/create", [TypeArticleController::class,'create'])->name("create");
        Route::post("/store", [TypeArticleController::class,'store'])->name("store");

        Route::get("/edit/{id}", [TypeArticleController::class,'edit'])->name("edit");
        Route::post("/update/{id}", [TypeArticleController::class,'update'])->name("update");

        Route::get("/delete/{id}", [TypeArticleController::class,'delete'])->name("delete");

    });
});



