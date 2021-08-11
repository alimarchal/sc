<?php

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

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
});

