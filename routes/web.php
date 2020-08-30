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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'mechanics'], function(){
    Route::get('', 'MechanicController@index')->name('mechanic.index');
    Route::get('create', 'MechanicController@create')->name('mechanic.create');
    Route::post('store', 'MechanicController@store')->name('mechanic.store');
    Route::get('edit/{mechanic}', 'MechanicController@edit')->name('mechanic.edit');
    Route::post('update/{mechanic}', 'MechanicController@update')->name('mechanic.update');
    Route::post('delete/{mechanic}', 'MechanicController@destroy')->name('mechanic.destroy');
    Route::get('show/{mechanic}', 'MechanicController@show')->name('mechanic.show');
 });
 
Route::group(['prefix' => 'trucks'], function(){
    Route::get('', 'TruckController@index')->name('truck.index');
    Route::get('create', 'TruckController@create')->name('truck.create');
    Route::post('store', 'TruckController@store')->name('truck.store');
    Route::get('edit/{truck}', 'TruckController@edit')->name('truck.edit');
    Route::post('update/{truck}', 'TruckController@update')->name('truck.update');
    Route::post('delete/{truck}', 'TruckController@destroy')->name('truck.destroy');
    Route::get('show/{truck}', 'TruckController@show')->name('truck.show');
 });
 