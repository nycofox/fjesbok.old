<?php

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {
    Route::name('admin.')->group(function () {

        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');


        /**
         * Webcomics
         */
        Route::resource('webcomics', \App\Http\Controllers\Admin\Webcomics\WebcomicController::class);

        Route::get('webcomics/{webcomic}', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'index'])->name('webcomics.sources');
        Route::get('webcomics/{webcomic}/createsource', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'create'])->name('webcomics.sources.create');
        Route::post('webcomics/{webcomic}/createsource', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'store'])->name('webcomics.sources.store');
        Route::get('webcomics/{webcomic}/{source}', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'edit'])->name('webcomics.sources.edit');
        Route::patch('webcomics/{webcomic}/{source}', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'update'])->name('webcomics.sources.update');
        Route::get('webcomics/{webcomic}/{source}/scrape', [\App\Http\Controllers\Admin\Webcomics\WebcomicSourceController::class, 'scrape'])->name('webcomics.sources.scrape');
    });
});
