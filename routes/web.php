<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\sekolahController;
use Illuminate\Support\Facades\Route;
use App\Models\sekolahs;
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

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/siswa', function () {
    return view('siswas.index', [
        'siswas' => siswas::get()
    ]);
});

Route::get('/home', function () {
    return view('layouts.home');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route ::get ('/sekolahs',[sekolahController::class, 'index'])->name('sekolahs.index');

Route ::get ('/sekolahs/tambah',[sekolahController::class, 'tambah'])->name('sekolahs.tambah');

Route ::post ('/sekolahs',[sekolahController::class, 'simpan'])->name('sekolahs.simpan');

Route ::get ('/sekolahs/{id}/edit',[sekolahController::class, 'edit'])->name('sekolahs.edit');

Route ::put ('/sekolahs/{id}',[sekolahController::class, 'update'])->name('sekolahs.update');

Route ::delete('/sekolahs/{id}',[sekolahController::class, 'destroy'])->name('sekolahs.destroy');

require __DIR__.'/auth.php';
