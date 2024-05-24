<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home',['title' => 'Home']);
});

Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
Route::post('register', [UserController::class, 'register'])->name('register');

Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('login', [UserController::class, 'login'])->name('login');

Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');



Route::get('community', function(){
    return view('community',['title' => 'Community']);
});

Route::resource('contents', ContentController::class);

Route::get('write',[ContentController::class, 'index'])->name('contents.index');


Route::get('app', function(){
    return view('app');
});
