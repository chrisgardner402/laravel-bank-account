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

Route::get('/health', 'HealthController@check');

Route::get('/accounts/{userid}', 'AccountsController@getAccountList');

Route::get('/account/{accountid}/balance', 'AccountsController@getAccountBalance');

Route::get('/account/{accountid}/transactions', 'AccountsController@getAccountTransactions');
