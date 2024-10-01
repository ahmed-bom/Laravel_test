<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login_test');
});

Route::get('/main', function () {
    return view('main_test');
});

