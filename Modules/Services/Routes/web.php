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
    Route::resource('services', 'ServicesController');
    Route::resource('{service}/subservices', 'SubServicesController');
    Route::resource('galleries', 'GalleriesController');
    Route::resource('{gallery}/events', 'EventsController');
});
