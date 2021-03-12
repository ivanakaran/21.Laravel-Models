<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [MainController::class, 'index'])->name('home');

Route::post('save-company', [CompanyController::class, 'store'])->name('newsletter');

// AdminController
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard')->middleware('AdminCheck');
    Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::post('/check', [AdminController::class, 'check'])->name('admin.check');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Card Controller

Route::post('/addcard', [CardController::class, 'store'])->name('addcard');
Route::get('/cards/edit/{id}', [CardController::class, 'edit'])->name('cards.edit');
Route::post('/cards/update/{id}', [CardController::class, 'update'])->name('cards.update');
Route::get('/cards/edit', [CardController::class, 'show'])->name('update');
Route::get('/cards/delete/{id}', [CardController::class, 'destroy'])->name('destroy');