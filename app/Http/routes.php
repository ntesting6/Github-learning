<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','homecontroller@index');


Route::auth();

Route::get('/home', 'HomeController@index');


Route::get('/create', 'FrontendController@create');
Route::post('/save_product', 'FrontendController@save_product');
Route::get('/product_list', 'FrontendController@product_list');
Route::get('/edit_product/{id}', 'FrontendController@edit_product');
Route::post('/update_product/{id}', 'FrontendController@update_product');
Route::get('/delete_product/{id}', 'FrontendController@delete_product');
Route::get('/shop/', 'ShopController@shop_page');
