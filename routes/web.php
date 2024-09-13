<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('index');
})->name('index');*/

Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/create', [ContactController::class, 'store'])->name('contacts.store');

Route::get('/', [ContactController::class, 'index'])->name('index');