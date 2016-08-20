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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/place/favorite/retrieve',['as'=>'place.favorite.retrieve','uses'=>'TotalController@place_favorite_retrieve_get']);
Route::get('/place/favorite/store',['as'=>'place.favorite.store','uses'=>'TotalController@place_favorite_store_post']);
Route::get('/place/prefer/retrieve',['as'=>'place.prefer.retrieve','uses'=>'TotalController@place_prefer_retrieve_get']);
Route::get('/place/prefer/store',['as'=>'place.prefer.store','uses'=>'TotalController@place_prefer_store_post']);

