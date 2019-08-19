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
Route::get('/',function(){

	return redirect()->route('home.index');
});
//login
Route::get('/login','loginController@index')->name('login.index');

Route::get('/home', 'homeController@index')->name('home.index');
// Division
Route::get('/setup/Division', 'divisionController@index')->name('setup.division');
Route::post('/setup/Division', 'divisionController@divisionPost');
Route::get('/setup/Division/{id}/edit', 'divisionController@divedit')->name('setup.divedit');
Route::post('/setup/Division/{id}/edit', 'divisionController@update');

//Section
Route::get('/setup/section', 'sectionController@index')->name('setup.section');
Route::post('/setup/section', 'sectionController@sectionPost');
Route::get('/setup/section/{id}/edit', 'sectionController@secedit')->name('setup.secedit');
Route::post('/setup/section/{id}/edit', 'sectionController@update');

//Designation
Route::get('/setup/designation', 'designationController@index')->name('setup.designation');
Route::post('/setup/designation', 'designationController@designationPost');
Route::get('/setup/designation/{id}/edit', 'designationController@desedit')->name('setup.desedit');
Route::post('/setup/designation/{id}/edit', 'designationController@update');

//Brand
Route::get('/setup/brand', 'brandController@index')->name('setup.brand');
Route::post('/setup/brand', 'brandController@brandPost');
Route::get('/setup/brand/{id}/edit', 'brandController@brandedit')->name('setup.brandedit');
Route::post('/setup/brand/{id}/edit', 'brandController@update');

//Category
Route::get('/setup/category', 'categoryController@index')->name('setup.category');
Route::post('/setup/category', 'categoryController@categoryPost');
Route::get('/setup/category/{id}/edit', 'categoryController@catedit')->name('setup.catedit');
Route::post('/setup/category/{id}/edit', 'categoryController@update');
