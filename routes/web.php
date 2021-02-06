<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', function(){
    return redirect() -> route('home');
});

/**
 * for home controller
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * for dashboard profile
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/profile', 'ProfileController@profile')->name('dashboard.profile');
    Route::post('/password/change', 'ProfileController@passwordChange')->name('password.change');
    Route::post('/image/update/{id}', 'ProfileController@updateImage')->name('image.update');
    Route::post('/name/change', 'ProfileController@nameChange')->name('name.change');
});

/**
 * for dashboard help
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/help', 'HelpController@help')->name('dashboard.help');
    Route::post('/help/create', 'HelpController@createHelp')->name('dashboard.createHelp');
});

/**
 * for dashboard referral
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/referral', 'ReferralController@referral')->name('dashboard.referral');
});

/**
 * active email using route
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/email/{token}', 'MailConfirmController@confirmEmail')->name('email.confirm');
});

/**
 * for all payment
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/register/payment', 'PaymentController@payment')->name('register.payment');
    Route::get('/verify', 'PaymentController@verifyPayment')->name('payment.verify');
});

/**
 * for pool controller
 */
Route::group(['namespace'=>'App\Http\Controllers'], function(){
    Route::get('/pool', 'PoolController@pool')->name('dashboard.pool');
});


/**
 * for package controller
 */
Route::group(['namespace'=>'App\Http\Controllers', 'prefix'=>'packages'], function(){
    Route::get('/{id}','PackageController@createSession')->name('packages.session');
    Route::get('/', 'PackageController@index')->name('packages.index');
    Route::post('/create', 'PackageController@create')->name('packages.create');
});

/**
 * user controller
 */
Route::group(['namespace' => '\App\Http\Controllers'], function(){
    Route::post('/users/allUsers', 'UserController@getAllUser')->name('allusers');
});

/**
 * translator localization
 */
Route::get('locale/{locale}', function($locale){
   Session::put('locale', $locale);
   return redirect() -> back();
}) -> name('locale');

Route::get('lang/{lang}', function($lang){
    Session::put('locale', $lang);
    return redirect()->route('register');
});

/**
 * payment status route
 */
Route::post(
    '/coinbase/webhook',
    '\App\Http\Controllers\PaymentController@handle_webhook'
);

Auth::routes();
