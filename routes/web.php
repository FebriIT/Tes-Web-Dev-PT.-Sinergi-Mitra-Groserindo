<?php

use App\Http\Controllers\ApiRajaOngkirController;
use App\Http\Controllers\ProsesDataController;
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



Route::get('/',[ProsesDataController::class,'index']);
Route::post('/prosesdata',[ProsesDataController::class,'proses'])->name('proses.data');
Route::get('/prosesdata/delete',[ProsesDataController::class,'destroy'])->name('delete.hasil');
Route::get('/apirajaongkir',[ApiRajaOngkirController::class,'index'])->name('api.rajaongkir');
Route::get('/getCity/ajax/{id}',[ApiRajaOngkirController::class,'getDataCity']);
