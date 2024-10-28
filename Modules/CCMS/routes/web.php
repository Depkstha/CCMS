<?php

use Illuminate\Support\Facades\Route;
use Modules\CCMS\Http\Controllers\CategoryController;
use Modules\CCMS\Http\Controllers\PageController;
use Modules\CCMS\Http\Controllers\SettingController;
use Modules\CCMS\Http\Controllers\SliderController;
use Modules\CCMS\Http\Controllers\TeamController;

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

    Route::post('page/reorder', [PageController::class, 'reorder'])->name('page.reorder');
    Route::get('page/{id}/edit-content', [PageController::class, 'editContent'])->name('page.editContent');
    Route::put('page/{id}/update-content', [PageController::class, 'updateContent'])->name('page.updateContent');
    Route::resource('page', PageController::class)->names('page')->except(['create']);

    Route::resource('setting', SettingController::class)->names('setting')->only(['index', 'store']);

    Route::post('slider/reorder', [SliderController::class, 'reorder'])->name('slider.reorder');
    Route::resource('slider', SliderController::class)->names('slider');

    Route::post('team/reorder', [TeamController::class, 'reorder'])->name('team.reorder');
    Route::resource('team', TeamController::class)->names('team');

    Route::post('category/reorder', [CategoryController::class, 'reorder'])->name('category.reorder');
    Route::get('category/{id?}', [CategoryController::class, 'index'])->name('category.index');
    Route::resource('category', CategoryController::class)->names('category')->only(['store', 'edit', 'destroy']);
});
