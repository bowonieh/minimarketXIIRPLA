<?php

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

Route::prefix('/dashboard')->group(function(){
    Route::get('/perusahaan',[PerusahaanController::class,'index']);
    Route::get('/perusahaan/edit',[PerusahaanController::class,'edit']);
    Route::post('/perusahaan/simpan',[PerusahaanController::class,'simpan']);
});
