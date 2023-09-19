<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});
//Route::get('dashboard',function (){
//    return view('dashboard');
//});
Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

Route::get('dashboard/campanies',[CompanyController::class,'index'])->name('dashboard.campanies.index');
Route::get('dashboard/campanies/create',[CompanyController::class,'create'])->name('dashboard.campanies.create');
Route::post('dashboard/campanies/store',[CompanyController::class,'store'])->name('dashboard.campanies.store');
Route::put('dashboard/campanies/update/{id}',[CompanyController::class,'update'])->name('dashboard.campanies.update');
Route::get('dashboard/campanies/edit/{id}',[CompanyController::class,'edit'])->name('dashboard.campanies.edit');
Route::delete('dashboard/campanies/store/{id}',[CompanyController::class,'destroy'])->name('dashboard.campanies.destroy');
//----------------------------------
Route::get('dashboard/employees',[EmployeeController::class,'index'])->name('dashboard.employees.index');
Route::get('dashboard/employees/create',[EmployeeController::class,'create'])->name('dashboard.employees.create');
Route::post('dashboard/employees/store',[EmployeeController::class,'store'])->name('dashboard.employees.store');
Route::put('dashboard/employees/update/{id}',[EmployeeController::class,'update'])->name('dashboard.employees.update');
Route::get('dashboard/employees/edit/{id}',[EmployeeController::class,'edit'])->name('dashboard.employees.edit');
Route::delete('dashboard/employees/store/{id}',[EmployeeController::class,'destroy'])->name('dashboard.employees.destroy');


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
