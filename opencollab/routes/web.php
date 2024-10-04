<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login_p');
});

Route::get('/main', function () {
    return view('main_p');
});
Route::get('/footer', function () {
    return view('components.footer');
});

Route::get('/login2', function () {
    return view('components.login2');
});

