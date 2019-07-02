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
Route::get('home', 'HomeController@index')->name('home');

/*
 * Administrator Users : Rights
 * */

Route::get('admin/users/create', 'AdminUsersController@create')->name('admin.users.create')->middleware('admin_only');
Route::post('admin/users/store', 'AdminUsersController@store')->name('admin.users.store')->middleware('admin_only');

// Promote and Demote Functionality
Route::get('admin/users/{user}/promote', 'AdminUsersController@promote')->name('admin.users.promote')->middleware('admin_only');
Route::get('admin/users/{user}/demote', 'AdminUsersController@demote')->name('admin.users.demote')->middleware('admin_only');
Route::get('admin/users', 'AdminUsersController@index')->name('admin.users.index')->middleware('admin_only');
Route::delete('admin/users/{user}/destroy', 'AdminUsersController@destroy')->name('admin.users.destroy')->middleware('admin_only');



/*
 * Administrator Posts : Rights
 * */

// Trashed Posts Page
Route::get('admin/posts/trashed', 'AdminPostsController@trashed')->name('admin.posts.trashed')->middleware('admin_only');
Route::get('admin/posts/{post}/restore', 'AdminPostsController@restore')->name('admin.posts.restore')->middleware('admin_only');
Route::get('admin/posts/{post}/forceDelete', 'AdminPostsController@forceDelete')->name('admin.posts.forceDelete')->middleware('admin_only');

Route::get('admin/posts', 'AdminPostsController@index')->name('admin.posts.index')->middleware('admin_only');
Route::get('admin/posts/{post}/edit', 'AdminPostsController@edit')->name('admin.posts.edit')->middleware('admin_only');
Route::patch('admin/posts/{post}/update', 'AdminPostsController@update')->name('admin.posts.update')->middleware('admin_only');
Route::delete('admin/posts/{post}/destroy', 'AdminPostsController@destroy')->name('admin.posts.destroy')->middleware('admin_only');

Route::get('admin/posts/create', 'AdminPostsController@create')->name('admin.posts.create')->middleware('admin_only');
Route::post('admin/posts/store', 'AdminPostsController@store')->name('admin.posts.store')->middleware('admin_only');
/*
 * Administrator Categories : Rights
 * */
Route::get('admin/categories', 'AdminCategoriesController@index')->name('admin.categories.index')->middleware('admin_only');
Route::delete('admin/categories/{category}/destroy', 'AdminCategoriesController@destroy')->name('admin.categories.destroy')->middleware('admin_only');
Route::get('admin/categories/{category}/edit', 'AdminCategoriesController@edit')->name('admin.categories.edit')->middleware('admin_only');
Route::patch('admin/categories/{category}/update', 'AdminCategoriesController@update')->name('admin.categories.update')->middleware('admin_only');
Route::get('admin/categories/create', 'AdminCategoriesController@create')->name('admin.categories.create')->middleware('admin_only');
Route::post('admin/categories/store', 'AdminCategoriesController@store')->name('admin.categories.store')->middleware('admin_only');


/*
 * Administrator Tags : Rights
 * */
Route::get('admin/tags', 'AdminTagsController@index')->name('admin.tags.index')->middleware('admin_only');
Route::get('admin/tags/{tag}/edit', 'AdminTagsController@edit')->name('admin.tags.edit')->middleware('admin_only');
Route::patch('admin/tags/{tag}/update', 'AdminTagsController@update')->name('admin.tags.update')->middleware('admin_only');
Route::delete('admin/tags/{tag}/destroy', 'AdminTagsController@destroy')->name('admin.tags.destroy')->middleware('admin_only');
Route::get('admin/tags/create', 'AdminTagsController@create')->name('admin.tags.create')->middleware('admin_only');
Route::post('admin/tags/store', 'AdminTagsController@store')->name('admin.tags.store')->middleware('admin_only');

Route::get('admin/tags/return/key/{key}', 'AdminTagsController@returnKey')->name('admin.tags.return.all');
Route::get('admin/tags/return/post/{post}', 'AdminTagsController@returnPostTags')->name('admin.tags.return.postTags');


// User Post Routes
Route::get('posts/create', 'PostsController@create')->name('posts.create')->middleware('author_only');
Route::post('posts/store', 'PostsController@store')->name('posts.store')->middleware('author_only');
Route::get('posts/{post}', 'PostsController@show')->name('posts.show');
