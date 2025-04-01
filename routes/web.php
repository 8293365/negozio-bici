<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [GoController::class,'index'])->name('home');
Route::get('/faq', [GoController::class,'faq'])->name('home');