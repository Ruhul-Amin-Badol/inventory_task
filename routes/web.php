<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Models\brand;

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

Route::get('/', function () {
    return view('home');
});
Route::resource('brand/', BrandController::class);
Route::post('brand/', [BrandController::class,'create']);
Route::get('/edit/{id}', [BrandController::class,'edit']);
Route::patch('/edit/{id}', [BrandController::class,'update']);
Route::get('/brand/{id}', [BrandController::class,'destroy']);
