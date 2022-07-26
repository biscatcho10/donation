<?php

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

Route::middleware('dashboard')->prefix('dashboard')->as('dashboard.')->group(function () {
    Route::get('main_settings', 'Dashboard\SettingController@main')->name('settings.main');
    Route::get('settings', 'Dashboard\SettingController@index')->name('settings.index');
    Route::put('settings', 'Dashboard\SettingController@update')->name('settings.update');

    // test mail
    Route::get('test-mail', 'Dashboard\SettingController@testMail')->name('settings.test-mail');

    // shipping settings route
    Route::get('settings/shipping', 'Dashboard\SettingController@shipping')->name('settings.shipping');

    // contact us route
    Route::resource('contact-us', 'Dashboard\ContactUsController')->except('create', 'store', 'edit', 'update');

    // subscriber route
    Route::resource('subscribers', 'Dashboard\SubscriberController')->except('create', 'store', 'edit', 'update');

    // about us route
    Route::get('about-us', 'Dashboard\AboutUsController@form')->name('about-us');
    Route::put('about-us', 'Dashboard\AboutUsController@update')->name('about-us.update');

    // award route
    Route::resource('awards', 'Dashboard\AwardController');
});
