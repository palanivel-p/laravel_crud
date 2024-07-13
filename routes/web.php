<?php

use App\Http\Controllers\EmpController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return config('app.env');
});
//emp route
Route::get('/employees',[EmpController::class,'index'])->name('employee.index');
Route::get('/employees/create',[EmpController::class,'create'])->name('employee.create');
Route::post('/employees/store',[EmpController::class,'store'])->name('employee.store');
Route::get('/employees/{id}',[EmpController::class,'show'])->name('employee.show');
Route::get('/employees/{id}/edit',[EmpController::class,'edit'])->name('employee.edit');
Route::put('/employees/{emp}/',[EmpController::class,'update'])->name('employee.update');
Route::delete('/employees/{id}',[EmpController::class,'destroy'])->name('employee.destroy');
