<?php

use App\Models\Article;
use App\Models\ProprieteArticle;
use App\Models\TypeArticle;
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
    return view('welcome');
});

Route::get('/articles', function () {
    return Article::with("typeArticle")->get();
});

Route::get('/types', function () {
    return TypeArticle::with("articles")->get();
});

