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

Route::middleware('guest')->get('/', function () {
    return view('welcome');
});

Route::prefix('/auth')->namespace('Auth')->group(function () {

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::get('/logout', 'LoginController@logout')->middleware('auth')->name('logout');
    Route::post('/login', 'LoginController@login');

    Route::get('/register', 'RegisterController@showRegisterForm')->name('register');
    Route::post('/register', 'RegisterController@register');

});

Route::prefix('/dashboard')->namespace('Dashboard')->middleware('auth')->group(function () {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::prefix('/customer')->group(function () {
        Route::get('/', 'CustomerController@index')->name('dashboard.customer.index');
        Route::post('/import', 'CustomerController@import')->name('dashboard.customer-import');
        Route::get('/export', 'CustomerController@export')->name('dashboard.customer-export');
    });

    Route::prefix('/item')->group(function () {
        Route::get('/in', 'ItemController@index')->name('dashboard.item.index');
        Route::get('/master', 'ItemController@master')->name('dashboard.master.item');
        Route::get('/out', 'ItemController@out')->name('dashboard.item.out');
        Route::post('/outed', 'ItemController@outed')->name('dashboard.item.outed');
        Route::delete('/outed/delete/{id}', 'ItemController@outDestroy')->name('dashboard.out.delete');
        Route::post('/update', 'ItemController@update')->name('dashboard.item.update');
        Route::delete('/delete/{id}', 'ItemController@destroy')->name('dashboard.item.delete');
    });

    Route::prefix('/balance')->group(function () {
        Route::get('/', 'BalanceController@index')->name('dashboard.balance.index');
    });
});
