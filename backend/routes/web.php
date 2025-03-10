<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\pasteController;
use App\Http\Controllers\pastePassController;
use App\Http\Controllers\Auth;

Route::get('/', [formController::class, "index"])->name('home');
Route::post('/paste/store', [formController::class, "store"])->name("createPaste");

Route::get('/paste/{id}', pasteController::class)
    ->middleware('PasteExist')
    ->middleware("VerifyPastePassword")
    ->name('viewPaste');



Route::get('/paste/{id}/password',[pastePassController::class, 'index'])
    ->middleware('PasteExist')
    ->name('passwordPage');
Route::post('/paste/{id}/password',[pastePassController::class, 'checkPassword'])
    ->middleware('PasteExist')
    ->name('checkPastePassword');



Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [Auth::class, 'login'])->name('userLogin');


Route::get('/register', function () {

    return view("register");
})->name('register');

Route::post('/register', [Auth::class, 'create'])->name('createAccount');






