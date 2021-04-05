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
    Route::any('dashboard/get-invoices', 'DashboardController@getInvoices')->name('dashboard.invoices');

    #Settings Route
    Route::get('settings', 'SettingController@setting')->name('settings');
    Route::post('settings/company', 'SettingController@updateCompanyInfo')->name('settings.company');
    Route::post('settings/save-payment-terms', 'SettingController@saveCompanyPaymentTerms')->name('settings.company.payment-terms');
    Route::post('settings/save-bank-info', 'SettingController@saveCompanyBankDetails')->name('settings.bankInfo');
    Route::post('settings/save-company-terms', 'SettingController@saveCompanyTermsCondition')->name('settings.companyTerms');

    #Items Route
    Route::get('items', 'ItemController@index')->name('items');

    #Invoice Route recource function include show, index, destroy, store and edit method
    Route::resource('invoice', 'InvoiceController');
    Route::group(['prefix' => 'invoice'], function () {
        Route::get('print/{vUrlKey}', 'InvoiceController@invoiceDetail')->name('invoice.print');
    });

    #Client Route recource function include show, index, destroy, store and edit method
    Route::resource('client', 'ClientController');

    /**
     * Route group for the client module
     */
    Route::group(['prefix' => 'client'], function () {
        Route::any('get-clients', 'ClientController@getClientList')->name('getClientList');
        Route::any('get-client', 'ClientController@getClient')->name('ajax.client');
    });

    #Item route recource function include show, index, destroy, store and edit method
    Route::resource('item', 'ItemController');

    /**
     * Route group for the items module
     */
    Route::group(['prefix' => 'item'], function () {
        Route::any('get-items', 'ItemController@getItemList')->name('getItemList');
        Route::any('get-item', 'ItemController@getItemInfo')->name('ajax.item');
    });

});
