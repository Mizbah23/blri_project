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
    return redirect()->route('login.index');
});

//Login
Route::get('/login', 'loginController@index')->name('login.index');
Route::post('/login', 'loginController@loginPost');


Route::group(['middleware'=>'userNameExistenceCheck'], function () {
    Route::get('/home', 'homeController@index')->name('home.index');

    //Security->
    //Create User
    Route::get('/security/user_create', 'createuserController@index')->name('security.create user');
    Route::post('/security/user_create', 'createuserController@userPost');
    Route::get('/security/user_create/{id}/edit', 'createuserController@userEdit')->name('security.useredit');
    Route::post('/security/user_create/{id}/edit', 'createuserController@update');

    //User Permission
    Route::get('/security/user_permission', 'userpermController@index')->name('security.user permission');

    // Division
    Route::get('/setup/Division', 'divisionController@index')->name('setup.division');
    Route::post('/setup/Division', 'divisionController@divisionPost');
    Route::get('/setup/Division/{id}/edit', 'divisionController@divedit')->name('setup.divedit');
    Route::post('/setup/Division/{id}/edit', 'divisionController@update');
    Route::get('/search/division', 'divisionController@searchByDivisionName')->name('searchByDivisionName');


    //Section
    Route::get('/setup/section', 'sectionController@index')->name('setup.section');
    Route::post('/setup/section', 'sectionController@sectionPost');
    Route::get('/setup/section/{id}/edit', 'sectionController@secedit')->name('setup.secedit');
    Route::post('/setup/section/{id}/edit', 'sectionController@update');
    Route::get('/search/section', 'sectionController@searchBySectionName')->name('searchSectionByName');


    //Designation
    Route::get('/setup/designation', 'designationController@index')->name('setup.designation');
    Route::post('/setup/designation', 'designationController@designationPost');
    Route::get('/setup/designation/{id}/edit', 'designationController@desedit')->name('setup.desedit');
    Route::post('/setup/designation/{id}/edit', 'designationController@update');
    Route::get('/search/designation', 'designationController@searchBydesignation')->name('searchBydesignationType');


    //Brand
    Route::get('/setup/brand', 'brandController@index')->name('setup.brand');
    Route::post('/setup/brand', 'brandController@brandPost');
    Route::get('/setup/brand/{id}/edit', 'brandController@brandedit')->name('setup.brandedit');
    Route::post('/setup/brand/{id}/edit', 'brandController@update');
    Route::get('/search/brand', 'brandController@searchByBrandName')->name('searchBrandByName');

    //Category
    Route::get('/setup/category', 'categoryController@index')->name('setup.category');
    Route::post('/setup/category', 'categoryController@categoryPost');
    Route::get('/setup/category/{id}/edit', 'categoryController@catedit')->name('setup.catedit');
    Route::post('/setup/category/{id}/edit', 'categoryController@update');
    Route::get('/search/category', 'categoryController@searchByCategoryName')->name('searchByCategoryName');

    //project
    Route::get('/setup/project', 'projectController@index')->name('setup.project');
    Route::post('/setup/project', 'projectController@projectPost');
    Route::get('/setup/project/{id}/edit', 'projectController@projectedit')->name('setup.projectEdit');
    Route::post('/setup/project/{id}/edit', 'projectController@update');

    //employee
    Route::get('/setup/employee', 'employeeController@index')->name('setup.employee');
    Route::post('/setup/employee', 'employeeController@employeeStore');
    Route::get('/setup/employee/{id}/edit', 'employeeController@employeeEdit')->name('setup.employee.edit');
    Route::post('/setup/employee/{id}/edit', 'employeeController@employeeUpdate');

    //supplier
    Route::get('/setup/supplier', 'supplierController@index')->name('setup.supplier');
    Route::post('/setup/supplier', 'supplierController@supplierPost');
    Route::get('/setup/supplier/{id}/edit', 'supplierController@supledit')->name('setup.supplieredit');
    Route::post('/setup/supplier/{id}/edit', 'supplierController@update');

    //product
    Route::get('/setup/product', 'productController@index')->name('setup.product');
    Route::post('/setup/product', 'productController@productPost');
    Route::get('/setup/product/{id}/edit', 'productController@productedit')->name('setup.productedit');
    Route::post('/setup/product/{id}/edit', 'productController@productUpdate');
    Route::post('/check/product', 'productController@checkIfProductExist')->name('check.product.exist');

    //Employee Assign
    Route::get('/setup/assignemployee', 'empAssignController@index')->name('setup.employee assign');
    Route::post('/setup/assignemployee', 'empAssignController@assignEmployeeStore');
    Route::get('/setup/assignemployee/{id}/edit', 'empAssignController@assignEmployeeEdit')->name('setup.employee assign.edit');
    Route::post('/setup/assignemployee/{id}/edit', 'empAssignController@assignEmployeeUpdate');


    //Repirer
    Route::get('/setup/repairer_information', 'repairerController@index')->name('setup.repairer info');
    Route::post('/setup/repairer_information', 'repairerController@repairerPost');
    Route::get('/setup/repairer/{id}/edit', 'repairerController@repaireredit')->name('setup.repaireredit');
    Route::post('/setup/repairer/{id}/edit', 'repairerController@update');
    // District
    Route::get('/setup/district', 'districtController@index')->name('setup.district');
    Route::post('/setup/district', 'districtController@districtPost');
    Route::get('/setup/district/{id}/edit', 'districtController@districtedit')->name('setup.disedit');
    Route::post('/setup/district/{id}/edit', 'districtController@update');

    //Product Receive->
    //Product Receive
    Route::get('/product_receive/product_receive', 'productreceiveController@index')->name('product receive.product receive');
    Route::post('/product_receive/product_receive', 'productreceiveController@store');
    Route::put('/product_receive/product_receive', 'productreceiveController@updateItemFromReceiveList')->name('update.product.from.ReceiveList');
    Route::get('/product_receive/product_receive/delete/item', 'productreceiveController@deleteItemFromReceiveList')->name('delete.product.from.ReceiveList');
    Route::get('/product_receive/product_receive/edit/item', 'productreceiveController@editItemFromReceiveList')->name('edit.product.from.ReceiveList');
    Route::get('/product_receive/product_receive/saveAll/item', 'productreceiveController@saveAllItemFromReceiveList')->name('saveAll.product.from.ReceiveList');
    Route::get('/product_receive/product_receive/clearList/item', 'productreceiveController@clearListItemFromReceiveList')->name('clearList.product.from.ReceiveList');
    Route::get('/product_receive/invoice','productreceiveController@invoice')->name('product receive.productReceiveInvoice');


    //Rquisition
    Route::get('/product_receive/product_requisition', 'requisitioninfoController@index')->name('product receive.requisition info');
    Route::post('/product_receive/product_requisition', 'requisitioninfoController@requisitionListStore');
    Route::get('/product_requisition/delete/item', 'requisitioninfoController@deleteItemFromRequisitionList')->name('delete.product.from.RequisitionList');
    Route::get('/product_requisition/edit/item', 'requisitioninfoController@editItemFromRequisitionList')->name('edit.product.from.RequisitionList');
    Route::put('/product_receive/product_requisition', 'requisitioninfoController@updateItemFromRequisitionList')->name('update.product.from.RequisitionList');
    Route::get('/product_receive/product_requisition/saveAll/item', 'requisitioninfoController@saveAllItemFromRequisitionList')->name('saveAll.product.from.RequisitionList');
    Route::get('/product_receive/product_requisition/clearList/item', 'requisitioninfoController@clearListItemFromRequisitionsList')->name('clearList.product.from.RequisitionList');


    //Serial Info
    Route::get('/product_receive/product_serial_info', 'productserialinfoController@index')->name('product receive.product serial info');
    Route::post('/product_receive/product_serial_info', 'productserialinfoController@serialPost');
    Route::get('/product_receive/product_serial_info/{id}/edit', 'productserialinfoController@serialEdit')->name('product receive.serialedit');
    Route::post('/product_receive/product_serial_info/{id}/edit', 'productserialinfoController@update');

    //Product distribution->
    //Release
    Route::get('/product_distribution/product_release', 'productreleaseController@index')->name('product distribution.product release');
    Route::post('/product_distribution/product_release', 'productreleaseController@store');
    Route::put('/product_distribution/product_release/get', 'productreleaseController@updateItemFromReleaseList')->name('update.product.from.ReleaseList');
    Route::post('/show/employee/basedOnProject/Id', 'productreleaseController@showEmployeeBasedOnProject')->name('showEmployeeBasedOnProject');
    Route::post('/product_distribution/product_release/clearList/item', 'productreleaseController@clearProductRelease')->name('clearProductRelease');
    Route::post('/product_distribution/product_release/saveList/item', 'productreleaseController@saveProductRelease')->name('saveProductRelease');
    Route::get('/product_distribution/product_release/delete/item', 'productreleaseController@deleteItemFromReleaseList')->name('delete.product.from.ReleaseList');
    Route::get('/product_distribution/product_release/edit/item', 'productreleaseController@editItemFromReleaseList')->name('edit.product.from.ReleaseList');

    //Distribution Info
    Route::get('/product_distribution/product_distribution', 'productdistributiontypeController@index')->name('product distribution.product distribution');
    Route::post('/product_distribution/product_distribution', 'productdistributiontypeController@distributionList');
    Route::post('/show/product/basedOnBrand/Id', 'productdistributiontypeController@showProductBasedOnBrand')->name('showProductBasedOnBrand');
    Route::get('/product_distribution/product_distribution/delete/item', 'productdistributiontypeController@deleteItemFromDistributionList')->name('delete.product.from.DistributionList');
    Route::get('/product_distribution/product_distribution/edit/item', 'productdistributiontypeController@editItemFromDistributionList')->name('edit.product.from.DistributionList');
    Route::put('/product_distribution/product_distribution', 'productdistributiontypeController@updateItemFromDistributionList')->name('update.product.from.DistributionList');
    Route::get('/product_distribution/product_distribution/saveAll/item', 'productdistributiontypeController@saveAllItemFromDistributionList')->name('saveAll.product.from.DistributionList');
    Route::get('/product_distribution/product_distribution/clearList/item', 'productdistributiontypeController@clearListItemFromDistributionList')->name('clearList.product.from.DistributionList');


    //Repair Info
    Route::get('/product_distribution/product_repair', 'productrepairController@index')->name('product distribution.product repair');
    Route::post('/product_distribution/product_repair', 'productrepairController@repairSendPost');
    Route::post('/show/product/basedOnBrand/Id', 'productrepairController@showProductBasedOnBrand')->name('showProductBasedOnBrand');
    Route::get('/product_distribution/product_repair/delete/item', 'productrepairController@deleteItemFromRepair')->name('delete.product.from.repair');
    Route::get('/product_distribution/repair/{id}/edit', 'productrepairController@repairedit')->name('product distribution.repairedit');
    Route::post('/product_distribution/repair/{id}/edit', 'productrepairController@update');
   
   

    //Repair Receive
    Route::get('/product_distribution/repair_receive', 'repairReceiveController@index')->name('product distribution.repair receive');

    //adjustment
    Route::get('/adjustment/adjustment_information', 'adjustmentinformationController@index')->name('adjustment.adjustment information');
    Route::post('/adjustment/adjustment_information', 'adjustmentinformationController@store');
    Route::put('/adjustment/adjustment_information', 'adjustmentinformationController@updateItem')->name('adjustment.update.adjustment information');
    Route::get('/adjustment/adjustment_information/edit/item', 'adjustmentinformationController@editItem')->name('adjustment.edit.adjustment information');
    Route::get('/adjustment/adjustment_information/delete/item', 'adjustmentinformationController@deleteItem')->name('adjustment.delete.adjustment information');
    Route::get('/adjustment/adjustment_information/clear/allItem', 'adjustmentinformationController@clearAllItem')->name('adjustment.clearAll.adjustment information');
    Route::get('/adjustment/adjustment_information/save/allItem', 'adjustmentinformationController@saveAllItem')->name('adjustment.saveAll.adjustment information');
    Route::get('/adjustment/invoice','adjustmentinformationController@invoice')->name('adjustment.adjustmentInvoice');

    //reportings
	Route::get('/reporting/product_receive_report', 'productreceivereportController@index')->name('reporting.product receive report');//->name('folder name.blade name')
	Route::get('/reporting/product_distribution_report', 'productdistributionreportController@index')->name('reporting.product distribution report');
    Route::get('/reporting/adjustment_report', 'adjustmentreportController@index')->name('reporting.adjustment report');
    Route::get('/reporting/stock_report', 'stockreportController@index')->name('reporting.stock report');
    Route::get('/reporting/project_summary_report', 'projectsummaryreportController@index')->name('reporting.project summary report');
    Route::get('/reporting/attendance_report', 'attendancereportController@index')->name('reporting.attendance report');
});
