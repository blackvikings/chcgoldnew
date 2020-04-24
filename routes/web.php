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
    return view('auth.login');
});

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
   	Route::resource('permissions', 'PermissionController');
   	Route::resource('terms', 'TermController');
   	Route::resource('tags', 'TagController');
});

Route::get('/admin/home', 'HomeController@index')->name('home');
Route::post('/admin/role-assign', 'UserController@roleassign')->name('role-assign');

Route::get('/admin/manage-user', 'UserController@index')->name('manage.user');
Route::get('/admin/create-user', 'UserController@create')->name('create.user.view');
Route::post('/admin/create-user', 'UserController@store')->name('create.user');
Route::get('/admin/edit-user/{id}', 'UserController@edit')->name('edit-user');
Route::patch('/admin/edit-user/{id}', 'UserController@update')->name('update.user');
Route::delete('/admin/delete-user/{id}', 'UserController@destroy')->name('delete.user');

Route::get('/admin/roles', 'RolesController@index')->name('manage.roles');
Route::get('/admin/roles-create', 'RolesController@createview')->name('roles-create-view');
Route::post('/admin/roles-create', 'RolesController@create')->name('roles-create');
Route::get('/admin/roles-update/{role}', 'RolesController@updateview')->name('roles.update.view');
Route::patch('/admin/roles-update/{role}', 'RolesController@update')->name('roles.update');
Route::delete('/admin/roles-delete/{role}', 'RolesController@destroy')->name('roles.delete');

Route::get('/admin/roles-permissions/{slug}', 'RoleAndPermissionsController@index')->name('assign');    
Route::post('/admin/assign-permission', 'RoleAndPermissionsController@assign')->name('permissions-assign');
Route::post('/admin/unassign-permission', 'RoleAndPermissionsController@unassign')->name('permission.unassign');

Route::get('/admin/permissions', 'PermissionController@index')->name('manage.permissions');
Route::get('/admin/permission-create', 'PermissionController@createview')->name('permission.create.view');
Route::post('/admin/permission-create', 'PermissionController@create')->name('permission.create');
Route::get('/admin/permission-update/{permission}', 'PermissionController@updateview')->name('permission-update-view');
Route::patch('/admin/permission-update/{permission}', 'PermissionController@update')->name('permission-update');
Route::delete('/admin/permission-delete/{permission}', 'PermissionController@destroy')->name('permission.delete');

Route::get('/admin/manage-party', 'PartyController@index')->name('manage.party');
Route::post('/admin/manage-party', 'PartyController@store')->name('store.party');
Route::post('/admin/edit-party', 'PartyController@edit')->name('edit.party');
Route::post('/admin/update-party', 'PartyController@update')->name('update.party');

Route::get('/admin/receiving', 'BillController@index')->name('receiving');
Route::post('/admin/party-parameter', 'BillController@partyParameter')->name('party.parameter');
Route::post('/admin/bill-store', 'BillController@store')->name('bill.store');

Route::get('/admin/edit-receiving', 'BillController@edit')->name('edit.receiving');
Route::post('/admin/get-bill', 'BillController@show')->name('bill.edit');
Route::post('/admin/get-bill-details', 'BillController@fullDetails')->name('full.details');
Route::post('/admin/update-bill/{billid}', 'BillController@update')->name('update.bill');

Route::get('admin/fireassay', 'FireassayController@index')->name('fireassay');
Route::post('admin/fireassay-bills', 'FireassayController@create')->name('fireassay.bills');

Route::get('/admin/refine', 'RefineController@index')->name('refine');
Route::post('/admin/refine-single', 'RefineController@create')->name('refine.single');
Route::post('/admin/refine-update', 'RefineController@update')->name('update.bill');
Route::post('/admin/load-batch', 'RefineController@batch')->name('load.batch');
Route::post('/admin/total-batch', 'RefineController@loadbatch')->name('total.batch');
Route::post('/admin/save-refine', 'RefineController@store')->name('save.refine');
Route::post('/admin/get-refines', 'RefineController@show')->name('get.refines');
Route::delete('/admin/delete-refine/{id}', 'RefineController@destroy')->name('delete.refine');

Route::get('/admin/stock', 'StockController@index')->name('stock');

Route::get('/admin/ledger', 'LedgerController@index')->name('ledger');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});