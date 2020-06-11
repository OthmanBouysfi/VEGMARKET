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
|*/
################# Frontend #################################"
Route::get('/','ClientController@index');
Route::get('/shop','ClientController@shop');
//Route::get('/checkout','ClientController@checkout');

################# End Frontend #############################

################### Backend  ###############################
Route::get('/dashboard' , 'AdminController@dashboard');
Route::get('/add-category' , 'AdminController@add_category');
Route::get('/add-product' , 'AdminController@add_product');
Route::get('/add-slider' , 'AdminController@add_slider');
Route::get('/products' , 'AdminController@products');
Route::get('/categories' , 'AdminController@categories');
Route::get('/sliders' , 'AdminController@sliders');

################## End Backend ##############################
// ProductController 
Route::post('/save_product','ProductController@save_product');
//CategoryController
Route::post('/save_category','CategoryController@save_category');
//SliderController
Route::post('/save_slider','SliderController@save_slider');

Route::get('/select_product_by_category/{category_name}','ProductController@select_product_by_category');


//Unactivate & activate des produit 
Route::get('/activate_product/{id}','ProductController@activate_product');
Route::get('/unactivate_product/{id}','ProductController@unactivate_product');

Route::get('/activate_slider/{id}','SliderController@activate_slider');
Route::get('/unactivate_slider/{id}','SliderController@unactivate_slider');


//// Deleted Category & Product & Slider
Route::get('/delete_category/{id}','CategoryController@delete_category');
Route::get('/delete_product/{id}','ProductController@delete_product');
Route::get('/delete_slider/{id}','SliderController@delete_slider');

//  Updated Category & Product & Slider

Route::get('/edit_category/{id}','CategoryController@edit_category');
Route::post('/update_category','CategoryController@update_category');
Route::get('/edit_product/{id}','ProductController@edit_product');
Route::post('/update_product','ProductController@update_product');
Route::get('/edit_slider/{id}','SliderController@edit_slider');
Route::post('/update_slider','SliderController@update_slider');


################ Shopping Cart  #############################
Route::get('addToCart/{id}' ,'ProductController@addToCart');
Route::get('/cart','ProductController@cart');
Route::post('/updateQty' , 'ProductController@updateQty');
Route::get('/removeItem/{product_id}' , 'ProductController@removeItem');
################ End Shopping Cart############################

############### Checkout ####################################
Route::get('/checkout','ProductController@checkout');
Route::post('/postCheckout','ProductController@postCheckout');

############### End Checkout ################################

############### Orders #######################################

Route::get('/orders', 'ProductController@orders');
############### End Orders ################################