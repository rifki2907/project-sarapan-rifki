<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PembeliController;
use App\Http\Controllers\SarapanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\CetakController;
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

Route::get('/', function () {     return view('dashboard',[ 
    "title"=>"Dashboard" ]); 
})->middleware('auth');



Route::resource('pelanggan',PembeliController::class) 
->except('destroy')->middleware('auth'); 

Route::resource('sarapan',SarapanController::class)->middleware('auth');

Route::resource('pengguna',UserController::class)->except
('destroy','create','show','update','edit')->middleware('auth');

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);

Route::get('logout',[LoginController::class,'loginView'])->name('login');

Route::get('penjualan',function(){
    return view('penjualan.index',[
        "title"=>"Penjualan"
    ]);
})->name('penjualan')->middleware('auth');

Route::get('transaksi',function(){
    return view('penjualan.transaksis',[
        "title"=>"transaksi"
    ]);
})->middleware('auth');

Route::get('cetakReceipt',[CetakController::class,'receipt'])->name('cetakReceipt')->middleware('auth');
