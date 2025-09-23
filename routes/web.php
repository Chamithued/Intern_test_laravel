<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

//User routes

Route::get('/register',[UserController::class,'showRegister']);
Route::post('/register', [UserController::class, 'Register']);
Route::get('/login',[UserController::class,'showLogin']);
Route::post('/login', [UserController::class, 'Login']);
Route::post('/logout', [UserController::class, 'Logout']);

Route::middleware('auth')->group(
    function () {
//Post routes
Route::get('/posts', [PostController::class, 'getPosts']);
Route::get('/posts/create', [PostController::class,'create']);
Route::post('/posts', [PostController::class,'post']);
Route::get('/posts/personal', [PostController::class, 'getMyPosts']);
Route::get('/posts/{id}', [PostController::class,'getPost']);
Route::get('/edit/{id}', [PostController::class, 'edit']);
Route::put('/posts/{id}', [PostController::class,'update']);
Route::delete('/posts/{id}', [PostController::class,'delete']);

});




