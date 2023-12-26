<?php

use App\Http\Controllers\LogController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\NewsletterController;

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

Route::get('/', [ShowController::class, 'index'])->name('shows.index');
Route::get('/testroute', function(){
    $name='Hubert';

    Mail::to('hubertgrzesiak.dev@gmail.com')->send(new \App\Mail\NewEpisodeAlert($name));
});

// Add Subscriber email
Route::post('/add-subscriber-email', [NewsletterController::class, 'addSubscriber']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

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

    Route::get('async/categories', [CategoryController::class, 'async'])->name('async.categories');


    Route::resource('platforms', PlatformController::class)->only([
        'index', 'create', 'edit'
    ]);

    Route::get('async/platforms', [PlatformController::class, 'async'])->name('async.platforms');


    Route::resource('list', ListController::class)->only([
        'index',
    ]);

    Route::resource('shows', ShowController::class)->only(['create', 'edit']);

});
