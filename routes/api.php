<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipatesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/agencies', [AgencyController::class, 'index']);
Route::get('/agencies/{id}', [AgencyController::class, 'show']);
Route::post('/agencies', [AgencyController::class, 'store']);
Route::put('/agencies/{id}', [AgencyController::class, 'update']);
Route::delete('/agencies/{id}', [AgencyController::class, 'destroy']);

Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);
Route::put('/events/{id}', [EventController::class, 'update']);
Route::delete('/events/{id}', [EventController::class, 'destroy']);

Route::get('/participates', [ParticipatesController::class, 'index']);
Route::get('/participates/{event_id}/{user_id}', [ParticipatesController::class, 'show']);
Route::post('/participates', [ParticipatesController::class, 'store']);
Route::put('/participates/{event_id}/{user_id}', [ParticipatesController::class, 'update']);
Route::delete('/participates/{event_id}/{user_id}', [ParticipatesController::class, 'destroy']);
Route::get('with/osszes', [ParticipatesController::class, 'osszes']);

Route::middleware(['auth.basic'])->group(function() {
    Route::patch('/modosit/{id}', [UserController::class, 'modosit']);
    Route::get('/users/jelenvolt/{orszag}', [UserController::class, 'jelenVolt']);
});
