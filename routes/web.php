<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Laravel\Mcp\Enums\Role;

//Public Routes

Route::get("/",IndexController::class,);
Route::get("/contact",ContactController::class);


Route::get('/job',[JobController::class,"index"]);

Route::resource('tags',TagController::class);

Route::get('/signup', action: [AuthController::class,'showSignupForm'])->name('signup');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');


Route::post('/signup', action: [AuthController::class,'signup']);

Route::post('/login', action: [AuthController::class, 'login']);

Route::post('/logout', action: [AuthController::class,'logout'])->name('logout');


//Protected Routes
Route::middleware('auth')->group(function(){
    Route::resource('blog',PostController::class);
    Route::resource('comments',controller: CommentController::class);

});

Route::middleware('onlyMe')->group(function(){
    Route::get("/about",AboutController::class);
});
