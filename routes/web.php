<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\BathOverviewController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\FireassayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IssuingController;
use App\Http\Controllers\LedgerController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReceptionController;
use App\Http\Controllers\RefineController;
use App\Http\Controllers\RoleAndPermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TestingReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolesController::class);
    Route::resource('users', UserController::class);
   	Route::resource('permissions', PermissionController::class);
});


Route::get('/admin/home', [HomeController::class, 'index'])->name('home');
Route::post('/admin/role-assign', [UserController::class, 'roleassign'])->name('role-assign');

Route::get('/admin/manage-user', [UserController::class, 'index'])->name('manage.user');
Route::get('/admin/create-user', [UserController::class, 'create'])->name('create.user.view');
Route::post('/admin/create-user', [UserController::class, 'store'])->name('create.user');
Route::get('/admin/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::patch('/admin/edit-user/{id}', [UserController::class, 'update'])->name('update.user');
Route::delete('/admin/delete-user/{id}', [UserController::class, 'destroy'])->name('delete.user');

Route::get('/admin/roles', [RolesController::class, 'index'])->name('manage.roles');
Route::get('/admin/roles-create', [RolesController::class, 'createview'])->name('roles-create-view');
Route::post('/admin/roles-create', [RolesController::class, 'create'])->name('roles-create');
Route::get('/admin/roles-update/{role}', [RolesController::class, 'updateview'])->name('roles.update.view');
Route::patch('/admin/roles-update/{role}', [RolesController::class, 'update'])->name('roles.update');
Route::delete('/admin/roles-delete/{role}', [RolesController::class, 'destroy'])->name('roles.delete');

Route::get('/admin/roles-permissions/{slug}', [RoleAndPermissionsController::class, 'index'])->name('assign');
Route::post('/admin/assign-permission', [RoleAndPermissionsController::class, 'assign'])->name('permissions-assign');
Route::post('/admin/unassign-permission', [RoleAndPermissionsController::class, 'unassign'])->name('permission.unassign');

Route::get('/admin/permissions', [PermissionController::class, 'index'])->name('manage.permissions');
Route::get('/admin/permission-create', [PermissionController::class, 'createview'])->name('permission.create.view');
Route::post('/admin/permission-create', [PermissionController::class, 'create'])->name('permission.create');
Route::get('/admin/permission-update/{permission}', [PermissionController::class, 'updateview'])->name('permission-update-view');
Route::patch('/admin/permission-update/{permission}', [PermissionController::class, 'update'])->name('permission-update');
Route::delete('/admin/permission-delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.delete');

Route::get('/admin/manage-party', [PartyController::class, 'index'])->name('manage.party');
Route::post('/admin/manage-party', [PartyController::class, 'store'])->name('store.party');
Route::post('/admin/edit-party', [PartyController::class, 'edit'])->name('edit.party');
Route::post('/admin/update-party', [PartyController::class, 'update'])->name('update.party');

Route::get('/admin/receiving', [BillController::class, 'index'])->name('receiving');
Route::post('/admin/party-parameter', [BillController::class, 'partyParameter'])->name('party.parameter');
Route::post('/admin/bill-store', [BillController::class, 'store'])->name('bill.store');

Route::get('/admin/edit-receiving', [BillController::class, 'edit'])->name('edit.receiving');
Route::post('/admin/get-bill', [BillController::class, 'show'])->name('bill.edit');
Route::post('/admin/get-bill-details', [BillController::class, 'fullDetails'])->name('full.details');
Route::post('/admin/update-bill/{billid}', [BillController::class, 'update'])->name('update.bill');

Route::get('admin/fireassay', [FireassayController::class, 'index'])->name('fireassay');
Route::post('admin/fireassay-bills', [FireassayController::class, 'create'])->name('fireassay.bills');

Route::get('/admin/refine', [RefineController::class, 'index'])->name('refine');
Route::post('/admin/refine-single', [RefineController::class, 'create'])->name('refine.single');
Route::post('/admin/refine-update', [RefineController::class, 'update'])->name('update.bill');
Route::post('/admin/load-batch', [RefineController::class, 'batch'])->name('load.batch');
Route::post('/admin/total-batch', [RefineController::class, 'loadbatch'])->name('total.batch');
Route::post('/admin/save-refine', [RefineController::class, 'store'])->name('save.refine');
Route::post('/admin/get-refines', [RefineController::class, 'show'])->name('get.refines');
Route::delete('/admin/delete-refine/{id}', [RefineController::class, 'destroy'])->name('delete.refine');

Route::get('/admin/stock', [StockController::class, 'index'])->name('stock');
Route::post('/admin/get-stocks', [StockController::class, 'create'])->name('get.stocks');
Route::post('/admin/update-stocks', [StockController::class, 'update'])->name('update.stocks');
Route::post('/admin/get-accounts', [StockController::class, 'account'])->name('get.account');
Route::post('/admin/store-account-data', [StockController::class, 'store'])->name('store.account');

Route::get('/admin/refine-monthly-overview', [RefineController::class, 'overview'])->name('refine.monthly.overview');

Route::get('/admin/ledger', [LedgerController::class, 'index'])->name('ledger');
Route::post('/admin/get-party-ledgers', [LedgerController::class, 'create'])->name('get.party.ledgers');
Route::post('/admin/stock-details', [LedgerController::class, 'store'])->name('stock.details');

Route::get('/admin/reception', [ReceptionController::class, 'index'])->name('reception');
Route::post('/admin/reception', [ReceptionController::class, 'store'])->name('reception.store');

Route::get('/admin/issuing', [IssuingController::class, 'index'])->name('issuing');
Route::post('/admin/issue-vouchers', [IssuingController::class, 'create'])->name('issue.voucher');
Route::post('/admin/issue-voucher-store', [IssuingController::class, 'store'])->name('issue.voucher.store');
Route::get('/admin/print-issue-voucher', [IssuingController::class, 'show'])->name('print.issued.voucher');

Route::get('/admin/bath-overview', [BathOverviewController::class, 'index'])->name('bath.overview');

Route::get('/admin/testing-report', [TestingReportController::class, 'index'])->name('testing.report');
Route::post('/admin/testing-report-store', [TestingReportController::class, 'store'])->name('store.testing.voucher');
Route::post('/admin/get-testing-vouchers', [TestingReportController::class, 'update'])->name('get.tesing.vouchers');
Route::get('/admin/testing-voucher-print/{voucher}', [TestingReportController::class, 'edit'])->name('get.voucher.print');

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
