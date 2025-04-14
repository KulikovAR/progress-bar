<?php

use App\Http\Controllers\Auth\AuthSessionController;
use App\Http\Controllers\PrivateStorageController;
use App\Http\Controllers\ProgressBarController;
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
| Get csrf token if front on same domain:
| GET|HEAD  sanctum/csrf-cookie
|
*/
Route::post('/login/session', [AuthSessionController::class, 'store'])->name('login.stateful');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/private/{filePath}', [PrivateStorageController::class, 'index'])->where(['filePath' => '.*'])->name('storage.view');
    Route::delete('/logout/session', [AuthSessionController::class, 'destroy'])->name('logout.stateful');
});

Route::get('/storage/private/{filePath}', [PrivateStorageController::class, 'index'])->middleware(['signed', 'throttle:60,1'])->where(['filePath' => '.*'])->name('storage.private');

Route::middleware(['telegram.auth'])->group(function () {
    Route::get('/', [ProgressBarController::class, 'index'])->name('progress-bars.index');
    Route::post('/progress-bars', [ProgressBarController::class, 'store'])->name('progress-bars.store');
    Route::put('/progress-bars/{progressBar}', [ProgressBarController::class, 'update'])->name('progress-bars.update');
    Route::delete('/progress-bars/{progressBar}', [ProgressBarController::class, 'destroy'])->name('progress-bars.destroy');
});

Route::get('/', [App\Http\Controllers\DesignController::class, 'index'])->name('design');
Route::post('/select-design', [App\Http\Controllers\DesignController::class, 'select'])->name('select-design');
