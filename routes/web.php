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
Route::get('/home','UsersController@index')->name('home');

//全ユーザー
Route::group(['middeware' => ['auth','can:user-higher']],function(){
    //----------------------------------------------------
    //ユーザー
    //---------------------------------------------------
    //一覧
    Route::get('users/','UsersController@index');
    
    //編集
    Route::get('users/edit/{user_id}', 'UsersController@edit');
    Route::post('users/edit/{user_id}', 'UsersController@update');
});

//管理者以上
Route::group(['prefix' => 'admin','middleware' => ['auth','can:admin-higher']], function(){

    //--------------------------------------
    //ユーザー
    //--------------------------------------
    //一覧
Route::get('users/','Admin\UsersController@index');

    //登録
    Route::get('users/create','Admin\UsersController@add');
    Route::post('users/create','Admin\UsersController@create');
    
    //編集
    Route::get('users/edit/{user_id}','Admin\UsersController@edit');
    Route::post('users/edit/{user_id}','Admin\UsersController@update');
    
    //削除
    Route::post('users/delete/{user_id}','Admin\UsersController@delete');
    
    //管理者
    //----------------------------------------------
    //一覧
    Route::get('users/','Admin\UsersController@index');
    
    //登録
    Route::get('users/create','Admin\UsersController@add');
    Route::post('users/create','Admin\UsersController@create');
    
    //編集
     Route::get('users/edit/{ser_id}', 'UsersController@edit');
    Route::post('users/edit/{user_id}', 'UsersController@update');
    
    //削除
    Route::post('users/delete/{user_id}', 'UsersController@delete');

});

    //システム管理者のみ
    Route::group(['prefix' => 'system', 'middleware' => ['auth','can:system-only']], function () {

    //----------------------------------------
    //保育園
    //----------------------------------------
    //一覧
    Route::get('nursery/','System\NurseryController@index');
    
    //登録
    Route::get('nursery/create','System\NurseryController@add');
    Route::post('nursery/create','System\NurseryController@create');
     
});

//カリキュラム内容
Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){
    Route::get('nursery/create','Admin\NurseryController@add');
    Route::post('nursery/create','Admin\NurseryController@create');
    Route::get('nursery', 'Admin\NurseryController@index');
    Route::get('nursery/edit', 'Admin\NurseryController@edit');
    Route::post('nursery/edit', 'Admin\NurseryController@update');
    Route::get('nursery/delete', 'Admin\NurseryController@delete');

Route::get('/home', 'HomeController@index')->name('home');

});
