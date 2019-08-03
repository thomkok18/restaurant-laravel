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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/reserveringen', 'ReserveringController@index')->name('reserveringen');
Route::get('/bestelling/{id}', 'BestellingController@create');
Route::post('store/bestelling', 'BestellingController@store');
Route::post('update/product/{id}', 'ProductController@update');
Route::get('/bestelling/{tafel}', 'BestellingController@create');
Route::get('/bestellingen', 'BestellingController@index')->name('bestellingen');
Route::get('/bon', 'BonController@index')->name('bon');
Route::post('store/bon/{bon}', 'BonController@store');
Route::get('/bon/{id}', 'BonController@show');
