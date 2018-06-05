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

Route::get('/', 'User\HomeController@index')->name('home');


//User authentication routes
Route::get('/authentication', 'User\AuthenticationController@authentication')->name('user.login.register');
Route::post('/user/authentication', 'User\AuthenticationController@registerUser')->name('user.submit');
Route::get('/verify/{token}', 'User\VerifyController@verify')->name('verify');
Route::post('/login', 'User\LoginController@login')->name('user.login.submit');
Route::get('/logout', 'User\LoginController@logout')->name('user.logout');

//Search routes
Route::get('/search', 'User\SearchController@search')->name('search');

//Booking routes
Route::get('/bus-details', 'User\BusBookingController@busDetails')->name('bus.details');
Route::get('/bus-booking', 'User\BusBookingController@busBooking')->name('bus.booking');
Route::get('/payment-reciepts', 'User\BusBookingController@paymentReciept')->name('payment.reciept');


//User routes
Route::group(['middleware' => 'user'], function () {
    Route::get('/user/{name}', 'User\UserProfileController@userAccount')->name('user.account');
});

//Agents routes
Route::group(['middleware' => 'agent'], function () {

});

//Admin routes
Route::group(['middleware' => 'admin'], function () {

});

