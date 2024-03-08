<?php

use App\Http\Controllers\PostController;
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
Route::any('/posts/search', [PostController::class, 'search'])->name('posts.search');

Route::put('/posts/{id}', [PostController::class, 'update'] )->name('posts.update');

Route::get('/posts/edit/{id}', [PostController::class, 'edit'] )->name('posts.edit');

Route::delete('/posts/index/{id}', [PostController::class, 'destroy'] )->name('posts.destroy');

Route::get('/posts/index/{id}', [PostController::class, 'show'] )->name('posts.show');

Route::post('/posts/index', [PostController::class, 'store'])->name('posts.store');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');



Route::get('/', function () {
    return view('welcome');
});