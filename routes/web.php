<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Index route, showing a list of contacts
Route::get('/', [ContactController::class, 'index'])->name('index');

// Routes for creating a contact
Route::get('/create', [ContactController::class, 'create'])->name('contacts.create');
Route::post('/create', [ContactController::class, 'store'])->name('contacts.store');

// Routes for editing and updating a contact
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');

// Route for viewing a contact
Route::get('/contacts/{id}/view', [ContactController::class, 'view'])->name('contacts.view');

// Route to delete a contact
Route::get('/contacts{id}', [ContactController::class, 'delete'])->name('contacts.delete');

// Route to search for a contact
Route::post('/contacts/search', [ContactController::class, 'search'])->name('contacts.search');