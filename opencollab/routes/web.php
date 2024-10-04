<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login_p');
});

Route::get('/main', function () {
    return view('main_p');
});

