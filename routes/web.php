<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/posts', [ClientController::class, 'getAllPost']);
// Route::get('/posts/{id}', [ClientController::class, 'postById']);
Route::get('/add-post', [ClientController::class, 'addPost']);
Route::get('/update-post', [ClientController::class, 'updatePost']);
Route::get('/delete-post', [ClientController::class, 'deletePost']);

Route::get('/users', [UserController::class, 'getAllUsers']);
Route::get('/add-user', [UserController::class, 'addUser']);
Route::post('/add-user', [UserController::class, 'addUserSubmit'])->name('user.addsubmit');
Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']);

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('checkuser');
Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');

Route::get('/session/get', [SessionController::class, 'getSessionData'])->name('session.get');
Route::get('/session/set', [SessionController::class, 'storeSessionData'])->name('session.store');
Route::get('/session/remove', [SessionController::class, 'deleteSessionData'])->name('session.delete');

Route::get('/posts', [PostController::class, 'getAllPost']);
Route::get('/add-post', [PostController::class, 'addPost']);
Route::post('/add-post', [PostController::class, 'addPostSubmit'])->name('post.addsubmit');
Route::get('/posts/{id}', [PostController::class, 'getPostById'])->name('post.getbyid');
Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('post.delete');
Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('post.edit');
Route::post('/update-post', [PostController::class, 'updatePost'])->name('post.update');

Route::get('/inner-join', [PostController::class, 'innerJoinClasure'])->name('post.innerjoin');
Route::get('/left-join', [PostController::class, 'leftJoinClause'])->name('post.leftjoin');

Route::get('/file', [FileController::class, 'create']);
Route::post('/file', [FileController::class, 'store']);

Route::get('/posting', [PostingController::class, 'index']);
// Route::post('/posting', [PostingController::class, 'store']);