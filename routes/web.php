<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;//tambahan//
use App\Models\User;

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

//Route::middleware(['auth'])->group(function () {
  //  Route::resource('/users', UserController::class);
//});


Route::resource('users', UserController::class);

Route::get('/dashboard', [UserController::class, 'index'])->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $users = User:: get();
    return view('dashboard', compact('users'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    ///
    // Route::get('/Users', [UserController::class, 'show'])->name('karyawan.tampil');
    // Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah'])->name('karyawan.tambah');
    // Route::post('/karyawan/submit',[KaryawanController::class, 'submit'])->name('karyawan.submit');
    // Route::get('/karyawan/edit/{id}',[KaryawanController::class, 'edit'])->name('karyawan.edit');
    // Route::post('/karyawan/update/{id}',[KaryawanController::class, 'update'])->name('karyawan.update');
    // Route::delete('/karyawan/delete/{id}',[KaryawanController::class, 'delete'])->name('karyawan.delete');
});

require __DIR__.'/auth.php';
