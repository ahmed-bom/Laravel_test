<?php

use Illuminate\Support\Facades\Route;

// Route::get('/{name}', function ($name) {
//     return view('welcome',['name'=>$name]);
// });

Route::get('/about', function () {
    return view("about",['company'=>"ahmed_crl"]);
});