<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Route::prefix('post')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard_master');
    Route::get('/create', [DashboardController::class, 'create']);
    Route::post('/store', [DashboardController::class, 'store']);
    Route::get('/edit/{id}', [DashboardController::class, 'edit']);
    Route::post('/update', [DashboardController::class, 'update']);
    Route::delete('/delete/{id}', [DashboardController::class, 'delete']);
});

