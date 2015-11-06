<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Event::listen('illuminate.query', function($query)
// {
//     var_dump($query);
// });

Route::get('/', array( 'as' => 'home', 'uses' => 'ArticlesController@index' ));
Route::get('articles/{scope}', 'ArticlesController@index')->where(['scope' => '(most-viewed|most-commented|most-rated)']);
Route::resource('articles', 'ArticlesController');


Route::resource('users', 'UsersController');

// Route::resource('foo.bar.bez', 'Foo\Bar\BezController'); // For accessing Bez related with Foo and Bar