<?php
use App\Http\Controllers\OfferController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeklifController;
use App\Http\Controllers\YorumController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\SettingController;




Route::post('/teklif-gonder', [TeklifController::class, 'store'])->name('teklif.store');
Route::get('/teklif-al', [OfferController::class, 'index']);
Route::post('/hesapla', [OfferController::class, 'calculate'])->name('offer.calculate');
Route::get('/teklif-al', [OfferController::class, 'teklifForm'])->name('teklif.al');

Route::prefix('admin')->group(function () {
 Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);

    Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');
    
    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

       Route::get('/teklifler', [AdminController::class, 'teklifler'])->name('admin.teklifler');
       Route::delete('/teklif/{id}', [AdminController::class, 'destroy'])
    ->name('admin.teklif.destroy');
       
       Route::get('/mesajlar', [AdminController::class, 'mesajlar'])
    ->name('admin.mesajlar');
      
   Route::post('/yorum/{id}/onayla', [AdminController::class, 'yorumOnayla'])
    ->name('yorum.onayla');

Route::delete('/yorum/{id}', [AdminController::class, 'yorumSil'])
    ->name('yorum.sil');
    
     // Menü ayarları
    Route::get('/menu-ayar', [SettingController::class, 'edit'])->name('admin.menu.edit');
    Route::post('/menu-ayar', [SettingController::class, 'update'])->name('admin.menu.update');

    });


});



Route::get('/', [OfferController::class, 'index']);
Route::view('/hizmetler', 'hizmetler');
Route::view('/kurumsal', 'kurumsal');
Route::view('/iletisim', 'iletisim');
Route::post('/yorum-ekle', [YorumController::class, 'store'])->name('yorum.ekle');
Route::post('/mesaj-gonder', [MessageController::class, 'store'])->name('mesaj.store');
Route::post('/yorum-gonder', [YorumController::class, 'store'])->name('yorum.store');
