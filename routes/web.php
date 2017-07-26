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

/* Users */
Route::get('register', 'UserController@register');
Route::get('login', 'UserController@login');
Route::get('logout', ['middleware' => 'api', 'uses' => 'UserController@logout']);
Route::get('buy/{id}', ['middleware' => 'api', 'uses' => 'UserController@buySubscription']);
Route::post('buyVerify', ['middleware' => 'api', 'uses' => 'UserController@buySubscriptionVerify']);
Route::get('getBook/{id}', ['middleware' => 'api', 'uses' => 'UserController@getBook']);
/* End Users */

/* Books */
Route::resource('books', 'BookController', ['except' => ['update', 'edit', 'create', 'destroy', 'store']]);
Route::get('searchBook', 'BookController@search');
/* End Books */

/* Authors */
Route::resource('authors', 'AuthorController', ['except' => ['update', 'edit', 'create', 'destroy', 'store']]);
Route::get('searchAuthor', 'AuthorController@search');
/* End Authors */

/* Narrators */
Route::resource('narrators', 'NarratorController', ['except' => ['update', 'edit', 'create', 'destroy', 'store']]);
Route::get('searchNarrator', 'NarratorController@search');
/* End Narrators */

/* Subscription */
Route::resource('subscriptions','SubscriptionController',['except' => ['update','edit','create','destroy','store']]);

/* End Subscription */