<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\HomeSettingController;
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

//=============Frontend Area===================
//=============================================
Route::get('/',[HomeController::class,'index'])->name('home');





//=============Backend Area===================
//=============================================
Route::prefix('admin')->name('admin.')->group(function(){
    // dashboard
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    // category
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::post('store',[CategoryController::class,'store'])->name('categroy.store');
    Route::post('update/{id}',[CategoryController::class,'update'])->name('categroy.update');
    Route::get('category/{id}/delete',[CategoryController::class,'destroy'])->name('category.delete');

    // home setting
    Route::get('home-setting',[HomeSettingController::class,'index'])->name('home-setting');
    Route::post('store/slider',[HomeSettingController::class,'store'])->name('slider.store');
    Route::post('update/slider/{id}',[HomeSettingController::class,'update'])->name('slider.update');
    Route::get('slider/delete/{id}',[HomeSettingController::class,'destroy'])->name('slider.destroy');

    // product 
    Route::get('product',[ProductController::class,'index'])->name('product');
    Route::get('create',[ProductController::class,'create'])->name('create.product');
    Route::post('product/store',[ProductController::class,'store'])->name('product.store');
});