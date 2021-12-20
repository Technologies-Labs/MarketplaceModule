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

use Illuminate\Support\Facades\Route;
use Modules\Marketplace\Http\Controllers\ServiceController;
use Modules\Marketplace\Http\Livewire\Services\AllServices;


/**
 * Dashboard Route
 */
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function() {
        Route::prefix('services')->group(function() {
            Route::get('/activation/{id}','ServiceController@activate');
            Route::get('/','ServiceController@index');
        });
    });
});
Route::resource('smsServices','SmsServiceController');
Route::prefix('smsServices')->group(function() {

    Route::get('/delete/{id}','SmsServiceController@destroy');

});

Route::resource('subscriptions','SubscriptionController');
Route::prefix('subscriptions')->group(function() {
    Route::get('/delete/{id}','SubscriptionController@destroy');
});

/**
 * Website Route
 */
Route::middleware(['auth'])->group(function () {

    Route::prefix('marketplace')->group(function() {
        Route::get('/services', function(){
            return view('marketplace::website.services.index');
        })->name('marketplace.services');
    });
});

