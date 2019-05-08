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

/*
 * Administrator Users : Rights
 * */

// Promote and Demote Functionality
Route::get('/admin/users/{user}/promote', 'AdminUsersController@promote')->name('admin.users.promote');
Route::get('/admin/users/{user}/demote', 'AdminUsersController@demote')->name('admin.users.demote');
Route::get('admin/users', 'AdminUsersController@index')->name('admin.users.index');
Route::delete('admin/users/{user}/destroy', 'AdminUsersController@destroy')->name('admin.users.destroy');



/*
 * Administrator Posts : Rights
 * */

// Trashed Posts Page
Route::get('admin/posts/trashed', 'AdminPostsController@trashed')->name('admin.posts.trashed');
Route::get('admin/posts/{post}/restore', 'AdminPostsController@restore')->name('admin.posts.restore');
Route::get('admin/posts/{post}/forceDelete', 'AdminPostsController@forceDelete')->name('admin.posts.forceDelete');

Route::get('admin/posts', 'AdminPostsController@index')->name('admin.posts.index');
Route::get('admin/posts/{post}/edit', 'AdminPostsController@edit')->name('admin.posts.edit');
Route::patch('admin/posts/{post}/update', 'AdminPostsController@update')->name('admin.posts.update');
Route::delete('admin/posts/{post}/destroy', 'AdminPostsController@destroy')->name('admin.posts.destroy');

/*
 * Administrator Categories : Rights
 * */
Route::get('/admin/categories', 'AdminCategoriesController@index')->name('admin.categories.index');
Route::delete('/admin/categories/{category}/destroy', 'AdminCategoriesController@destroy')->name('admin.categories.destroy');