<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [GoController::class,'index'])->name('home');
Route::get('/faq', [GoController::class,'faq'])->name('home');
Route::get('/about', [GoController::class,'about'])->name('home');
Route::get('/contact', [GoController::class,'contact'])->name('home');
Route::get('/privacy', [GoController::class,'privacy'])->name('home');
Route::get('/terms', [GoController::class,'terms'])->name('home');
Route::get('/blog', [GoController::class,'blog'])->name('home');
Route::get('/blog/{slug}', [GoController::class,'blog'])->name('home');
Route::get('catalog', [GoController::class,'catalog'])->name('home');
Route::get('catalog/{id}', [GoController::class,'dettaglio'])->name('home');
Route::get('dettaglio/{id}', [GoController::class,'dettaglio'])->name('home');
Route::get('dettaglio/{slug}', [GoController::class,'blogPost'])->name('home');
