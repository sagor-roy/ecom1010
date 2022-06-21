<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\HomeSettingController;
use Illuminate\Support\Facades\Route;


//=============Frontend Area===================
//=============================================
Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::get('logout',[LoginController::class,'logout'])->name('logout');





//=============Backend Area===================
//=============================================
Route::prefix('admin')->middleware('auth','admin')->name('admin.')->group(function(){
    // dashboard
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
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
    Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::put('product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::get('product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');
});