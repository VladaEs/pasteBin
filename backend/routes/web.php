<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\pasteController;
use App\Http\Controllers\pastePassController;

Route::get('/', [formController::class, "index"])->name('home');
Route::post('/paste/store', [formController::class, "store"])->name("createPaste");
Route::get('/paste/{id}', pasteController::class)->name('viewPaste');



Route::get('/paste/{id}/password',[pastePassController::class, 'index'])->name('passwordPage');
Route::post('/paste/{id}/password',[pastePassController::class, 'checkPassword'])->name('checkPastePassword');

Route::get('/login', function () {
    return view('login');
});



Route::post("savepaste", function(){
    return 1;
});

