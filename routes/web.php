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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/edit/client/{id?}', 'AdminController@editClient')->name('edit.client');
    Route::post('/add/client', 'AdminController@add')->name('client.add');
    Route::post('/update/client', 'AdminController@update')->name('client.update');
});
