<?php

use Illuminate\Support\Arr;
use Termwind\Components\Dd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Rute untuk admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // User & Admin
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/create/user', [UserController::class, 'register'])->name('admin.create.user');
    Route::post('/admin/create/user', [UserController::class, 'store'])->name('admin.create.user.store');
    Route::get('/admin/users/{username}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{username}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{username}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{username}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/search', [SearchController::class, 'search'])->name('admin.search');

    // Contents
    Route::get('/admin/contents', [ContentController::class, 'indexAdmin'])->name('admin.contents.index');
    Route::get('/admin/contents/create', [ContentController::class, 'create'])->name('admin.contents.create');
    Route::post('/admin/contents', [ContentController::class, 'store'])->name('admin.contents.store');
    Route::get('/admin/contents/{id}', [ContentController::class, 'show'])->name('admin.contents.show');
    Route::get('/admin/contents/{id}/edit', [ContentController::class, 'edit'])->name('admin.contents.edit');
    Route::put('/admin/contents/{id}', [ContentController::class, 'update'])->name('admin.contents.update');
    Route::delete('/admin/contents/{id}', [ContentController::class, 'destroy'])->name('admin.contents.destroy');

    // Categories
    Route::get('/admin/categories', [CategoryController::class, 'indexAdmin'])->name('admin.categories.index');
    Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('/admin/show/category/{id}', [CategoryController::class, 'showAdmin'])->name('admin.categories.show');
});

// Rute untuk pengguna terotentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [ContentController::class, 'index'])->name('contents.index');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/images', [ImageController::class, 'show'])->name('categories.images');
    // Contents
    Route::get('/mystories', [ContentController::class, 'myStories'])->name('contents.mystories');
    Route::get('/contents/create', [ContentController::class, 'create'])->name('contents.create');
    Route::post('/contents', [ContentController::class, 'store'])->name('contents.store');

    Route::post('/contents/{content}/like', [ContentController::class, 'like'])->name('contents.like');
    Route::post('/contents/{content}/comment', [ContentController::class, 'comment'])->name('contents.comment');
    Route::get('/contents/{content}', [ContentController::class, 'show'])->name('contents.show');
    Route::get('/contents/{content}/edit', [ContentController::class, 'edit'])->name('contents.edit');
    Route::put('/contents/{content}', [ContentController::class, 'update'])->name('contents.update');
    Route::delete('/contents/{content}', [ContentController::class, 'destroy'])->name('contents.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Tampilkan halaman pengaturan pengguna
    Route::get('/settings/{username}', [UserController::class, 'settings'])->name('settings');

    // Simpan perubahan data pengguna
    Route::put('/settings/update/{username}', [UserController::class, 'updateUser'])->name('user.update');
    Route::post('/settings/update/{username}', [UserController::class, 'uploadPhoto'])->name('settings.uploadPhoto');
});
