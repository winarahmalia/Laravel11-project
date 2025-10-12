<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SalaryController;

Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Membuat semua route CRUD untuk masing-masing resource
Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('positions', PositionController::class);
Route::resource(name: 'attendances', controller: AttendanceController::class);
Route::resource(name:'salaries',controller: SalaryController::class);
