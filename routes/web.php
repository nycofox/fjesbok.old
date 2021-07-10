<?php

use Illuminate\Support\Facades\Route;

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

/**
 * Authentication routes
 */
require __DIR__ . '/auth.php';

Route::get('hackday', function() {
    return 'Welcome to Hackday!';
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

    /**
     * Posts
     */
    Route::get('createpost', [\App\Http\Controllers\PostController::class, 'create'])
        ->name('post.create');
    Route::post('createpost', [\App\Http\Controllers\PostController::class, 'store'])
        ->name('post.store');
    Route::post('p/{post}/destroy', [\App\Http\Controllers\PostController::class, 'destroy'])
        ->name('post.destroy');
    Route::get('p/{post}', [\App\Http\Controllers\PostController::class, 'show'])
        ->name('post.show');

//    Route::post('p/{post}/comment', [\App\Http\Controllers\PostController::class, 'addComment'])->name('post.comment');

    /**
     * User Profile
     */
    Route::get('u/{user}', [\App\Http\Controllers\User\ProfileController::class, 'show'])->name('profile');

    /**
     * User Settings
     */
    Route::get('settings', [\App\Http\Controllers\User\SettingsController::class, 'show'])
        ->name('settings');
    Route::get('settings/password', [\App\Http\Controllers\User\ChangePasswordController::class, 'edit'])
        ->name('settings.password');
    Route::patch('settings/password', [\App\Http\Controllers\User\ChangePasswordController::class, 'update'])
        ->name('settings.password');

    /**
     * Admin routes
     */
    require __DIR__ . '/_admin.php';

    /**
     * Webcomics frontend
     */
    Route::middleware('role:webcomics')->group(function () {
//        Route::get('/webcomics/index', [\App\Http\Controllers\WebcomicController::class, 'index'])
//            ->name('webcomics.index');
        Route::get('/webcomics/{date?}', [\App\Http\Controllers\WebcomicController::class, 'show'])
            ->name('webcomics.show');
    });

});
