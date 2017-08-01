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
Route::group(array('prefix' => 'api/', 'middleware' => []), function () {

/* Users */
Route::get('register', 'UserController@register');
Route::get('login', 'UserController@login');
Route::get('logout', ['middleware' => 'api', 'uses' => 'UserController@logout']);

Route::get('subscriptions/buy/{id}', ['middleware' => 'api', 'uses' => 'UserController@buySubscription']);
Route::post('subscriptions/verify', ['middleware' => 'api', 'uses' => 'UserController@buySubscriptionVerify']);

Route::get('users/credit', ['middleware' => 'api', 'uses' => 'UserController@increaseCredit']);
Route::post('users/credit/verify', ['middleware' => 'api', 'uses' => 'UserController@increaseCreditVerify']);

Route::get('books/get/{id}', ['middleware' => 'api', 'uses' => 'UserController@getBook']);
Route::get('users/get/books', ['middleware' => 'api', 'uses' => 'UserController@booksGet']);
Route::get('users/books', ['middleware' => 'api', 'uses' => 'UserController@booksMayLike']);
Route::get('books/wish/{id}', ['middleware' => 'api', 'uses' => 'UserController@getWishBook']);
Route::get('books/wish/delete/{id}', ['middleware' => 'api', 'uses' => 'UserController@deleteWantBook']);

Route::get('genres/get/{id}', ['middleware' => 'api', 'uses' => 'UserController@getGenre']);
Route::get('genres/get/delete/{id}', ['middleware' => 'api', 'uses' => 'UserController@deleteGenre']);

Route::get('password/change', ['middleware' => 'api', 'uses' => 'UserController@changePass']);
Route::get('image/upload', ['middleware' => 'api', 'uses' => 'UserController@uploadPhoto']);
Route::get('image/upload/delete', ['middleware' => 'api', 'uses' => 'UserController@deleteUploadPhoto']);
Route::get('users/delete', ['middleware' => 'api', 'uses' => 'UserController@deleteUser']);

Route::get('books/review/{id}', ['middleware' => 'api', 'uses' => 'UserController@reviewBook']);
Route::get('authors/review/{id}', ['middleware' => 'api', 'uses' => 'UserController@reviewAuthor']);
Route::get('narrators/review/{id}', ['middleware' => 'api', 'uses' => 'UserController@reviewNarrator']);
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
Route::resource('subscriptions', 'SubscriptionController',['except' => ['update', 'edit', 'create', 'destroy', 'store']]);

/* End Subscription */

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
    
