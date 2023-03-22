<?php

use App\Http\Controllers\CountryController;
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

Route::prefix('user')->name('user.')->group(function () {
    Route::post('store', [UserController::class, 'storeApi'])->name('storeApi');
    Route::get('list', [UserController::class, 'listApi'])->name('listApi');
});

Route::prefix('country')->name('country.')->group(function () {
    Route::get('list', [CountryController::class, 'list'])->name('list');
});

