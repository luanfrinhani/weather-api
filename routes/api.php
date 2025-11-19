<?php

use Illuminate\Support\Facades\Route;
use Src\Interface\Controller\V1\HealthCheckController;
use Src\Interface\Controller\V1\WeatherController;

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
Route::group(['prefix' => 'v1'], function () {
    Route::get('/health', HealthCheckController::class);
    Route::get('/weather', [WeatherController::class, 'getLocationWeather']);
});
