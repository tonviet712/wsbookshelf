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

// Admin route
Route::get('/admin', 'Admin\AdminController@index');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('accounts', 'Admin\AccountController');
    Route::resource('books', 'Admin\BookController');
    Route::resource('history', 'Admin\HistoryController');
});

// User route
Route::namespace('User')->prefix('/')->group(function () {
    Route::get('/', 'IndexController@index')->name('index');
    Route::get('/auth', 'UserController@showLoginForm');
    Route::post('/auth', 'UserController@login');
});

Auth::routes();

/*Route::get('/home', 'HomeController@index')->name('home');*/
