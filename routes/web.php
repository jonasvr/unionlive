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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyemail/{token}', 'auth\RegisterController@verify');

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'profile'], function () {
        Route::get('/', ['as' => 'profile', 'uses' => 'ProfileController@index']);
        Route::get('/ad/new', ['as' => 'newAd', 'uses' => 'AdvertisementController@newAdvertisementView']);
        Route::post('/ad/new', ['as' => 'createAd', 'uses' => 'AdvertisementController@createAd']);
        Route::get('/ad/show/{id}', ['as' => 'showAd', 'uses' => 'AdvertisementController@showAd']);
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/shedule', ['as' => 'shedule', 'uses' => 'AdminController@shedule']);
    });

});
