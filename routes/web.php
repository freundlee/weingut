<?php

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
    return view('welcome');
});



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::resource('customers', 'CustomersController');
    Route::resource('brands', 'BrandsController');
    Route::resource('product-categories', 'ProductCategoriesController');
    Route::resource('products', 'ProductsController');
    Route::resource('users', 'UsersController');

    Route::get('orders', [
        'uses' => 'OrdersController@index',
        'as' => 'orders.index',
    ]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
