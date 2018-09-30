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
// Route::get('admin', 'UserController@dashboard');

Route::get('admin/login', 'UserController@getLoginAdmin');
Route::post('admin/login', 'UserController@postLoginAdmin');
Route::get('admin/logout', 'UserController@getLogoutAdmin');



// Route::get('admin', 'UserController@dashboard');
Route::group(['prefix'=>'admin', 'middleware'=>'checkAdmin'], function () {
	Route::get('/', function() {
		return redirect()->route('list-cate');
	});
	

    Route::group(['prefix'=>'category'], function (){
    	Route::get('/', 'CategoryController@getList');

    	Route::get('list', 'CategoryController@getList')->name('list-cate');
    	
    	Route::get('create', 'CategoryController@create');
    	Route::post('create', 'CategoryController@store');
    	
    	Route::get('edit/{id}', 'CategoryController@edit');
    	Route::post('edit/{id}', 'CategoryController@update');

    	Route::get('delete/{id}', 'CategoryController@delete');

    	Route::post('search', 'CategoryController@search');
    });

    Route::group(['prefix'=>'newstype'], function (){
    	Route::get('/', 'NewsTypeController@getList');

    	Route::get('list', 'NewsTypeController@getList');
    	
    	Route::get('create', 'NewsTypeController@create');
    	Route::post('create', 'NewsTypeController@store');
    	
    	Route::get('edit/{id}', 'NewsTypeController@edit');
    	Route::post('edit/{id}', 'NewsTypeController@update');

    	Route::get('delete/{id}', 'NewsTypeController@delete');

    	Route::post('search', 'NewsTypeController@search');
    });

    Route::group(['prefix'=>'news'], function (){
    	Route::get('', 'NewsController@getList');

    	Route::get('list', 'NewsController@getList');

    	Route::get('create', 'NewsController@create');
    	Route::post('create', 'NewsController@store');
    	
    	Route::get('edit/{id}', 'NewsController@edit');
    	Route::post('edit/{id}', 'NewsController@update');

    	Route::get('delete/{id}', 'NewsController@delete');

    	Route::post('search', 'NewsController@search');
    });

    Route::group(['prefix'=>'comment'], function (){

    	Route::get('delete/{id}/{idNews}', 'CommentController@delete');
    });

    Route::group(['prefix'=>'user'], function (){
    	Route::get('', 'UserController@getList');

    	Route::get('list', 'UserController@getList');

    	Route::get('create', 'UserController@create');
    	Route::post('create', 'UserController@store');
    	
    	Route::get('edit/{id}', 'UserController@edit');
    	Route::post('edit/{id}', 'UserController@update');

    	Route::get('delete/{id}', 'UserController@delete');

    	Route::post('search', 'UserController@search');
    });

    Route::group(['prefix'=>'ajax'], function() {
    	Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
    });

    Route::group(['prefix'=>'slide'],function(){
		Route::get('','SlideController@getDanhSach');
		Route::get('danhsach','SlideController@getDanhSach');
		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');
		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');
		Route::get('xoa/{id}','SlideController@getXoa');
	});
    
    
});	

Route::get('home1', function() {
    return view('page/home1');
});

Route::get('trangchu', 'PagesController@home');
Route::get('lienhe', 'PagesController@contact');
Route::get('gioithieu', 'PagesController@aboutUs');
// Route::get('theloai/{id}/{TenKhongDau}', 'PagesController@category');
Route::get('loaitin/{id}/{TenKhongDau}', 'PagesController@newstype');
Route::get('tintuc/{id}/{TenKhongDau}', 'PagesController@news');


Route::get('dangnhap', 'PagesController@getLogin');
Route::post('dangnhap', 'PagesController@postLogin');

Route::get('dangxuat', 'PagesController@logout');

Route::get('dangky', 'PagesController@getRegister');
Route::post('dangky', 'PagesController@postRegister');

Route::get('nguoidung', 'PagesController@getUser');
Route::post('nguoidung', 'PagesController@postUser');

Route::post('comment/{id}', 'CommentController@comment');

Route::get('timkiem', 'PagesController@search');
