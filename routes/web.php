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

Route::get('/', "HomeController@index")->name("index");

Route::group(['prefix' => 'admin', 'middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('login', 'Auth\LoginController@loginForm')->name('adminlogin');
    Route::post('signin', 'Auth\LoginController@login')->name('signIn');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest'], function () {
    // Authentication Routes
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
});
