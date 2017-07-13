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

Route::get('/', 'FrontController@index');

Route::get('/accept/{token}','UserController@accept');

Auth::routes();


Route::group(['prefix' => 'ajax','middleware' => 'auth'], function () {
	Route::get('user', function (Request $request) {
	    return Auth::user();
	});
	
	Route::resource('games', GameController::class,['except' => ['create', 'edit']]);
	Route::get('games/{id}/activate', 'GameController@activate');
	Route::get('games/{id}/deactivate', 'GameController@deactivate');
	Route::post('games/pin/validate','GameController@validatePin');
	
	Route::resource('opening_screens', OpeningScreensController::class,['except' => ['create', 'edit']]);

	Route::resource('questions', QuestionsController::class,['except' => ['create', 'edit']]);
	Route::get('questions/{id}/activate', 'QuestionsController@activate');
	Route::get('questions/{id}/deactivate', 'QuestionsController@deactivate');

	Route::group(['prefix' => 'admin','middleware' => ['auth','auth.admin']],function(){
		Route::post('users/validate','UserController@validateEmail');
		Route::post('users/invite','UserController@invite');
		Route::resource('users', UserController::class,['except' => ['create', 'edit']]);
		Route::get('users/{id}/activate', 'UserController@activate');
		Route::get('users/{id}/deactivate', 'UserController@deactivate');
		Route::get('users/{id}/resendinvite', 'UserController@resendinvite');
	});
});