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

//全ユーザー
Route::group(['middeware' => ['auth','can:user-higher']],function(){
    //----------------------------------------------------
    //ユーザー
    //---------------------------------------------------
    //一覧
    Route::get('user/','UserController@index');
    
    //編集
    Route::get('user/edit/{user_id}', 'UserController@edit');
    Route::post('user/edit/{user_id}', 'UserController@update');
});

//管理者以上
Route::group(['prefix' => 'admin','middleware' => ['auth','can:admin-higher']], function(){

    //--------------------------------------
    //ユーザー
    //--------------------------------------
    //一覧
Route::get('user/','Admin\UserController@index');

    //登録
    Route::get('user/create','Admin\UserController@add');
    Route::post('user/create','Admin\UserController@create');
    
    //編集
    Route::get('user/edit/{user_id}','Admin\UserController@edit');
    Route::post('user/edit/{user_id}','Admin\UserController@update');
    
    //削除
    Route::post('user/delete/{user_id}','Admin\UserController@delete');
    
    //管理者
    //----------------------------------------------
    //一覧
    Route::get('user/','Admin\UserController@index');
    
    //登録
    Route::get('user/create','Admin\UserController@add');
    Route::post('user/create','Admin\UserController@create');
    
    //編集
     Route::get('user/edit/{user_id}', 'UserController@edit');
    Route::post('user/edit/{user_id}', 'UserController@update');
    
    //削除
    Route::post('user/delete/{user_id}', 'UserController@delete');

});

    //システム管理者のみ
    Route::group(['prefix' => 'admin', 'middleware' => ['auth','can:system-only']], function () {

    //----------------------------------------
    //保育園
    //----------------------------------------
    //一覧
    Route::get('nursery/','Admin\NurseryController@index');
    
    //登録
    Route::get('nursery/create','Admin\NurseryController@add');
    Route::post('nursery/create','Admin\NurseryController@create');
     
});

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

Route::get('/home', 'HomeController@index')->name('home');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
