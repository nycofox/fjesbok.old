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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth']);

    Route::get('createpost', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('createpost', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
    Route::post('p/{post}/destroy', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.destroy');
    Route::get('p/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

//    Route::post('p/{post}/comment', [\App\Http\Controllers\PostController::class, 'addComment'])->name('post.comment');

    Route::get('u/{user}', [\App\Http\Controllers\User\ProfileController::class, 'show'])->name('profile');

    require __DIR__ . '/_admin.php';

});
