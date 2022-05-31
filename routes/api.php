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


/* Minhas rotas */

/* Rotas dos serviços */
Route::namespace('Api')->group( function() {

    /*Cadastro de clientes*/
    Route::post('/customer/add', 'CustomerController@add');
    Route::get('/customer', 'CustomerController@index');
    Route::get('/customer/{id}', 'CustomerController@getId');
    Route::put('/customer/update/{id}', 'CustomerController@update');
    Route::delete('/customer/delete/{id}', 'CustomerController@delete');

    /*Cadatro de forma de pagamentos*/
    Route::post('/payment/add', 'PaymentController@add');
    Route::put('/payment/update/{id}', 'PaymentController@update');
    Route::delete('/payment/delete/{id}', 'PaymentController@delete');
    Route::get('/payment', 'PaymentController@index');
    Route::get('/payment/{id}', 'PaymentController@getId');


    /*Cadatro de product*/
    Route::post('/product/add', 'ProductController@add');
    Route::put('/product/update/{id}', 'ProductController@update');
    Route::delete('/product/delete/{id}', 'ProductController@delete');
    Route::get('/product', 'ProductController@index');
    Route::get('/product/{id}', 'ProductController@getId');

    /*Criar pedidos*/
    Route::post('/order/add', 'OrderController@add');
    Route::get('/order/list', 'OrderController@list');
});

