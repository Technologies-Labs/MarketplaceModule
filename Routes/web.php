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


/////////////////      Services          ////////////////////////
Route::prefix('services')->group(function() {

    Route::get('/activation/{id}','ServiceController@activate');
    Route::get('/','ServiceController@index');

});

/////////////////      SMS Services          ////////////////////////
Route::resource('smsServices','SmsServiceController');
Route::prefix('smsServices')->group(function() {

    Route::get('/delete/{id}','SmsServiceController@destroy');

});

/////////////////      Subscriptons         ////////////////////////
Route::resource('subscriptions','SubscriptionController');
Route::prefix('subscriptions')->group(function() {
    Route::get('/delete/{id}','SubscriptionController@destroy');
});
