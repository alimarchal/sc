<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
    return redirect()->route('login');
});

//Route::middleware(['auth:sanctum', 'verified'])->resource('/dashboard', \App\Http\Controllers\DashboardController::class,'index']);
//function () {
//    return view('layouts.master');
//})->name('dashboard');



Route::middleware(['auth:sanctum', 'verified'])->get('/blank-page', function () {
    return view('layouts.page');
})->name('blank.page');

Route::middleware(['auth:sanctum', 'verified'])->get('/test', function () {
    return view('test.test');
})->name('test.page');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('courtCaseSecs', \App\Http\Controllers\CourtCaseSecController::class);
Route::resource('courtCaseAotr', \App\Http\Controllers\CourtCaseAotrController::class);
Route::resource('franchiseWiseRevenue', \App\Http\Controllers\FranchiseWiseRevenueController::class);

Route::resource('siteState', \App\Http\Controllers\SiteStateController::class);

Route::resource('monthlySaleProgress', \App\Http\Controllers\MonthlySaleProgressController::class);
Route::resource('monthlySaleProgressMpr', \App\Http\Controllers\MonthlySaleProgressMprController::class);

Route::resource('monthlyStockSummery', \App\Http\Controllers\MonthlyStockSummeryController::class);
Route::resource('monthlyStockSummeryMpr', \App\Http\Controllers\MonthlyStockSummeryMprController::class);

Route::resource('corporateCustomer', \App\Http\Controllers\CorporateCustomerDataController::class);
Route::resource('monthlyReportPostPaid', \App\Http\Controllers\MonthlyReportPostPaidController::class);

Route::resource('customerServiceCenter', \App\Http\Controllers\CustomerServiceCenterController::class);
Route::resource('simSale', \App\Http\Controllers\SimsSaleController::class);
Route::resource('consumerComplaints', \App\Http\Controllers\ConsumerComplaintsController::class);

// main dashboard
//Route::resource('snet-sphone', \App\Http\Controllers\SnetSphoneController::class);
Route::resource('bts-tower', \App\Http\Controllers\BtsTowerController::class);
Route::resource('revenue-target', \App\Http\Controllers\RevenueTargetController::class);
Route::resource('snet', \App\Http\Controllers\SnetController::class);
Route::resource('sphone', \App\Http\Controllers\SphoneController::class);
Route::resource('monthly-network-status', \App\Http\Controllers\MonthlyNetworkStatusController::class);

Route::resource('monthlyDslRevAotr', \App\Http\Controllers\MonthlyDslRevAotrController::class);
Route::resource('scoRevenueCollectionAotr', \App\Http\Controllers\ScoRevenueCollectionAotrController::class);
Route::resource('cCaseAotr', \App\Http\Controllers\CCaseAotrController::class);

Route::resource('fortnightlyReportSphone', \App\Http\Controllers\FortnightlyReportSphoneController::class);
Route::resource('fortnightlyReportCdma', \App\Http\Controllers\FortnightlyReportCdmaController::class);
Route::resource('fortnightlyReportPmc', \App\Http\Controllers\FortnightlyReportPmcController::class);

Route::resource('allocationSaleTgt', \App\Http\Controllers\AllocationSaleTgtController::class);

Route::resource('user', \App\Http\Controllers\UserController::class)->middleware('role:admin');

Route::resource('weeklyProgressSpc', \App\Http\Controllers\WeeklyProgressSpcController::class);
Route::resource('weeklyProgressSpcSphone', \App\Http\Controllers\WeeklyProgressSpcSphoneController::class);

Route::resource('revCollN', \App\Http\Controllers\RevCollNController::class);



//Route::get('/role', function () {
//    app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
//
//    $role1 = Role::create(['name' => 'Sector HQ']);
//    $role2 = Role::create(['name' => 'CSB 61']);
//    $role3 = Role::create(['name' => 'CSB 64']);
//    $role4 = Role::create(['name' => 'AOTR MZD']);
//    $role5 = Role::create(['name' => 'AOTR MPR']);
//    $role6 = Role::create(['name' => 'admin']);
//
//    $permission1 = Permission::create(['name' => 'create']);
//    $permission2 = Permission::create(['name' => 'read']);
//    $permission3 = Permission::create(['name' => 'update']);
//    $permission4 = Permission::create(['name' => 'delete']);
//
//    $role1->givePermissionTo($permission2);
//    $role1->givePermissionTo($permission3);
//
//    $role2->givePermissionTo($permission1);
//    $role2->givePermissionTo($permission2);
//    $role2->givePermissionTo($permission3);
//
//
//    $role3->givePermissionTo($permission1);
//    $role3->givePermissionTo($permission2);
//    $role4->givePermissionTo($permission3);
//
//
//    $role4->givePermissionTo($permission1);
//    $role4->givePermissionTo($permission2);
//    $role4->givePermissionTo($permission3);
//
//
//    $role5->givePermissionTo($permission1);
//    $role5->givePermissionTo($permission2);
//    $role5->givePermissionTo($permission3);
//
//
//    $role6->givePermissionTo($permission1);
//    $role6->givePermissionTo($permission2);
//    $role6->givePermissionTo($permission3);
//    $role6->givePermissionTo($permission4);
//
//});

