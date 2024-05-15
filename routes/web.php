<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',['title' => 'Home']);
});

Route::get('browse', function(){
    return view('browse',['title' => 'Browse']);
});

Route::get('login', function(){
    return view('users.login',['title' => 'Log in to Kestory']);
});

Route::get('register', function(){
    return view('users.register',['title' => 'Register']);
});

Route::get('community', function(){
    return view('community',['title' => 'Community']);
});

Route::get('write', function(){
    return view('write',['title' => 'Write']);
});


Route::get('app', function(){
    return view('app');
});
