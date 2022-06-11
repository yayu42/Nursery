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
});

Auth::routes();
Route::get('/home','Admin\UserController@index')->name('home');

//カリキュラム内容
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('nursery/create','Admin\NurseryController@add');
    Route::post('nursery/create','Admin\NurseryController@create');
    Route::get('nursery', 'Admin\NurseryController@index');
    Route::get('nursery/edit', 'Admin\NurseryController@edit');
    Route::post('nursery/edit', 'Admin\NurseryController@update');
    Route::get('nursery/delete', 'Admin\NurseryController@delete');
    Route::get('nursery/ledger', 'Admin\NurseryController@ledger');
    
    Route::get('user/create','Admin\UserController@add');
    Route::post('user/create','Admin\UserController@create');
    Route::get('user', 'Admin\UserController@index');
    Route::get('user/edit','Admin\UserController@edit');
    Route::post('user/edit','Admin\UserController@update');
    Route::get('user/delete','Admin\UserController@delete');

Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();
