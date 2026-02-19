<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });

});



Route::view('/', 'home');
Route::view('/hizmetler', 'hizmetler');
Route::view('/kurumsal', 'kurumsal');
Route::view('/iletisim', 'iletisim');
Route::view('/teklif-al', 'teklif-al');
