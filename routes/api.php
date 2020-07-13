<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/add', 'HandlerGoodsController@addGood');
Route::get('/cart', 'HandlerGoodsController@returnGood');
Route::get('/remove', 'HandlerGoodsController@removeGood');
Route::get('/delete', 'HandlerGoodsController@deleteGood');
Route::post('/adduser', 'UsersController@addNewUser');
Route::post('/login', 'UsersController@loginUser');
Route::post('/currency', 'CurrencyController@change');
Route::post('/order', 'OrderController@new');
Route::post('/fullcart', 'OrderController@cart');
Route::post('/phone', 'UsersController@phone');
