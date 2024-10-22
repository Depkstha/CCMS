<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\UserController;

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

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('user/reorder', [UserController::class, 'reorder'])->name('user.reorder');
    Route::get('user/{id?}', [UserController::class, 'index'])->name('user.index');
    Route::resource('user', UserController::class)->names('user')->only(['store', 'edit', 'destroy']);
});
