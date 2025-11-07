<?php

use App\Http\Controllers\Dashboard\AgamaController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\EselonController;
use App\Http\Controllers\Dashboard\GenderController;
use App\Http\Controllers\Dashboard\GolonganController;
use App\Http\Controllers\Dashboard\JabatanController;
use App\Http\Controllers\Dashboard\UnitController;
use App\Http\Controllers\Landing\AuthController;
use App\Http\Controllers\Dashboard\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.welcome');
})->name('landing');

Route::get('/login', function () {
    return view('landing.login');
})->name('login');

Route::post('/post-login', [AuthController::class, 'postLogin'])->name('post-login');


Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai/print', [PegawaiController::class, 'print'])->name('pegawai.print');
    Route::resource('pegawai', PegawaiController::class);

    Route::get('/dashboard/agama', [AgamaController::class, 'index'])->name('dashboard-agama-index');
    Route::get('/dashboard/agama/create', [AgamaController::class, 'create'])->name('dashboard-agama-create');
    Route::post('/dashboard/agama/store', [AgamaController::class, 'store'])->name('dashboard-agama-store');


    Route::get('/dashboard/gender', [GenderController::class, 'index'])->name('dashboard-gender-index');
    Route::get('/dashboard/gender/create', [GenderController::class, 'create'])->name('dashboard-gender-create');
    Route::post('/dashboard/gender/store', [GenderController::class, 'store'])->name('dashboard-gender-store');

    Route::get('/dashboard/unit', [UnitController::class, 'index'])->name('dashboard-unit-index');
    Route::get('/dashboard/unit/create', [UnitController::class, 'create'])->name('dashboard-unit-create');
    Route::post('/dashboard/unit/store', [UnitController::class, 'store'])->name('dashboard-unit-store');


    Route::get('/dashboard/jabatan', [JabatanController::class, 'index'])->name('dashboard-jabatan-index');
    Route::get('/dashboard/jabatan/create', [JabatanController::class, 'create'])->name('dashboard-jabatan-create');
    Route::post('/dashboard/jabatan/store', [JabatanController::class, 'store'])->name('dashboard-jabatan-store');

    Route::get('/dashboard/eselon', [EselonController::class, 'index'])->name('dashboard-eselon-index');
    Route::get('/dashboard/eselon/create', [EselonController::class, 'create'])->name('dashboard-eselon-create');
    Route::post('/dashboard/eselon/store', [EselonController::class, 'store'])->name('dashboard-eselon-store');


    Route::get('/dashboard/golongan', [GolonganController::class, 'index'])->name('dashboard-golongan-index');
    Route::get('/dashboard/golongan/create', [GolonganController::class, 'create'])->name('dashboard-golongan-create');
    Route::post('/dashboard/golongan/store', [GolonganController::class, 'store'])->name('dashboard-golongan-store');

    Route::get('/dashboard/article', [ArticleController::class, 'index'])->name('dashboard-article-index');

    Route::post('/logout',[AuthController::class,'logout'])->name('dashboard-logout');
});

