<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
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
    Route::get('category/{id}/delete',[CategoryController::class,'destroy'])->name('category.delete');
});