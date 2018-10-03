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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'accessrole']], function () {
	Route::resource('/stockman/user', 'UserController');
	Route::resource('/stockman/instrument', 'InstrumentController');
	Route::get('/stockman', function () {
		return view('cabinet.stockman');
	})->name('stockman');
});

Route::group(['middleware' => ['auth', 'accessuser']], function () {
	Route::resource('/master', 'MasterController');
	Route::put('/master/{master}', 'MasterController@refuse')->name('master.refuse');
	Route::get('/master/inst/order', 'MasterController@order')->name('master.order');
	Route::get('/master/inst/view', 'MasterController@view')->name('master.view');
});





