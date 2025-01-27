<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/test', function(){
    return Redirect::to('/');

});
Route::get('/login', function () {
    return view('login');
});
Route::post("savepaste", function(){
    return 1;
});

