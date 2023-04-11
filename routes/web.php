<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelsController;
use App\Models\brand;
use App\Models\models;

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

    $data['brand']=brand::all();
    $data['models']=models::all();
    return view('home',$data);
});
// brand
Route::resource('brand/', BrandController::class);
Route::post('brand/', [BrandController::class,'create']);
Route::get('/edit/{id}', [BrandController::class,'edit']);
Route::patch('/edit/{id}', [BrandController::class,'update']);
Route::get('/brand/{id}', [BrandController::class,'destroy']);
// models
Route::resource('models/', ModelsController::class);
Route::post('models/', [ModelsController::class,'create']);
