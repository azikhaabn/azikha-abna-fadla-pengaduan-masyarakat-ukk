<?php

use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Controller;
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


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/data-user', [Controller::class, 'index'])->name('data-user.index');
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/create', [PengaduanController::class, 'create'])->name('pengaduan.create');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
    Route::get('/pengaduan/{pengaduan}', [PengaduanController::class, 'show'])->name('pengaduan.show');
    Route::get('/pengaduan/edit/{id}', [PengaduanController::class, 'edit'])->name('pengaduan.edit');
    Route::post('/pengaduan/update', [PengaduanController::class, 'update'])->name('pengaduan.update');
    Route::get('/pengaduan/hapus/{id}', [PengaduanController::class, 'hapus'])->name('pengaduan.hapus');
    Route::get('/pdf', [PengaduanController::class, 'exportPDF']);
    // Route::resource('pengaduan', PengaduanController::class);
    Route::get('/datalaporan', [PengaduanController::class, 'datalaporan'])->name('pengaduan.datalaporan');
    Route::post('/datalaporan', [PengaduanController::class, 'datalaporan'])->name('pengaduan.datalaporan');
    Route::get('/Belum', [PengaduanController::class, 'belumdiproses'])->name('pengaduan.belumdiproses');
    Route::post('/Belum', [PengaduanController::class, 'belumdiproses'])->name('pengaduan.belumdiproses');
    Route::get('/diproses', [PengaduanController::class, 'diproses'])->name('pengaduan.diproses');
    Route::post('/diproses', [PengaduanController::class, 'diproses'])->name('pengaduan.diproses');
    Route::get('/selesai', [PengaduanController::class, 'selesai'])->name('pengaduan.selesai');
    Route::post('/selesai', [PengaduanController::class, 'selesai'])->name('pengaduan.selesai');
});
require __DIR__ . '/auth.php';
