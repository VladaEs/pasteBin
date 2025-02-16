<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;


Route::get('/', [formController::class, "index"])->name('home');


Route::get('/login', function () {
    return view('login');
});
Route::post('/paste/store', [formController::class, "store"])->name("createPaste");

Route::post("savepaste", function(){
    return 1;
});

