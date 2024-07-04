<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\EmployeeController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\TaskController;
use App\Http\Controllers\Dashboard\DashboardController;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin-dashboard','middleware' => 'auth'],function (){

    Route::get('/',[DashboardController::class,'index']);

    Route::group(['prefix' => 'employee','middleware' => 'manager'],function(){
        Route::get('/',[EmployeeController::class,'index']);
        Route::get('create',[EmployeeController::class,'create']);
        Route::post('create',[EmployeeController::class,'store']);
        Route::get('{id}/edit',[EmployeeController::class,'edit']);
        Route::patch('{id}/edit',[EmployeeController::class,'update']);
        Route::delete('{id}/delete',[EmployeeController::class,'destroy']);
    });

    Route::group(['prefix' => 'department','middleware' => 'manager'],function(){
        Route::get('/',[DepartmentController::class,'index']);
        Route::get('create',[DepartmentController::class,'create']);
        Route::post('create',[DepartmentController::class,'store']);
        Route::get('{id}/edit',[DepartmentController::class,'edit']);
        Route::patch('{id}/edit',[DepartmentController::class,'update']);
        Route::delete('{id}/delete',[DepartmentController::class,'destroy']);
    });

    Route::group(['prefix' => 'task'],function(){
        Route::get('/',[TaskController::class,'index']);
        Route::get('create',[TaskController::class,'create'])->middleware('manager');
        Route::post('create',[TaskController::class,'store'])->middleware('manager');
        Route::get('{id}/edit',[TaskController::class,'edit'])->middleware('manager');
        Route::patch('{id}/edit',[TaskController::class,'update'])->middleware('manager');
        Route::delete('{id}/delete',[TaskController::class,'destroy'])->middleware('manager');
        Route::patch('{id}/change-status',[TaskController::class,'changeStatus']);
    });

});

//\Illuminate\Support\Facades\Auth::routes();

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
