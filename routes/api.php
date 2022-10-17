<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::patch('/settings',[EmployeeController::class,'update']);
Route::post('/employees',[EmployeeController::class,'storeEmployee']);//
Route::post('/overtimes',[EmployeeController::class,'storeOvertimes']);
Route::get('/overtime-pays/calculate',[EmployeeController::class,'calculate']);