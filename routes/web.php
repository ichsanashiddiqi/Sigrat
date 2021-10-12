<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\LaporanController; 
use App\Http\Controllers\LaporanPegawaiController;
use App\Http\Controllers\LaporanTabelController;
use App\Http\Controllers\OutboxController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::middleware(['admin'])->group(function () {
        Route::resource('admin', AdminController::class);
        Route::resource('inbox', InboxController::class);
        Route::resource('outbox',OutboxController::class);
        Route::resource('petugas',PetugasController::class);
        Route::resource('user',UserController::class);
        Route::resource('laporan',LaporanController::class);
        Route::get('/export', [App\Http\Controllers\ExportController::class, 'export']);
        Route::get('/profile',[App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/update',[App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.update');
    });

    Route::middleware(['pegawai'])->group(function () {
        Route::resource('pegawai', PegawaiController::class);
        Route::get('/laporanPegawai/{id}',[LaporanPegawaiController::class, 'index'])->name('laporanPegawai');
        Route::get('/laporanTabel',[LaporanTabelController::class, 'index'])->name('laporanTabel');
        Route::post('/storeLaporan/',[LaporanPegawaiController::class, 'store'])->name('laporanPegawai.store');
        Route::get('/profilePegawai',[App\Http\Controllers\ProfilePegawaiController::class, 'index'])->name('profilePegawai');
        Route::post('/profilePegawai/update',[App\Http\Controllers\ProfilePegawaiController::class, 'edit'])->name('profilePegawai.update');
    });


    Route::get('/logout', function () {
        Auth::logout();
        redirect('/');
    });

});
