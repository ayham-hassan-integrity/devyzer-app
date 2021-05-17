<?php

use App\Domains\FirstEntity\Http\Controllers\Backend\Firstentity\DeletedFirstentityController;
use App\Domains\FirstEntity\Http\Controllers\Backend\Firstentity\FirstentityController;
use App\Domains\FirstEntity\Models\Firstentity;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'firstentity',
    'as' => 'firstentity.',
], function () {

    Route::get('/', [FirstentityController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Firstentities'), route('admin.firstentity.index'));
        });


    Route::get('deleted', [DeletedFirstentityController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.firstentity.index')
                ->push(__('Deleted  Firstentities'), route('admin.firstentity.deleted'));
        });


    Route::get('create', [FirstentityController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.firstentity.index')
                ->push(__('Create Firstentity'), route('admin.firstentity.create'));
        });

    Route::post('/', [FirstentityController::class, 'store'])->name('store');

    Route::group(['prefix' => '{firstentity}'], function () {
        Route::get('/', [FirstentityController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Firstentity $firstentity) {
                $trail->parent('admin.firstentity.index')
                    ->push($firstentity->id, route('admin.firstentity.show', $firstentity));
            });

        Route::get('edit', [FirstentityController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Firstentity $firstentity) {
                $trail->parent('admin.firstentity.show', $firstentity)
                    ->push(__('Edit'), route('admin.firstentity.edit', $firstentity));
            });

        Route::patch('/', [FirstentityController::class, 'update'])->name('update');
        Route::delete('/', [FirstentityController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedFirstentity}'], function () {
        Route::patch('restore', [DeletedFirstentityController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedFirstentityController::class, 'destroy'])->name('permanently-delete');
    });
});