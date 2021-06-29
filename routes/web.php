<?php

use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('frontend.index');
});
Route::group(['namespace' => 'frontend'], function() {
    Route::get('products', 'ProductController@index')->name('products.shop');
    Route::get('products/{product}', 'ProductController@show')->name('product.show');
    Route::get('products/add/{product}', 'ProductController@addProduct')->name('product.add');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});


