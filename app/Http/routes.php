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

Route::group(['middleware' => ['auth']], function()
{
    Route::resource('articles', 'ArticlesController',  ['only' => ['create', 'store']]);

    Route::group(['middleware' => ['abort_if_cant_manage_article']], function()
    {
        Route::resource('articles', 'ArticlesController',  ['only' => ['edit', 'update', 'destroy']]);
    });
});

// it's important to define articles.show AFTER articles.create because it can be incorrect routing at /articles/create
Route::resource('articles', 'ArticlesController',  ['only' => ['index', 'show']]);


Route::resource('users', 'UsersController');
Route::resource('users.articles', 'UserArticlesController', ['only' => array('index')]);
Route::resource('users.comments', 'UserCommentsController', ['only' => array('index')]);

Route::resource('comments', 'CommentsController', ['only' => array('store')]);

// Authentication routes...
Route::get('auth/login',  ['as' => 'login',       'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'login.post',  'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'logout',      'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register',  ['as' => 'register',      'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', ['as' => 'register.post', 'uses' => 'Auth\AuthController@postRegister']);

// Route::resource('foo.bar.bez', 'Foo\Bar\BezController'); // For accessing Bez related with Foo and Bar