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

Auth::routes();
/* CoreUI templates */
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('login' , 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/'     , 'Auth\LoginController@showLoginForm');
Route::middleware('auth')->group(function() {
	Route::get('/', 'HomeController@index')->name('admin.index');
	Route::get('dashboard', 'HomeController@dashboard')->name('admin.dashboard');
	// Area Master
	Route::get('admin/area', 'AreaController@index')->name('admin.area.index');
	Route::get('admin/area/list/{id}', 'AreaController@list')->name('admin.area.list');
	Route::get('admin/area/add', 'AreaController@add')->name('admin.area.add');
	Route::post('admin/area/addpost', 'AreaController@add_post')->name('admin.area.addpost');
	Route::get('admin/area/edit/{id}', 'AreaController@edit')->name('admin.area.edit');
	Route::post('admin/area/editpost', 'AreaController@edit_post')->name('admin.area.editpost');
	// Worker Master
	Route::get('admin/worker', 'WorkerController@index')->name('admin.worker.index');
	Route::get('admin/worker/add', 'WorkerController@add')->name('admin.worker.add');
	Route::post('admin/worker/addpost', 'WorkerController@add_post')->name('admin.worker.addpost');
	Route::get('admin/worker/edit/{id}', 'WorkerController@edit')->name('admin.worker.edit');
	Route::post('admin/worker/editpost', 'WorkerController@edit_post')->name('admin.worker.editpost');
	//iForm category Master
	Route::get('admin/category', 'CategoryController@index')->name('admin.category.index');
	Route::get('admin/category/list/{id}', 'CategoryController@list')->name('admin.category.list');
	Route::get('admin/category/add', 'CategoryController@add')->name('admin.category.add');
	Route::post('admin/category/addpost', 'CategoryController@add_post')->name('admin.category.addpost');
	Route::get('admin/category/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
	Route::post('admin/category/editpost', 'CategoryController@edit_post')->name('admin.category.editpost');
	//iFrom master
	Route::get('admin/iform', 'IformController@index')->name('admin.iform.index');
	Route::get('admin/iform/add', 'IformController@add')->name('admin.iform.add');
	Route::post('admin/iform/addpost', 'IformController@add_post')->name('admin.iform.addpost');
	Route::get('admin/iform/edit/{id}', 'IformController@edit')->name('admin.iform.edit');
	Route::post('admin/iform/editpost', 'IformController@edit_post')->name('admin.iform.editpost');
	//equip master
	Route::get('admin/equip', 'EquipController@index')->name('admin.equip.index');
	Route::get('admin/equip/add', 'EquipController@add')->name('admin.equip.add');
	Route::post('admin/equip/addpost', 'EquipController@add_post')->name('admin.equip.addpost');
	Route::get('admin/equip/edit/{id}', 'EquipController@edit')->name('admin.equip.edit');
	Route::post('admin/equip/editpost', 'EquipController@edit_post')->name('admin.equip.editpost');
	Route::get('admin/equip/csv', 'EquipController@csv')->name('admin.equip.csv');
	Route::post('admin/equip/csvpost', 'EquipController@csvpost')->name('admin.equip.csvpost');
	//work master
	Route::get('admin/work', 'WorkController@index')->name('admin.work.index');
	Route::get('admin/work/add', 'WorkController@add')->name('admin.work.add');
	Route::post('admin/work/addpost', 'WorkController@add_post')->name('admin.work.addpost');
	Route::get('admin/work/edit/{id}', 'WorkController@edit')->name('admin.work.edit');
	Route::post('admin/work/editpost', 'WorkController@edit_post')->name('admin.work.editpost');
	//ajax
	Route::post('admin/iform/iforminfo', 'IformController@info')->name('admin.iform.info');
});
// Section Pages
Route::view('/sample/error404','errors.404')->name('error404');
Route::view('/sample/error500','errors.500')->name('error500');