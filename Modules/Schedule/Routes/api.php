<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Schedule\Http\Controllers\RoomController;
use Modules\Schedule\Http\Controllers\GroupController;
use Modules\Schedule\Http\Controllers\SubjectController;
use Modules\Schedule\Http\Controllers\ScheduleController;

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

Route::prefix('schedule')->middleware('auth:sanctum')->group(function() {
    
    // Get list of groups
    Route::get('/groups',[GroupController::class,'index']);

    // Get list of rooms
    Route::get('/rooms',[RoomController::class,'index']);

    // Get list of subjects
    Route::get('/subjects',[SubjectController::class,'index']);

    // CRUD of schedule
    Route::get('/', [ScheduleController::class,'index']);
    Route::post('/', [ScheduleController::class,'store']);
    Route::get('/{id}', [ScheduleController::class,'show']);
    Route::put('/{id}', [ScheduleController::class,'update']);
    Route::delete('/{id}', [ScheduleController::class,'destroy']);

});

// Route::middleware('auth:api')->get('/schedule', function (Request $request) {
//     return $request->user();
// });