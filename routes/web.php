<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\ItemController;
use App\Models\brand;
use App\Models\models;
use App\Models\item;

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
    $data['item']=item::all();
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
Route::get('modeledit/{id}', [ModelsController::class,'edit']);
Route::patch('modeledit/{models}', [ModelsController::class,'update']);
Route::get('modeldelete/{models}', [ModelsController::class,'destroy']);

// items
Route::resource('items', ItemController::class);
Route::post('items/', [ItemController::class,'create']);
Route::get('itemedit/{item}', [ItemController::class,'edit']);
Route::get('itemdelete/{item}', [ItemController::class,'destroy'])->name('itemdelete');