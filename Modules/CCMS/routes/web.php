<?php

use Illuminate\Support\Facades\Route;
use Modules\CCMS\Http\Controllers\PageController;
use Modules\CCMS\Http\Controllers\SettingController;

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

Route::group(['middleware' => ['web','auth']], function () {
    Route::put('page/{id}/update-content', [PageController::class, 'updateContent'])->name('page.updateContent');
    Route::resource('page', PageController::class)->names('page');
    Route::resource('setting', SettingController::class)->names('setting')->only(['index', 'store']);
});
