<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

// Route ini sudah mencakup halaman untuk menampilkan semua data (index)
Route::resource('employees', EmployeeController::class);
Route::get('/', function () {
    return view('welcome');
});
