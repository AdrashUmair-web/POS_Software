<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sale',[PageController::class,'sale'])->name('sale');
Route::get('/purchase',[PageController::class,'purchase'])->name('purchase');
Route::get('/product',[PageController::class,'product'])->name('product');
Route::get('/company',[PageController::class,'company'])->name('company');
Route::get('/reports',[PageController::class,'reports'])->name('reports');

