<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\PerusahaanController;
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
//Buat Route untuk  menampilkan form login dengan nama route 'login'
Route::get('/login',[AuthController::class,'index'])->name('login');
//POST LOGIN untuk check password
Route::post('/login',[AuthController::class,'check']);
//ROUTE LOGOUT
Route::get('/logout',[AuthController::class,'logout']);
//=================
Route::prefix('/dashboard')
    ->middleware(['auth','isAdmin'])
    ->group(function(){
    Route::get('/perusahaan',[PerusahaanController::class,'index']);
    Route::get('/perusahaan/edit',[PerusahaanController::class,'edit']);
    Route::post('/perusahaan/simpan',[PerusahaanController::class,'simpan']);
    //Cabang
    Route::get('/cabang',[CabangController::class,'index']);
    Route::get('/cabang/tambah',[CabangController::class,'tambah']);
    Route::post('/cabang/simpan',[CabangController::class,'simpan']);
    Route::get('/cabang/edit/{id}',[CabangController::class,'edit']);
    Route::delete('/cabang/hapus/{id}',[CabangController::class,'hapus']);
});
