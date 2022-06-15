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
    // Donors Routes
    Route::resource('donors', 'DonorController');

    // Donations Routes
    Route::resource('donations', 'DonationsController')->except('create', 'store', 'edit', 'update');

    Route::get('donation-data', 'DonationsController@getForm')->name('donation.data');
    Route::put('donation-data', 'DonationsController@saveData')->name('donation.data.save');
});
