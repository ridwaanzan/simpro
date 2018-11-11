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

Route::group(['middleware' => ['web']], function() {
	Route::resource('admin/m-project', 'admin\\project\\ProjectMasterController');
	Route::get('data/m-project', 'admin\\project\\ProjectMasterController@getData')->name('m_project.data');
	Route::resource('admin/d-project', 'admin\\project\\ProjectDetailController');
});


Route::resource('admin/jurusan', 'admin\\ControllerJurusan');



Route::resource('user', 'UsersController');
Auth::routes();

Route::get('/admin', 'HomeController@index');
