<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index'])->name('welcome');
Route::view('/login','admin.login')->name('login');
Route::post('/login',[AdminController::class,'login']);


Route::get('/products',[UserController::class,'productsByCat'])->name('products');
Route::get('/products/cat/{catID}',[UserController::class,'productsByCat'])->name('products_byCat');
Route::get('/search',[AdminController::class,'search'])->name('search');
Route::get('/details/{productID}',[UserController::class,'detailsProduct'])->name('details_products');


Route::group(['middleware'=>'auth','prefix'=>'admin'],function(){
    Route::get('/home',[AdminController::class,'index'])->name('admin_home');
    Route::post('/home',[AdminController::class,'addProduct'])->name('admin_home');
    Route::get('/categories',[AdminController::class,'getCategoriesInfos'])->name('categories');
    Route::post('/add/categorie',[AdminController::class,'addCategory'])->name('adding_category');
    Route::post('/modify/categorie',[AdminController::class,'modifyCategory'])->name('modify_category');
    Route::post('/modify/produtcs',[AdminController::class,'modifyProducts'])->name('modify_product');
    Route::post('/delete/categorie',[AdminController::class,'delCategory'])->name('delete_cat');
    Route::get('/delete/product/{productID}',[AdminController::class,'delProduct'])->name('delete_product');
    Route::get('/mon-compte',[AdminController::class,'accountInfos'])->name('account_infos');
    Route::post('/mon-compte',[AdminController::class,'modifyAccount'])->name('modify_infos');
    
    
    Route::get('/deconnexion',[AdminController::class,'disconnect'])->name('disconnect');
    
});
