<?php

use App\Http\Controllers\PettyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PettyController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::middleware(['role:branch_manager'])->group(function () {
    Route::post('/pettycash/{id}/approve', [PettyController::class, 'updateApproval'])->name('pettycash.approve');
});


Route::resource('pettycash', PettyController::class);
// routes/web.php
Route::post('/pettycash/{id}/approve', [PettyController::class, 'updateApproval'])->name('pettycash.approve');




require __DIR__ . '/auth.php';
