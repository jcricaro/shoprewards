<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => 'auth', 'uses' => 'DashboardController@getIndex'));

Route::group(array('before' => 'auth'), function() {
	Route::post('store/products', 'StoreController@products');
	Route::post('store/beacons', 'StoreController@beacons');

	Route::controller('dashboard', 'DashboardController');
	Route::resource('store', 'StoreController');
	Route::resource('action', 'ActionController');
	Route::resource('product', 'ProductController');
	Route::resource('reward', 'RewardController');
	Route::resource('beacon', 'BeaconController');
	Route::controller('points', 'PointController');
	Route::controller('analytics', 'AnalyticController');
});



Route::group(array('before' => 'api'), function() {
	Route::controller('api/v1', 'ApiController');	
});


Route::controller('login', 'LoginController');

Route::get('logout', array('before' => 'auth', function() {
	Sentry::logout();
	return Redirect::to('/');
}));