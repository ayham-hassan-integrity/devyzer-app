<?php

use App\Domains\SecondEntity\Http\Controllers\Backend\Secondentity\DeletedSecondentityController;
use App\Domains\SecondEntity\Http\Controllers\Backend\Secondentity\SecondentityController;
use App\Domains\SecondEntity\Models\Secondentity;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'secondentity',
    'as' => 'secondentity.',
], function () {

    Route::get('/', [SecondentityController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__(' Secondentities'), route('admin.secondentity.index'));
        });


    Route::get('deleted', [DeletedSecondentityController::class, 'index'])
        ->name('deleted')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.secondentity.index')
                ->push(__('Deleted  Secondentities'), route('admin.secondentity.deleted'));
        });


    Route::get('create', [SecondentityController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.secondentity.index')
                ->push(__('Create Secondentity'), route('admin.secondentity.create'));
        });

    Route::post('/', [SecondentityController::class, 'store'])->name('store');

    Route::group(['prefix' => '{secondentity}'], function () {
        Route::get('/', [SecondentityController::class, 'show'])
            ->name('show')
            ->breadcrumbs(function (Trail $trail, Secondentity $secondentity) {
                $trail->parent('admin.secondentity.index')
                    ->push($secondentity->id, route('admin.secondentity.show', $secondentity));
            });

        Route::get('edit', [SecondentityController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, Secondentity $secondentity) {
                $trail->parent('admin.secondentity.show', $secondentity)
                    ->push(__('Edit'), route('admin.secondentity.edit', $secondentity));
            });

        Route::patch('/', [SecondentityController::class, 'update'])->name('update');
        Route::delete('/', [SecondentityController::class, 'destroy'])->name('destroy');
    });

    Route::group(['prefix' => '{deletedSecondentity}'], function () {
        Route::patch('restore', [DeletedSecondentityController::class, 'update'])->name('restore');
        Route::delete('permanently-delete', [DeletedSecondentityController::class, 'destroy'])->name('permanently-delete');
    });
});