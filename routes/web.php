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

Route::group(['prefix' => 'admin','middleware' => 'auth'],function(){

    Route::get('nursery/create','Admin\NurseryController@add');
    Route::post('nursery/create','Admin\NurseryController@create');
});

Auth::routes();
Route::get('/home','UsersController@index')->name('home');

//全ユーザー 5月4日追記
Route::group(['middeware' => ['auth','can:user-higher']],function(){
    //ユーザー一覧
    Route::get('users/create','Admin\UsersController@index')->name('account.index');
});

    //管理者以上
    Route::group(['middleware' => ['auth', 'can:admin-higher']], function () {
    
    //ユーザー登録
    Route::get('useres/regist','UsersController@regist')->name('account.regist');
    Route::post('users/edit/{user_id}','UsersController@createData')->name('account.edit');

    //ユーザー編集
    Route::get('/account/edit/{user_id}', 'UsersController@edit')->name('account.edit');
    Route::post('/account/edit/{user_id}', 'UsersController@updateData')->name('account.edit');
    
    //ユーザー削除
     Route::post('users/delete/{user_id}', 'UsersController@deleteData');
});

    // システム管理者のみ
Route::group(['middleware' => ['auth', 'can:system-only']], function () {

});

Route::get('/home', 'HomeController@index')->name('home');

