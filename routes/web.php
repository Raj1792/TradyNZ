<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\QuoteController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/businesses', [BusinessController::class, 'index'])->name('businesses.index');
Route::get('/businesses/register', [BusinessController::class, 'register'])->name('businesses.register');
Route::post('/businesses/register', [BusinessController::class, 'storeRegistration'])->name('businesses.register.store');
Route::get('/businesses/{slug}', [BusinessController::class, 'show'])->name('businesses.show');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/quote', [QuoteController::class, 'create'])->name('quote.create');
Route::post('/quote', [QuoteController::class, 'store'])->name('quote.store');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
