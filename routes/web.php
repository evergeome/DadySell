<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\HomeController as Home;
use App\Http\Controllers\Admin\AdminController as Admin;
use App\Http\Controllers\NewsController as News;
use App\Http\Controllers\SocialController as Social;
use App\Http\Controllers\OfferController as Offer;
use App\Http\Controllers\ProductController as Product;
use App\Http\Controllers\YoutubeController as Youtube;


Auth::routes(['verify' => true]);

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::controller(Home::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('home', 'home')->name('home');
    });

    Route::prefix('admin')->controller(Admin::class)->group(function () {
        Route::get('/', 'index')->name('admin');
    });

    Route::controller(Social::class)->group(function () {
        Route::get('redirect/{social}', 'redirect');
        Route::get('callback/{social}', 'callback');
    });

    Route::prefix('offers')->controller(Offer::class)->group(function () {
        Route::get('/', 'index')->name('offers');
        Route::get('create', 'create')->name('offers.create');
        Route::post('store', 'store')->name('offers.store');
        Route::get('edit/{id}', 'edit')->name('offers.edit');
        Route::post('update', 'update')->name('offers.update');
        //Route::get('delete/{id}', 'delete')->name('offers.delete');
        Route::post('delete', 'delete')->name('offers.delete');
    });

    Route::prefix('products')->controller(Product::class)->group(function () {
        Route::get('/', 'index');
        Route::get('update', 'update');
    });

    Route::controller(Youtube::class)->group(function () {
        Route::get('youtube', 'youtube');
    });

    // Route Resource
    Route::resource('news', News::class);
});
