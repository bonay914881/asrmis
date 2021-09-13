<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', function () { return view('welcome'); });

Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

	//Personnels
	Route::get('/personnel', 'App\Http\Controllers\PersonnelController@index')->name('personnels');
	Route::get('/personnels/{officer}/officer', ['as' => 'personnels - officers', 'uses' => 'App\Http\Controllers\PersonnelController@officer']);
	Route::get('/personnels/{enlisted}/enlisted', ['as' => 'personnels - enlisted personnels', 'uses' => 'App\Http\Controllers\PersonnelController@enlisted']);
	
	//Logistics
	Route::get('/c4sequipment', 'App\Http\Controllers\CommunicationEquipmentController@index')->name('c4s equipment');
	Route::get('/c4sequipments/create', ['as' => 'c4s equipment - create', 'uses' => 'App\Http\Controllers\CommunicationEquipmentController@create']);
	Route::any('/c4sequipments/store', ['as' => 'c4sequipments.store', 'uses' => 'App\Http\Controllers\CommunicationEquipmentController@store']);
	Route::any('/c4sequipments/{equipment}/edit', ['as' => 'c4s equipment - edit', 'uses' => 'App\Http\Controllers\CommunicationEquipmentController@edit']);
	Route::put('/c4sequipments/{equipment}/update', ['as' => 'c4sequipments.update', 'uses' => 'App\Http\Controllers\CommunicationEquipmentController@update']);
	Route::any('/c4sequipments/{equipment}/destroy', ['as' => 'c4sequipments.destroy', 'uses' => 'App\Http\Controllers\CommunicationEquipmentController@destroy']);

	//Logistics Reports
	Route::get('/c4sequipmentreport', 'App\Http\Controllers\CommunicationEquipmentReportController@index')->name('c4s equipment report');
	Route::get('/c4sequipmentreport/serviceable', ['as' => 'c4s equipment report - serviceable', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@serviceable']);
	Route::get('/c4sequipmentreport/unserviceable', ['as' => 'c4s equipment report - unserviceable', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@unserviceable']);
	Route::get('/c4sequipmentreport/lost', ['as' => 'c4s equipment report - lost', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@lost']);
	Route::get('/c4sequipmentreport/unknown', ['as' => 'c4s equipment report - unknown', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@unknown']);
	Route::get('/c4sequipmentreport/military', ['as' => 'c4s equipment report - military', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@military']);
	Route::get('/c4sequipmentreport/commercial', ['as' => 'c4s equipment report - commercial', 'uses' => 'App\Http\Controllers\CommunicationEquipmentReportController@commercial']);
	Route::get('/c4sequipmentreport/allequipmentreportspdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'allc4sreportsPDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportsserviceablepdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportsserviceablePDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportsunserviceablepdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportsunserviceablePDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportslostpdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportslostPDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportsunknownpdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportsunknownPDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportsmilitarypdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportsmilitaryPDF']);
	Route::get('/c4sequipmentreport/c4sequipmentreportscommercialpdf', [App\Http\Controllers\CommunicationEquipmentReportController::class, 'c4sreportscommercialPDF']);

	//Audit Trail
	Route::get('/audittrail', 'App\Http\Controllers\AuditTrailController@index')->name('audit trail');
	Route::any('/audittrail/{user}/viewlogs', ['as' => 'audit trail - view logs', 'uses' => 'App\Http\Controllers\AuditTrailController@viewlogs']);

	//References
	Route::get('/categorygroup', 'App\Http\Controllers\CategoryGroupController@index')->name('c4s category group');
	Route::get('/categorygroups/create', ['as' => 'c4s category group - create', 'uses' => 'App\Http\Controllers\CategoryGroupController@create']);
	Route::any('/categorygroups/store', ['as' => 'categorygroups.store', 'uses' => 'App\Http\Controllers\CategoryGroupController@store']);
	Route::any('/categorygroups/{categorygroup}/edit', ['as' => 'c4s category group - edit', 'uses' => 'App\Http\Controllers\CategoryGroupController@edit']);
	Route::put('/categorygroups/{categorygroup}/update', ['as' => 'categorygroups.update', 'uses' => 'App\Http\Controllers\CategoryGroupController@update']);
	Route::any('/categorygroups/{categorygroup}/destroy', ['as' => 'categorygroups.destroy', 'uses' => 'App\Http\Controllers\CategoryGroupController@destroy']);

	Route::get('/category', 'App\Http\Controllers\CommunicationCategoryController@index')->name('c4s category');
	Route::get('/categories/create', ['as' => 'c4s category - create', 'uses' => 'App\Http\Controllers\CommunicationCategoryController@create']);
	Route::any('/categories/store', ['as' => 'category.store', 'uses' => 'App\Http\Controllers\CommunicationCategoryController@store']);
	Route::any('/categories/{communicationcategory}/edit', ['as' => 'c4s category - edit', 'uses' => 'App\Http\Controllers\CommunicationCategoryController@edit']);
	Route::put('/categories/{communicationcategory}/update', ['as' => 'category.update', 'uses' => 'App\Http\Controllers\CommunicationCategoryController@update']);
	Route::any('/categories/{communicationcategory}/destroy', ['as' => 'category.destroy', 'uses' => 'App\Http\Controllers\CommunicationCategoryController@destroy']);

	Route::get('/commocategories', 'App\Http\Controllers\CommoCategoryController@index')->name('c4s commo category');
	Route::get('/commocategories/create', ['as' => 'c4s commo category - create', 'uses' => 'App\Http\Controllers\CommoCategoryController@create']);
	Route::any('/commocategories/store', ['as' => 'commocategories.store', 'uses' => 'App\Http\Controllers\CommoCategoryController@store']);
	Route::any('/commocategories/{commocategory}/edit', ['as' => 'c4s commo category - edit', 'uses' => 'App\Http\Controllers\CommoCategoryController@edit']);
	Route::put('/commocategories/{commocategory}/update', ['as' => 'commocategories.update', 'uses' => 'App\Http\Controllers\CommoCategoryController@update']);
	Route::any('/commocategories/{commocategory}/destroy', ['as' => 'commocategories.destroy', 'uses' => 'App\Http\Controllers\CommoCategoryController@destroy']);

	Route::get('/nomenclatures', 'App\Http\Controllers\CommunicationNomenclatureController@index')->name('c4s nomenclature');
	Route::get('/nomenclatures/create', ['as' => 'c4s nomenclature - create', 'uses' => 'App\Http\Controllers\CommunicationNomenclatureController@create']);
	Route::any('/nomenclatures/store', ['as' => 'nomenclatures.store', 'uses' => 'App\Http\Controllers\CommunicationNomenclatureController@store']);
	Route::any('/nomenclatures/{nomenclature}/edit', ['as' => 'c4s nomenclature - edit', 'uses' => 'App\Http\Controllers\CommunicationNomenclatureController@edit']);
	Route::put('/nomenclatures/{nomenclature}/update', ['as' => 'nomenclatures.update', 'uses' => 'App\Http\Controllers\CommunicationNomenclatureController@update']);
	Route::any('/nomenclatures/{nomenclature}/destroy', ['as' => 'nomenclatures.destroy', 'uses' => 'App\Http\Controllers\CommunicationNomenclatureController@destroy']);

	// Create Users
	Route::get('/user', 'App\Http\Controllers\UserController@index')->name('users');
	Route::get('/users/create', ['as' => 'users - create', 'uses' => 'App\Http\Controllers\UserController@create']);
	Route::any('/users/store', ['as' => 'users.store', 'uses' => 'App\Http\Controllers\UserController@store']);
	Route::any('/users/{user}/edit', ['as' => 'users - edit', 'uses' => 'App\Http\Controllers\UserController@edit']);
	Route::put('/users/{user}/update', ['as' => 'users.update', 'uses' => 'App\Http\Controllers\UserController@update']);
	Route::any('/users/{user}/destroy', ['as' => 'users.destroy', 'uses' => 'App\Http\Controllers\UserController@destroy']);

	// Roles and Permissions
	Route::get('/role', 'App\Http\Controllers\RoleController@index')->name('roles');
	Route::get('/roles/create', ['as' => 'roles - create', 'uses' => 'App\Http\Controllers\RoleController@create']);
	Route::any('/roles/store', ['as' => 'roles.store', 'uses' => 'App\Http\Controllers\RoleController@store']);
	Route::any('/roles/{role}/edit', ['as' => 'roles - edit', 'uses' => 'App\Http\Controllers\RoleController@edit']);
	Route::put('/roles/{roles}/update', ['as' => 'roles.update', 'uses' => 'App\Http\Controllers\RoleController@update']);
	Route::any('/roles/{role}/destroy', ['as' => 'roles.destroy', 'uses' => 'App\Http\Controllers\RoleController@destroy']);

	Route::get('/permission', 'App\Http\Controllers\PermissionController@index')->name('permissions');
	Route::get('/permissions/create', ['as' => 'permissions - create', 'uses' => 'App\Http\Controllers\PermissionController@create']);
	Route::any('/permissions/store', ['as' => 'permissions.store', 'uses' => 'App\Http\Controllers\PermissionController@store']);
	Route::any('/permissions/{permission}/edit', ['as' => 'permissions - edit', 'uses' => 'App\Http\Controllers\PermissionController@edit']);
	Route::put('/permissions/{permission}/update', ['as' => 'permissions.update', 'uses' => 'App\Http\Controllers\PermissionController@update']);
	Route::any('/permissions/{permission}/destroy', ['as' => 'permissions.destroy', 'uses' => 'App\Http\Controllers\PermissionController@destroy']);	
	
	Route::get('/profile/{user}/edit', ['as' => 'profile - edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('/profile/{user}/update', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('/profile/{user}/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});