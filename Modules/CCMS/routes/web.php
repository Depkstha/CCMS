<?php

use Illuminate\Support\Facades\Route;
use Modules\CCMS\Http\Controllers\BlogController;
use Modules\CCMS\Http\Controllers\CategoryController;
use Modules\CCMS\Http\Controllers\CountryController;
use Modules\CCMS\Http\Controllers\FaqCategoryController;
use Modules\CCMS\Http\Controllers\FaqController;
use Modules\CCMS\Http\Controllers\GalleryCategoryController;
use Modules\CCMS\Http\Controllers\GalleryController;
use Modules\CCMS\Http\Controllers\InstitutionController;
use Modules\CCMS\Http\Controllers\PageController;
use Modules\CCMS\Http\Controllers\PartnerController;
use Modules\CCMS\Http\Controllers\PopupController;
use Modules\CCMS\Http\Controllers\ServiceController;
use Modules\CCMS\Http\Controllers\SettingController;
use Modules\CCMS\Http\Controllers\SliderController;
use Modules\CCMS\Http\Controllers\TeamController;
use Modules\CCMS\Http\Controllers\TestController;
use Modules\CCMS\Http\Controllers\TestimonialController;

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

Route::group(['middleware' => ['web', 'auth'],'prefix' => 'admin/'], function () {

    Route::post('page/reorder', [PageController::class, 'reorder'])->name('page.reorder');
    Route::get('page/{id}/edit-content', [PageController::class, 'editContent'])->name('page.editContent');
    Route::put('page/{id}/update-content', [PageController::class, 'updateContent'])->name('page.updateContent');
    Route::resource('page', PageController::class)->names('page')->except(['create']);

    Route::resource('setting', SettingController::class)->names('setting')->only(['index', 'store']);

    Route::post('slider/reorder', [SliderController::class, 'reorder'])->name('slider.reorder');
    Route::resource('slider', SliderController::class)->names('slider');

    Route::post('popup/reorder', [PopupController::class, 'reorder'])->name('popup.reorder');
    Route::resource('popup', PopupController::class)->names('popup');

    Route::post('team/reorder', [TeamController::class, 'reorder'])->name('team.reorder');
    Route::resource('team', TeamController::class)->names('team');

    Route::post('testimonial/reorder', [TestimonialController::class, 'reorder'])->name('testimonial.reorder');
    Route::resource('testimonial', TestimonialController::class)->names('testimonial');

    Route::post('category/reorder', [CategoryController::class, 'reorder'])->name('category.reorder');
    Route::get('category/{id?}', [CategoryController::class, 'index'])->name('category.index');
    Route::resource('category', CategoryController::class)->names('category')->only(['store', 'edit', 'destroy']);

    Route::post('partner/reorder', [PartnerController::class, 'reorder'])->name('partner.reorder');
    Route::get('partner/{id?}', [PartnerController::class, 'index'])->name('partner.index');
    Route::resource('partner', PartnerController::class)->names('partner')->only(['store', 'edit', 'destroy']);

    Route::post('blog/reorder', [BlogController::class, 'reorder'])->name('blog.reorder');
    Route::resource('blog', BlogController::class)->names('blog');

    Route::post('service/reorder', [ServiceController::class, 'reorder'])->name('service.reorder');
    Route::resource('service', ServiceController::class)->names('service');

    Route::post('test/reorder', [TestController::class, 'reorder'])->name('test.reorder');
    Route::resource('test', TestController::class)->names('test');

    Route::post('country/reorder', [CountryController::class, 'reorder'])->name('country.reorder');
    Route::resource('country', CountryController::class)->names('country');

    Route::post('gallery-category/reorder', [GalleryCategoryController::class, 'reorder'])->name('galleryCategory.reorder');
    Route::get('gallery-category/{id?}', [GalleryCategoryController::class, 'index'])->name('galleryCategory.index');
    Route::resource('gallery-category', GalleryCategoryController::class)->names('galleryCategory')->only(['store', 'edit', 'destroy']);

    Route::post('faq-category/reorder', [FaqCategoryController::class, 'reorder'])->name('faqCategory.reorder');
    Route::get('faq-category/{id?}', [FaqCategoryController::class, 'index'])->name('faqCategory.index');
    Route::resource('faq-category', FaqCategoryController::class)->names('faqCategory')->only(['store', 'edit', 'destroy']);

    Route::post('gallery/reorder', [GalleryController::class, 'reorder'])->name('gallery.reorder');
    Route::get('gallery/{id?}', [GalleryController::class, 'index'])->name('gallery.index');
    Route::resource('gallery', GalleryController::class)->names('gallery')->only(['store', 'edit', 'destroy']);

    Route::post('faq/reorder', [FaqController::class, 'reorder'])->name('faq.reorder');
    Route::get('faq/{id?}', [FaqController::class, 'index'])->name('faq.index');
    Route::resource('faq', FaqController::class)->names('faq')->only(['store', 'edit', 'destroy']);

    Route::post('institution/reorder', [InstitutionController::class, 'reorder'])->name('institution.reorder');
    Route::get('institution/{id?}', [InstitutionController::class, 'index'])->name('institution.index');
    Route::resource('institution', InstitutionController::class)->names('institution')->only(['store', 'edit', 'destroy']);
});
