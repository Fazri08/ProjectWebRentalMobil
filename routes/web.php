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
Route::auth();

Route::group(['middleware'=>'auth'], function() {

//merk
Route::get('merk', 'MerkController@index');
Route::get('merk/add', 'MerkController@create');
Route::post('merk/add', 'MerkController@store');

//edit & delete merk
Route::get('merk/{id}/edit', 'MerkController@edit');
Route::patch('merk/{id}/edit', 'MerkController@update');
Route::delete('merk/{id}/delete', 'MerkController@destroy');

//mobil
Route::get('/admin', 'MobilController@index');
Route::get('mobil', 'MobilController@index');
Route::get('mobil/add', 'MobilController@create');
Route::post('mobil/add', 'MobilController@store');


//edit & delete mobil
Route::get('mobil/{id}/edit', 'MobilController@edit');
Route::patch('mobil/{id}/edit', 'MobilController@update');
Route::delete('mobil/{id}/delete', 'MobilController@destroy');




});

Route::view('/', 'layouts.index');
Route::view('/syarat', 'layouts.syarat');
Route::get('shop', 'MobilController@shop');
Route::view('/blog', 'layouts.blog');
Route::view('/contact', 'layouts.contact');
Route::get('/merk/{id_merk}', 'MobilController@findById')->name('merk.index');
