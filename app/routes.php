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

Route::get('prueba', array('as' => 'prueba', 'uses'=>'DemoController@index'));

Route::get('/', 'IndexController@index');

Route::get('home', 'IndexController@index');

Route::get('carnales', 'IndexController@carnales');

Route::get('derbez', 'IndexController@derbez');

Route::get('legales', 'IndexController@legales');

Route::get('meme/{uid}', 'IndexController@meme');

Route::get('memeteca', 'IndexController@memeteca');

Route::get('nota/{uid}', 'IndexController@nota');

Route::get('preguntame', 'IndexController@preguntame');

Route::get('video/{uid}', 'IndexController@video');

Route::get('videos/{uid}', 'IndexController@categoryVideos');

/*
	Panel de administración
*/

Route::get('appanel', 'AppController@login');

Route::post('appanel/dologin', 'AppController@entrar');

Route::group(array('before' => 'auth', 'prefix' => 'appanel'), function(){

	Route::get('logout', 'AppController@salir');

	Route::get('index', 'AppController@index');

	Route::resource('video', 'VideoController');

	Route::resource('nota', 'NotaController');

	Route::resource('user', 'UserController');

	Route::resource('picture', 'PictureController');

	Route::resource('meme', 'MemeController');

	Route::resource('category', 'CategoryController');

});
