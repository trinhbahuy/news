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
Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');
Route::get('logout', 'UserController@logout' );

Route::group(['prefix'=>'admin','middleware' => 'admin'], function() {

    Route::group(['prefix'=>'theloai'], function(){
        Route::get('danhsach','TheloaiController@getList');
        Route::get('them', 'TheloaiController@getAdd');
        Route::post('them','TheloaiController@postAdd');
        Route::get('sua/{id}', 'TheloaiController@getEdit');
        Route::post('sua/{id}','TheloaiController@postEdit');
        Route::get('xoa/{id}','TheloaiController@getDelete');
    });

    Route::group(['prefix'=>'loaitin'], function(){
        Route::get('danhsach','LoaiTinController@getList');
        Route::get('them', 'LoaiTinController@getAdd');
        Route::post('them','LoaiTinController@postAdd');
        Route::get('sua/{id}', 'LoaiTinController@getEdit');
        Route::post('sua/{id}','LoaiTinController@postEdit');
        Route::get('xoa/{id}','LoaiTinController@getDelete');

    });

    Route::group(['prefix'=>'tintuc'], function(){
        Route::get('danhsach','TinTucController@getList');
        Route::get('them', 'TinTucController@getAdd');
        Route::post('them','TinTucController@postAdd');
        Route::get('sua/{id}', 'TinTucController@getEdit');
        Route::post('sua/{id}', 'TinTucController@postEdit');
        Route::get('xoa/{id}', 'TinTucController@getDelete');
    });

    Route::group(['prefix'=>'users'], function(){
        Route::get('danhsach','UserController@getList');
        Route::get('them', 'UserController@getAdd');
        Route::post('them', 'UserController@postAdd');
        Route::get('sua/{id}', 'UserController@getEdit');
        Route::post('sua/{id}', 'UserController@postEdit');
        Route::get('xoa/{id}', 'UserController@getDelete');
    });

    Route::group(['prefix'=>'ajax'], function(){
        Route::get('loaitin/{idTheLoai}','Ajax@ajax');
    });
});

Route::get('trangchu','PagesController@trangchu');
Route::get('loaitin/{id}/{tenkhongdau}','PagesController@loaitin');
Route::get('tintuc/{id}','PagesController@tintuc');
Route::get('comment/{id}','PagesController@getComment');
Route::post('comment/{id}','PagesController@postComment');

Route::get('forum','ForumController@forum');
