<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::name('users.')->prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });

    Route::name('logs.')->prefix('logs')->group(function () {
        Route::get('', [LogController::class, 'index'])
            ->name('index')
            ->middleware(['permission:users.index']);
    });

    Route::resource('categories', CategoryController::class)->only([
        'index', 'create', 'edit'
    ]);

    Route::resource('platforms', PlatformController::class)->only([
        'index', 'create', 'edit'
    ]);

    Route::resource('list', ListController::class)->only([
        'index',
    ]);


});
