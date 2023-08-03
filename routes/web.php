<?php

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
use App\Http\Controllers\NotaController;
use App\Http\Controllers\TransaksiController;

Route::get('/nota', [NotaController::class, 'index'])->name('nota.index');
Route::get('/nota/create', [NotaController::class, 'create'])->name('nota.create');
Route::post('/nota', [NotaController::class, 'store'])->name('nota.store');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
// routes/web.php
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');


Route::get('/', function () {
    return view('welcome');
});


