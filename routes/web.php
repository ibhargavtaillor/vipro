<?php

use Illuminate\Support\Facades\Route;
use PHPUnit\Runner\Filter\IncludeGroupFilterIterator;

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

Route::get('/', "HomeController@index")->name("index");

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('login', 'Auth\LoginController@loginForm')->name('adminlogin');
    Route::post('signin', 'Auth\LoginController@login')->name('signIn');

    // logout
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    // Authentication Routes
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    //Settings Route
    Route::get('settings', 'SettingController@setting')->name('settings');

    //Items Route
    Route::get('items', 'ItemController@index')->name('items');

    Route::resource('invoice', 'InvoiceController');

    /**
     * Route group for the client module
     */
    Route::group(['prefix' => 'client'], function () {
        Route::resource('/', 'ClientController');
    });

});
