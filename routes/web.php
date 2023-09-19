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



Route::prefix('dashboard')->name('dashboard')->group(function (){
    Route::get('/',[DashboardController::class,'index']);
    Route::controller(CompanyController::class)->group(function (){
        Route::prefix('campanies')->name('.campanies.')->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::put('/update/{id}','update')->name('update');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::delete('/store/{id}','destroy')->name('destroy');
        });
        });

    Route::controller(EmployeeController::class)->group(function (){
        Route::prefix('employees')->name('.employees.')->group(function (){
            Route::get('/','index')->name('index');
            Route::get('/create','create')->name('create');
            Route::post('/store','store')->name('store');
            Route::put('/update/{id}','update')->name('update');
            Route::get('/edit/{id}','edit')->name('edit');
            Route::delete('/store/{id}','destroy')->name('destroy');
        });
        });

});


Auth::routes();

Route::get('/home', [DashboardController::class, 'index'])->name('home');
