<?php

use Illuminate\Support\Facades\Route;
use Modules\CCMS\Http\Controllers\BlogController;
use Modules\CCMS\Http\Controllers\BranchController;
use Modules\CCMS\Http\Controllers\CategoryController;
use Modules\CCMS\Http\Controllers\CounterController;
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
    Route::get('page/toggle/{id}', [PageController::class, 'toggle'])->name('page.toggle');
    Route::get('page/{id}/edit-content', [PageController::class, 'editContent'])->name('page.editContent');
    Route::put('page/{id}/update-content', [PageController::class, 'updateContent'])->name('page.updateContent');
    Route::resource('page', PageController::class)->names('page')->except(['create']);

    Route::resource('setting', SettingController::class)->names('setting')->only(['index', 'store']);

    Route::post('slider/reorder', [SliderController::class, 'reorder'])->name('slider.reorder');
    Route::get('slider/toggle/{id}', [SliderController::class, 'toggle'])->name('slider.toggle');
    Route::resource('slider', SliderController::class)->names('slider');

    Route::post('popup/reorder', [PopupController::class, 'reorder'])->name('popup.reorder');
    Route::get('popup/toggle/{id}', [PopupController::class, 'toggle'])->name('popup.toggle');
    Route::resource('popup', PopupController::class)->names('popup');

    Route::post('team/reorder', [TeamController::class, 'reorder'])->name('team.reorder');
    Route::resource('team', TeamController::class)->names('team');

    Route::post('testimonial/reorder', [TestimonialController::class, 'reorder'])->name('testimonial.reorder');
    Route::get('testimonial/toggle/{id}', [TestimonialController::class, 'toggle'])->name('testimonial.toggle');
    Route::resource('testimonial', TestimonialController::class)->names('testimonial');

    Route::post('category/reorder', [CategoryController::class, 'reorder'])->name('category.reorder');
    Route::get('category/{id?}', [CategoryController::class, 'index'])->name('category.index');
    Route::resource('category', CategoryController::class)->names('category')->only(['store', 'edit', 'destroy']);

    Route::post('partner/reorder', [PartnerController::class, 'reorder'])->name('partner.reorder');
    Route::get('partner/toggle/{id}', [PartnerController::class, 'toggle'])->name('partner.toggle');
    Route::get('partner/{id?}', [PartnerController::class, 'index'])->name('partner.index');
    Route::resource('partner', PartnerController::class)->names('partner')->only(['store', 'edit', 'destroy']);

    Route::post('counter/reorder', [CounterController::class, 'reorder'])->name('counter.reorder');
    Route::get('counter/toggle/{id}', [CounterController::class, 'toggle'])->name('counter.toggle');
    Route::get('counter/{id?}', [CounterController::class, 'index'])->name('counter.index');
    Route::resource('counter', CounterController::class)->names('counter')->only(['store', 'edit', 'destroy']);

    Route::post('blog/reorder', [BlogController::class, 'reorder'])->name('blog.reorder');
    Route::get('blog/toggle/{id}', [BlogController::class, 'toggle'])->name('blog.toggle');
    Route::resource('blog', BlogController::class)->names('blog');

    Route::post('service/reorder', [ServiceController::class, 'reorder'])->name('service.reorder');
    Route::get('service/toggle/{id}', [ServiceController::class, 'toggle'])->name('service.toggle');
    Route::resource('service', ServiceController::class)->names('service');

    Route::post('branch/reorder', [BranchController::class, 'reorder'])->name('branch.reorder');
    Route::get('branch/toggle/{id}', [BranchController::class, 'toggle'])->name('branch.toggle');
    Route::resource('branch', BranchController::class)->names('branch');

    Route::post('test/reorder', [TestController::class, 'reorder'])->name('test.reorder');
    Route::get('test/toggle/{id}', [TestController::class, 'toggle'])->name('test.toggle');
    Route::resource('test', TestController::class)->names('test');

    Route::post('country/reorder', [CountryController::class, 'reorder'])->name('country.reorder');
    Route::get('country/toggle/{id}', [CountryController::class, 'toggle'])->name('country.toggle');
    Route::resource('country', CountryController::class)->names('country');

    Route::post('gallery-category/reorder', [GalleryCategoryController::class, 'reorder'])->name('galleryCategory.reorder');
    Route::get('gallery-category/{id?}', [GalleryCategoryController::class, 'index'])->name('galleryCategory.index');
    Route::get('gallery-category/toggle/{id}', [GalleryCategoryController::class, 'toggle'])->name('galleryCategory.toggle');
    Route::resource('gallery-category', GalleryCategoryController::class)->names('galleryCategory')->only(['store', 'edit', 'destroy']);

    Route::post('faq-category/reorder', [FaqCategoryController::class, 'reorder'])->name('faqCategory.reorder');
    Route::get('faq-category/{id?}', [FaqCategoryController::class, 'index'])->name('faqCategory.index');
    Route::get('faq-category/toggle/{id}', [FaqCategoryController::class, 'toggle'])->name('faqCategory.toggle');
    Route::resource('faq-category', FaqCategoryController::class)->names('faqCategory')->only(['store', 'edit', 'destroy']);

    Route::post('gallery/reorder', [GalleryController::class, 'reorder'])->name('gallery.reorder');
    Route::get('gallery/{id?}', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('gallery/toggle/{id}', [GalleryController::class, 'toggle'])->name('gallery.toggle');
    Route::resource('gallery', GalleryController::class)->names('gallery')->only(['store', 'edit', 'destroy']);

    Route::post('faq/reorder', [FaqController::class, 'reorder'])->name('faq.reorder');
    Route::get('faq/{id?}', [FaqController::class, 'index'])->name('faq.index');
    Route::get('faq/toggle/{id}', [FaqController::class, 'toggle'])->name('faq.toggle');
    Route::resource('faq', FaqController::class)->names('faq')->only(['store', 'edit', 'destroy']);

    Route::post('institution/reorder', [InstitutionController::class, 'reorder'])->name('institution.reorder');
    Route::get('institution/{id?}', [InstitutionController::class, 'index'])->name('institution.index');
    Route::get('institution/toggle/{id}', [InstitutionController::class, 'toggle'])->name('institution.toggle');
    Route::resource('institution', InstitutionController::class)->names('institution')->only(['store', 'edit', 'destroy']);
});


