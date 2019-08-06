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

Route::get('/', 'homeController@index')->name('home.index');
// Route::get('/setup/{type}', 'homeController@setup')->name('setup.division');
Route::get('/setup/Division', 'divisionController@index')->name('setup.division');
Route::get('/setup/section', 'sectionController@index')->name('setup.section');
Route::get('/setup/designation', 'designationController@index')->name('setup.designation');
Route::get('/setup/brand', 'brandController@index')->name('setup.brand');
Route::get('/setup/category', 'categoryController@index')->name('setup.category');

