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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', 'HealthController@check');

Route::get('/users/{userid}/accounts', 'UserController@getAccounts');

Route::get('/accounts/{accountId}/balances', 'AccountController@getBalances');

Route::get('/accounts/{accountId}/transactions', 'AccountController@getTransactions');
