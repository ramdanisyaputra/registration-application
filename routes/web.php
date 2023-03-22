<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('user.register');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('store', [UserController::class, 'store'])->name('store');
    Route::get('list', [UserController::class, 'list'])->name('list');
});
