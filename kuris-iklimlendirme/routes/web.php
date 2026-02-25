<?php
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeklifController;




Route::post('/teklif-gonder', [TeklifController::class, 'store'])->name('teklif.store');
Route::get('/teklif-al', [OfferController::class, 'index']);
Route::post('/hesapla', [OfferController::class, 'calculate'])->name('offer.calculate');


Route::prefix('admin')->group(function () {
 Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

       Route::get('/teklifler', [AdminController::class, 'teklifler'])->name('admin.teklifler');
       Route::delete('/teklif/{id}', [AdminController::class, 'destroy'])
    ->name('admin.teklif.destroy');

    });


});



Route::view('/', 'home');
Route::view('/hizmetler', 'hizmetler');
Route::view('/kurumsal', 'kurumsal');
Route::view('/iletisim', 'iletisim');
