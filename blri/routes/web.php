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



Route::get('/home', 'homeController@index')->name('home.index');

//Security-> 
//Create User
Route::get('/security/user_create', 'createuserController@index')->name('security.create user');

//User Permission
Route::get('/security/user_permission', 'userpermController@index')->name('security.user permission');

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
Route::get('/search/brand','brandController@searchByBrandName')->name('searchBrandByName');

//Category
Route::get('/setup/category', 'categoryController@index')->name('setup.category');
Route::post('/setup/category', 'categoryController@categoryPost');
Route::get('/setup/category/{id}/edit', 'categoryController@catedit')->name('setup.catedit');
Route::post('/setup/category/{id}/edit', 'categoryController@update');

//project
Route::get('/setup/project', 'projectController@index')->name('setup.project');

//employee
Route::get('/setup/employee', 'employeeController@index')->name('setup.employee');
Route::post('/setup/employee', 'employeeController@employeeStore');

//supplier
Route::get('/setup/supplier', 'supplierController@index')->name('setup.supplier');

//product
Route::get('/setup/product', 'productController@index')->name('setup.product');
Route::post('/setup/product', 'productController@productPost');
Route::get('/setup/product/{id}/edit', 'productController@productedit')->name('setup.productedit');
Route::post('/check/product','productController@checkIfProductExist')->name('check.product.exist');

//Employee Assign
Route::get('/setup/assignemployee', 'empAssignController@index')->name('setup.employee assign');

//Repirer
Route::get('/setup/repairer_information', 'repairerController@index')->name('setup.repairer info');
Route::post('/setup/repairer_information', 'repairerController@repairerPost');


// Route::get('/home', 'HomeController@index')->name('home');
//Product Receive->
//Product Receive
Route::get('/product_receive/product_receive', 'productreceiveController@index')->name('product receive.product receive');
Route::get('/product_receive/product_requisition', 'requisitioninfoController@index')->name('product receive.requisition info');
Route::get('/product_receive/product_serial_info', 'productserialinfoController@index')->name('product receive.product serial info');

//product distribution
Route::get('/product_distribution/product_release', 'productreleaseController@index')->name('product distribution.product release');
Route::get('/product_distribution/product_distribution', 'productdistributiontypeController@index')->name('product distribution.product distribution');
Route::get('/product_distribution/product_repair', 'productrepairController@index')->name('product distribution.product repair');
Route::get('/product_distribution/repair_receive', 'repairreceiveController@index')->name('product distribution.repair receive');

//adjustment
Route::get('/adjustment/adjustment_information', 'adjustmentinformationController@index')->name('adjustment.adjustment information');
