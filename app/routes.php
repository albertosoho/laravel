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

Route::get('prueba', array('as'=>'prueba', 'uses'=>'DemoController@index'));

Route::get('/', array('as' => 'index', 'uses' => 'IndexController@index'));

Route::get('home', array('as' => 'index', 'uses' => 'IndexController@index'));

Route::get('carnales', array('as' => 'carnales', 'uses' => 'IndexController@carnales'));

Route::get('derbez', array('as' => 'derbez', 'uses' => 'IndexController@derbez'));

Route::get('legales', array('as' => 'legales', 'uses' => 'IndexController@legales'));

Route::get('meme/{id}', array('as' => 'meme', 'uses' => 'IndexController@meme'));

Route::get('memeteca', array('as' => 'memeteca', 'uses' => 'IndexController@memeteca'));

Route::get('memetecapages', array('as' => 'memetecapages', 'uses' => 'IndexController@memetecaPages'));

Route::get('nota/{id}', array('as' => 'nota', 'uses' => 'IndexController@nota'));

Route::get('preguntame', array('as' => 'preguntame', 'uses' => 'IndexController@preguntame'));

Route::get('video/{id}', array('as' => 'video', 'uses' => 'IndexController@video'));

Route::get('videos/{id}', array('as' => 'videos', 'uses' => 'IndexController@categoryVideos'));

/*
	Panel de administración
*/

Route::get('appanel', array('as' => 'appanel', 'uses'=>'AppController@login'));

Route::post('appanel/dologin', 'AppController@entrar');

Route::group(array('before' => 'auth', 'prefix' => 'appanel'), function(){

	Route::get('logout', array('as' => 'logout', 'uses' => 'AppController@salir'));

	Route::get('index', array('as' => 'index', 'uses' => 'AppController@index'));

//secciones

	Route::get('video', array('as' => 'appanel.video.index', 'uses' => 'VideoController@index'));
	Route::get('video/create', array('as' => 'appanel.video.create', 'uses' => 'VideoController@create'));
	Route::post('video/store', array('as' => 'appanel.video.store', 'uses' => 'VideoController@store'));
	Route::get('video/{id}/edit', array('as' => 'appanel.video.edit', 'uses' => 'VideoController@edit'));
	Route::put('video/{id}/update', array('as' => 'appanel.video.update', 'uses' => 'VideoController@update'));
	Route::delete('video/{id}/destroy', array('as' => 'appanel.video.destroy', 'uses' => 'VideoController@destroy'));

	Route::get('nota', array('as' => 'appanel.nota.index', 'uses' => 'NotaController@index'));
	Route::get('nota/create', array('as' => 'appanel.nota.create', 'uses' => 'NotaController@create'));
	Route::post('nota/store', array('as' => 'appanel.nota.store', 'uses' => 'NotaController@store'));
	Route::get('nota/{id}/edit', array('as' => 'appanel.nota.edit', 'uses' => 'NotaController@edit'));
	Route::put('nota/{id}/update', array('as' => 'appanel.nota.update', 'uses' => 'NotaController@update'));
	Route::delete('nota/{id}/destroy', array('as' => 'appanel.nota.destroy', 'uses' => 'NotaController@destroy'));

	Route::resource('user', 'UserController');

	Route::resource('picture', 'PictureController');

	Route::get('meme', array('as' => 'appanel.meme.index', 'uses' => 'MemeController@index'));
	Route::get('meme/create', array('as' => 'appanel.meme.create', 'uses' => 'MemeController@create'));
	Route::post('meme/store', array('as' => 'appanel.meme.store', 'uses' => 'MemeController@store'));
	Route::get('meme/{id}/edit', array('as' => 'appanel.meme.edit', 'uses' => 'MemeController@edit'));
	Route::put('meme/{id}/update', array('as' => 'appanel.meme.update', 'uses' => 'MemeController@update'));
	Route::delete('meme/{id}/destroy', array('as' => 'appanel.meme.destroy', 'uses' => 'MemeController@destroy'));

	Route::get('category', array('as' => 'appanel.category.index', 'uses' => 'CategoryController@index'));
	Route::get('category/create', array('as' => 'appanel.category.create', 'uses' => 'CategoryController@create'));
	Route::post('category/store', array('as' => 'appanel.category.store', 'uses' => 'CategoryController@store'));
	Route::get('category/{id}/edit', array('as' => 'appanel.category.edit', 'uses' => 'CategoryController@edit'));
	Route::put('category/{id}/update', array('as' => 'appanel.category.update', 'uses' => 'CategoryController@update'));
	Route::delete('category/{id}/destroy', array('as' => 'appanel.category.destroy', 'uses' => 'CategoryController@destroy'));

//uploads

	Route::post('upload', array('as'=>'upload', 'uses'=>'ImageController@upload'));

	Route::get('upload/index', array('uses'=>'ImageController@index'));

	Route::get('picsjson', array('as'=>'picsJSON', 'uses'=>'ImageController@picsJSON'));

});

