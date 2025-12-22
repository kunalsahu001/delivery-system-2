<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeliveryPersonnelController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
| These routes are loaded by the RouteServiceProvider within a group 
| which contains the "web" middleware group.
|
*/

// Authentication Routes
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('doLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (only for logged-in users)
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard.index');

    // Orders CRUD
    Route::resource('orders', OrderController::class);

    // Assignments
    Route::prefix('assignments')->group(function () {
        // List all assignments
        Route::get('/', [AssignmentController::class, 'index'])
            ->name('assignments.index');

        // Assign a specific order to personnel
        Route::post('assign-order/{order}', [AssignmentController::class, 'assignOrder'])
            ->name('assignments.assign');

        // Mark an assignment as delivered
        Route::post('{assignment}/delivered', [AssignmentController::class, 'markDelivered'])
            ->name('assignments.delivered');
    });

    // Delivery Personnel
    Route::get('/delivery-personnel', [DeliveryPersonnelController::class, 'index'])
        ->name('delivery-personnel.index');
});
