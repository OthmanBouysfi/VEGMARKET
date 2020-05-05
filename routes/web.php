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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('','PagesController@home_page');

Route::get('/about','PagesController@about');

Route::get('/services','PagesController@services');
*/
Route::get('/','ClientController@index');
Route::get('/shop','ClientController@shop');
Route::get('/cart','ClientController@cart');
Route::get('/checkout','ClientController@checkout');


Route::get('/dashboard' , 'AdminController@dashboard');
Route::get('/add-category' , 'AdminController@add_category');
Route::get('/add-product' , 'AdminController@add_product');
Route::get('/add-slider' , 'AdminController@add_slider');
Route::get('/products' , 'AdminController@products');
Route::get('/categories' , 'AdminController@categories');
Route::get('/sliders' , 'AdminController@sliders');

// ProductController 
Route::post('/save_product','ProductController@save_product');