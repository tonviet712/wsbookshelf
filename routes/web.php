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

Route::get('/', function () {
    return view('index');
});
Route::get('/admin/', 'AdminController@index');
Route::get('/admin/admin-list/', 'AdminController@listAdmin');
Route::get('/admin/user-list/', 'AdminController@listUser');
Route::get('/admin/book-list/', 'AdminController@listBook');