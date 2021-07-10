<?php

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');

    });
});
