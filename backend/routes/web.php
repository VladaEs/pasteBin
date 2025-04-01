<?php

use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
use App\Http\Controllers\pasteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\pastePassController;
use App\Http\Controllers\ScheduleDeletePasteController;
use App\Http\Controllers\SearchController;


Route::get('/', [formController::class, "index"])->name('home');
Route::post('/paste/store', [formController::class, "store"])->name("createPaste");

Route::get('/paste/{id}', pasteController::class)
    ->middleware('PasteExist')
    ->middleware("VerifyPastePassword")
    ->middleware('PasteExpired')
    ->name('viewPaste');

Route::get("/pastecreated",[pasteController::class, 'confirmation'])->name('pasteCreatedConfirmation');


Route::get('/paste/{id}/password',[pastePassController::class, 'index'])
    ->middleware('PasteExist')
    ->middleware('PasteExpired')
    ->name('passwordPage');
Route::post('/paste/{id}/password',[pastePassController::class, 'checkPassword'])
    ->middleware('PasteExist')
    ->middleware('PasteExpired')
    ->name('checkPastePassword');



    //Route::get('/testroute', ScheduleDeletePasteController::class);

Route::get('/search', [SearchController::class, 'index'])->name('searchPaste');
Route::post('/search', [SearchController::class, 'searchPastes']);



Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');
Route::post('/login', [Auth::class, 'login'])->name('userLogin');


Route::get('/register', function () {
    return view("auth.register");
})->middleware('guest')->name('register');

Route::post('/register', [Auth::class, 'create'])->name('createAccount');






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

