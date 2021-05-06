<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('welcome');
Route::view('/login','admin.login')->name('login');
Route::post('/login',[AdminController::class,'login']);


Route::get('/products',[UserController::class,'productsByCat'])->name('products');
Route::get('/products/cat/{catID}',[UserController::class,'productsByCat'])->name('products_byCat');
Route::view('/search/{tag}',[AdminController::class,'search'])->name('search');
Route::get('/details/{productID}',[UserController::class,'detailsProduct'])->name('details_products');


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
    Route::get('/home',[AdminController::class,'index'])->name('admin_home');
    Route::get('/categories',[AdminController::class,'getCategoriesInfos'])->name('categories');
    Route::post('/add/categorie',[AdminController::class,'addCategory'])->name('adding_category');
    Route::view('/mon-compte','admin.account')->name('account_infos');
    
    
    Route::view('/deconnexion',[AdminController::class,'disconnect'])->name('disconnect');
    
});
