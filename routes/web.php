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
    #Authentication Routes
    Route::get('login', 'Auth\LoginController@loginForm')->name('adminlogin');
    Route::post('signin', 'Auth\LoginController@login')->name('signIn');

    #logout
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    #Authentication Routes
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

    #Settings Route
    Route::get('settings', 'SettingController@setting')->name('settings');
    Route::post('settings/company', 'SettingController@updateCompanyInfo')->name('settings.company');
    Route::post('settings/save-payment-terms', 'SettingController@saveCompanyPaymentTerms')->name('settings.company.payment-terms');

    #Items Route
    Route::get('items', 'ItemController@index')->name('items');

    #Invoice Route recource function include show, index, destroy, store and edit method
    Route::resource('invoice', 'InvoiceController');

    #Client Route recource function include show, index, destroy, store and edit method
    Route::resource('client', 'ClientController');

    /**
     * Route group for the client module
     */
    Route::group(['prefix' => 'client'], function () {
        Route::any('get-clients', 'ClientController@getClientList')->name('getClientList');
    });

    #Item route recource function include show, index, destroy, store and edit method
    Route::resource('item', 'ItemController');

    /**
     * Route group for the items module
     */
    Route::group(['prefix' => 'item'], function () {
        Route::any('get-items', 'ItemController@getItemList')->name('getItemList');
    });

});
