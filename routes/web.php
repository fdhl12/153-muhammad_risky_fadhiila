<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;
use Termwind\Components\Dd;

Route::get('/', function () {
    return view('home');
});

// Route::get('register', [UserController::class, 'showRegisterForm'])->name('register');
// Route::post('register', [UserController::class, 'register'])->name('register');

// Route::get('login', [UserController::class, 'showLoginForm'])->name('login');
// Route::post('login', [UserController::class, 'login'])->name('login');

// Route::post('logout', [UserController::class, 'logout'])->name('logout');

Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');

// Rute untuk admin dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('admin/users', UserController::class);
    Route::resource('admin/contents', ContentController::class);
});

// Rute untuk pengguna terotentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

// // Rute untuk tamu (pengguna yang belum terotentikasi)
// Route::get('/', function () {
//     return view('welcome');
// });

// Rute untuk otentikasi (login, register, dll.)
Auth::routes();


Route::get('community', function(){
    return view('community',['title' => 'Community']);
});

Route::resource('contents', ContentController::class);

Route::get('write',[ContentController::class, 'index'])->name('contents.index');


Route::get('app', function(){
    return view('app');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
