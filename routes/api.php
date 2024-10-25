<?php

use App\Http\Controllers\EmployeeApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/employees', [EmployeeApiController::class, 'index']);
Route::get('/employee/id/{id}', [EmployeeApiController::class, 'employeeById']);
Route::get('/employee/name/{name}', [EmployeeApiController::class, 'employeeByName']);
Route::get('/employee/position/{position}', [EmployeeApiController::class, 'employeeByPosition']);
Route::get('/employee/department/{department}', [EmployeeApiController::class, 'employeeByDepartment']);