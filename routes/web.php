<?php

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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();


// Auth Routes
Route::group(['middleware' => 'auth'], function() {

    Route::get('/dasboard', 'DashboardController@index')->name('dasboard');
    Route::get('/suppliers', 'SupplierController@index')->name('suppliers');
    Route::get('suppliers/add', 'SupplierController@create')->name('add');
    Route::get('suppliers/edit/{id}', 'SupplierController@edit')->name('edit');
    Route::post('suppliers/store', 'SupplierController@store')->name('store');
    Route::post('suppliers/update/{id}', 'SupplierController@update')->name('update_supplier');
    Route::post('suppliers/delete', 'SupplierController@destroy')->name('delete_supplier');

    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('products/add', 'ProductsController@create')->name('add_product');
    Route::get('products/edit/{id}', 'ProductsController@edit')->name('edit_product');
    Route::post('products/store', 'ProductsController@store')->name('store_product');
    Route::post('products/update/{id}', 'ProductsController@update')->name('update_product');
    Route::post('products/delete', 'ProductsController@destroy')->name('delete_product');

});



