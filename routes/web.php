<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//posts
Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/single/{slug}', [MainController::class, 'show'])->name('single');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.single');
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tags.single');
//Comment
Route::post('comment/{post}', [CommentController::class, 'store'])->name('comment.store');

//Search
Route::get('/search', [SearchController::class, 'index'])->name('search');

//Admin
Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/tags', AdminTagController::class);
    Route::resource('/posts', PostController::class);
});

//User
Route::controller(UserController::class)->middleware('guest')->group(function () {
    Route::get('/register','create')->name('user.register');
    Route::post('/register', 'store')->name('user.store');
    Route::get('/login', 'loginForm')->name('user.login');
    Route::post('/login', 'login')->name('user.login-store');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name( 'user.logout');
});

