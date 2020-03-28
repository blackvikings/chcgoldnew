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

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
   	Route::resource('permissions', 'PermissionController');
   	Route::resource('terms', 'TermController');
   	Route::resource('tags', 'TagController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/role-assign', 'UserController@roleassign')->name('role-assign');

Route::get('/manage-user', 'UserController@index')->name('manage.user');
Route::get('/create-user', 'UserController@create')->name('create.user.view');
Route::post('/create-user', 'UserController@store')->name('create.user');
Route::get('/edit-user/{id}', 'UserController@edit')->name('edit-user');
Route::patch('/edit-user/{id}', 'UserController@update')->name('update.user');
Route::delete('/delete-user/{id}', 'UserController@destroy')->name('delete.user');

Route::get('/roles', 'RolesController@index')->name('manage.roles');
Route::get('/roles-create', 'RolesController@createview')->name('roles-create-view');
Route::post('/roles-create', 'RolesController@create')->name('roles-create');
Route::get('/roles-update/{role}', 'RolesController@updateview')->name('roles.update.view');
Route::patch('/roles-update/{role}', 'RolesController@update')->name('roles.update');
Route::delete('/roles-delete/{role}', 'RolesController@destroy')->name('roles.delete');

Route::get('/roles-permissions/{slug}', 'RoleAndPermissionsController@index')->name('assign');    
Route::post('/assign-permission', 'RoleAndPermissionsController@assign')->name('permissions-assign');
Route::post('/unassign-permission', 'RoleAndPermissionsController@unassign')->name('permission.unassign');

Route::get('/permissions', 'PermissionController@index')->name('manage.permissions');
Route::get('/permission-create', 'PermissionController@createview')->name('permission.create.view');
Route::post('/permission-create', 'PermissionController@create')->name('permission.create');
Route::get('/permission-update/{permission}', 'PermissionController@updateview')->name('permission-update-view');
Route::patch('/permission-update/{permission}', 'PermissionController@update')->name('permission-update');
Route::delete('/permission-delete/{permission}', 'PermissionController@destroy')->name('permission.delete');

Route::get('/manage-party', 'PartyController@index')->name('manage.party');
Route::post('/manage-party', 'PartyController@store')->name('store.party');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});