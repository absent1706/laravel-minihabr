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

Route::get('/',    ['as' => 'home', 'uses' => 'ArticlesController@index']);
Route::get('home', [                'uses' => 'ArticlesController@index']);

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


Route::resource('users', 'UsersController', ['only' => 'show']);
Route::group(['middleware' => ['abort_if_cant_manage_user']], function()
{
    Route::resource('users', 'UsersController',  ['only' => ['edit', 'update', 'destroy']]);
    Route::put('users/{users}/password', ['uses' => 'UsersController@updatePassword', 'as' => 'users.update_password']);
});

Route::resource('users.articles', 'UserArticlesController', ['only' => 'index']);
Route::resource('users.comments', 'UserCommentsController', ['only' => 'index']);


Route::group(['middleware' => ['auth']], function()
{
    Route::resource('comments', 'CommentsController', ['only' => 'store']);

    Route::group(['middleware' => ['abort_if_cant_manage_comment']], function()
    {
        Route::resource('comments', 'CommentsController',  ['only' => 'destroy']);
    });
});



Route::resource('categories', 'CategoriesController', ['only' => 'index']);
Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::resource('categories', 'CategoriesController',  ['except' => 'index', 'show']);
});


Route::get('auth/logout', ['as' => 'logout',      'uses' => 'Auth\AuthController@getLogout']);
Route::group(['middleware' => 'guest'], function()
{
    // Authentication routes...
    Route::get('auth/login',  ['as' => 'login',       'uses' => 'Auth\AuthController@getLogin']);
    Route::post('auth/login', ['as' => 'login.post',  'uses' => 'Auth\AuthController@postLogin']);

    // Registration routes...
    Route::get('auth/register',  ['as' => 'register',      'uses' => 'Auth\AuthController@getRegister']);
    Route::post('auth/register', ['as' => 'register.post', 'uses' => 'Auth\AuthController@postRegister']);

    // Password reset link request routes...
    Route::get('password/email',  ['as' => 'password_reset_links.create', 'uses' => 'Auth\PasswordController@getEmail']);
    Route::post('password/email', ['as' => 'password_reset_links.store',  'uses' => 'Auth\PasswordController@postEmail']);

    // Password reset routes...
    Route::get('password/reset/{user_id}/{token}', ['as' => 'password_resets.create', 'uses' => 'Auth\PasswordController@getReset']);
    Route::post('password/reset',                  ['as' => 'password_resets.store',  'uses' => 'Auth\PasswordController@postReset']);
});
