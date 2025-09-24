<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\PostApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/

Route::middleware('auth:sanctum')->group(
    function () {
Route::apiResource('posts', PostApiController::class);
        Route::post('logout', [AuthApiController::class, 'logout']);

});

Route::post('register', [AuthApiController::class, 'register']);
Route::post('login', [AuthApiController::class, 'login']);

/*
//protected route
Route::middleware('auth:sanctum')->group(
    function () {
Route::get('posts', [PostApiController::class, 'index']);        // List all posts
Route::get('posts/{post}', [PostApiController::class, 'show']);  // Show single post
Route::post('posts', [PostApiController::class, 'store']);       // Create a new post
Route::put('posts/{post}', [PostApiController::class, 'update']); // Update a post
Route::delete('posts/{post}', [PostApiController::class, 'destroy']); // Delete a post

        Route::post('logout', [AuthApiController::class, 'logout'])->middleware('auth:sanctum');
    });
*/