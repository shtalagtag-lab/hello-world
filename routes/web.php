<?php

use App\Http\Controllers\StaffController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SupplyItemController;
use App\Http\Controllers\RequestStatusController;
use App\Http\Controllers\SupplyRequestController;
use App\Http\Controllers\RequestDetailController;
use App\Http\Controllers\RequestLimitRuleController;
use App\Http\Controllers\RequestLogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// CRUD Resource Routes
Route::resource('staff', StaffController::class);
Route::resource('accounts', AccountController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('supply-items', SupplyItemController::class);
Route::resource('request-statuses', RequestStatusController::class);
Route::resource('supply-requests', SupplyRequestController::class);
Route::resource('request-details', RequestDetailController::class);
Route::resource('request-limit-rules', RequestLimitRuleController::class);
Route::resource('request-logs', RequestLogController::class);
