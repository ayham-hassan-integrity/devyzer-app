<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\SecondEntity\Http\Controllers\Api\Secondentity\SecondentityController;

Route::group([
    'prefix' => 'secondentity',
    'as' => 'secondentity.',
], function () {

    Route::get('/', [SecondentityController::class, 'index'])->name('index');
    Route::post('/', [SecondentityController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [SecondentityController::class, 'show'])->name('show');
        Route::put('/', [SecondentityController::class, 'update'])->name('update');
        Route::delete('/', [SecondentityController::class, 'delete'])->name('destroy');
    });
});

use App\Domains\FirstEntity\Http\Controllers\Api\Firstentity\FirstentityController;

Route::group([
    'prefix' => 'firstentity',
    'as' => 'firstentity.',
], function () {

    Route::get('/', [FirstentityController::class, 'index'])->name('index');
    Route::post('/', [FirstentityController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [FirstentityController::class, 'show'])->name('show');
        Route::put('/', [FirstentityController::class, 'update'])->name('update');
        Route::delete('/', [FirstentityController::class, 'delete'])->name('destroy');
    });
});
