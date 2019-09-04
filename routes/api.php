<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Login*/
Route::post('login', 'AuthenticateController@login');

Route::post('logout', 'AuthenticateController@logout');

Route::middleware('auth:api')->get('user', function (Request $request) {
    return $request->user();
});

//Route::middleware(['jwt.auth'])->group(function() {
/*Get all data*/
Route::get('products', 'ProductsController@getAll')->name('getAllProducts');

/*Get by Id*/
Route::get('products/{id}', 'ProductsController@getById')->name('getPoductsById');

/*Add data*/
Route::post('products', 'ProductsController@add')->name('addProducts');

/*Edit data*/
Route::post('products/{id}', 'ProductsController@edit')->name('EditProducts');


/*Delete data*/
Route::get('products/delete/{id}', 'ProductsController@delete')->name('deleteProduct');


/*Like Route*/
Route::post('products/{id}/like', 'ProductsController@likeAction')->name('likeProducts');
Route::post('products/{id}/dislike', 'ProductsController@dislikeAction')->name('dislikeProducts');


//});