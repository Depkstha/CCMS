<?php

use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MenuController;

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

Route::group(['middleware' => ['auth', 'web'], 'prefix' => 'admin/'], function () {
    Route::get('menu/getMenuTypeOptions', [MenuController::class, 'getMenuTypeOptions'])->name('menu.getMenuTypeOptions');
    Route::get('menu/toggle/{id}', [MenuController::class, 'toggle'])->name('menu.toggle');
    Route::post('menu/reorder', [MenuController::class, 'reorder'])->name('menu.reorder');
    Route::resource('menu', MenuController::class)->names('menu');
});
