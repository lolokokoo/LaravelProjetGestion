<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProprieteTypeArticleController;
use App\Http\Controllers\RoleController;
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
        "prefix" => "roles",
        "as" => "roles."
    ], function (){
        Route::get("/index", [RoleController::class,'index'])->name("index");

        Route::get('/createRole', [RoleController::class, 'createRole'])->name('createRole');
        Route::post('/storeRole', [RoleController::class, 'storeRole'])->name('storeRole');
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

    Route::group([
        "prefix" => "proprietetypearticle",
        "as" => "proprietetypearticle."
    ], function (){
        Route::get("/show/{type_article_id}", [ProprieteTypeArticleController::class,'show'])->name("show");

        Route::get("/create/{type_article_id}", [ProprieteTypeArticleController::class,'create'])->name("create");
        Route::post("/store", [ProprieteTypeArticleController::class,'store'])->name("store");


        Route::get("/edit/{type_article_id}/{id}", [ProprieteTypeArticleController::class,'edit'])->name("edit");
        Route::post("/update/{id}", [ProprieteTypeArticleController::class,'update'])->name("update");

        Route::get("/delete/{type_article_id}/{id}", [ProprieteTypeArticleController::class,'delete'])->name("delete");
    });

    Route::group([
        "prefix" => "articles",
        "as" => "articles."
    ], function (){
        Route::get('/index', [ArticleController::class,'index'])->name('index');

        Route::get('/create', [ArticleController::class,'create'])->name('create');
        Route::post('/store', [ArticleController::class,'store'])->name('store');

        Route::get('/edit/{id}', [ArticleController::class,'edit'])->name('edit');
        Route::post('/update/{id}', [ArticleController::class,'update'])->name('update');

        Route::get('/delete/{id}', [ArticleController::class,'delete'])->name('delete');
    });
});

Route::group([
    "middleware" => ["auth", "auth.manager"],
    "as" => "manager."
], function (){
    Route::group([
        "prefix" => "locations",
        "as" => "locations."
    ], function (){
        Route::get("/calendrier", [LocationController::class,'calendrier'])->name("calendrier");
        Route::get("/vueGlobale", [LocationController::class,'vueGlobale'])->name("vueGlobale");

        Route::get("/show/{id}", [LocationController::class,'show'])->name("show");
    });

});



