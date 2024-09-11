<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/index', [ContactController::class, 'store'])->name('contacts.store');
