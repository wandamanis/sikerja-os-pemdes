<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KinerjaController;
use App\Http\Controllers\HitungController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SubditController;
use App\Http\Controllers\TotalController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('/layouts/layout3');
// });

Route::get('/print', function () {
    return view('/layouts/print');
});

Route::get('/test', [TotalController::class, 'test']);

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/505error', [LoginController::class, 'back'])->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('user');
Route::get('/superadmin', [DashboardController::class, 'superadmin'])->middleware('superadmin');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/admin', AdminController::class)->middleware('admin');
Route::get('/admin/lihat-kinerja/{user}', [AdminController::class, 'lihat_kinerja'])->middleware('admin');
Route::get('/show/admin/kinerja/', [AdminController::class, 'dashboard_kinerja'])->middleware('admin');

Route::resource('/jabatan', JabatanController::class)->middleware('superadmin');

Route::resource('/unit', UnitController::class)->middleware('superadmin');

Route::resource('/level', LevelController::class)->middleware('superadmin');

Route::resource('/status', StatusController::class)->middleware('admin');

Route::resource('/subdit', SubditController::class)->middleware('superadmin');

Route::resource('/users', UserController::class)->middleware('superadmin');

Route::resource('/kinerja', KinerjaController::class)->middleware('user');
Route::get('/tolak/kinerja', [KinerjaController::class, 'tolak'])->middleware('user');

//Route::resource('/hitung', HitungController::class)->middleware('admin');
Route::get('/hitung/setuju/{kinerja_id}', [HitungController::class, 'setuju'])->middleware('admin');
Route::get('/hitung/tolak/{kinerja}', [HitungController::class, 'tolak'])->middleware('admin');

Route::resource('/profil', ProfilController::class)->middleware('auth');

Route::get('/profil/ubah-password/{user}', [ProfilController::class, 'password'])->middleware('auth');
Route::put('/profil/ubah-password/{user}', [ProfilController::class, 'update_password'])->middleware('auth');
