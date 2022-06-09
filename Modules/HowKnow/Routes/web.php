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

Route::middleware('dashboard')
    ->prefix('dashboard')
    ->as('dashboard.')
    ->group(
        function () {
            Route::get('reasons/trashed', 'HowKnowController@trashed')->name('reasons.trashed');
            Route::get('reasons/restore/{usertype}', 'HowKnowController@restore')->name('reasons.restore');
            Route::get('reasons/force-delete/{usertype}', 'HowKnowController@forceDelete')->name('reasons.forcedelete');
            Route::resource('reasons', 'HowKnowController');
        }
    );
