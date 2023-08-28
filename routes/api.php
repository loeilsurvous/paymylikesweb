<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/publications', [PublicationController::class, 'index']);
    Route::post('/publications', [PublicationController::class, 'store']);
    Route::get('/publications/{id}', [PublicationController::class, 'show']);
    Route::put('/publications/{id}', [PublicationController::class, 'update']);
    Route::delete('/publications/{id}', [PublicationController::class, 'destroy']);
});