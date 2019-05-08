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

// Admin Users
Route::resource('admin/users', 'AdminUsersController')->names([
    'index' => 'admin.users.index',
    'show'=> 'admin.users.show',
    'create'=> 'admin.users.create',
    'destroy'=>'admin.users.destroy',
    'edit'=>'admin.users.edit',
    'update'=>'admin.users.update'
]);

// Admin Posts
Route::get('admin/posts/trashed', 'AdminPostsController@trashed')->name('admin.posts.trashed');

Route::get('admin/posts/{post}/restore', 'AdminPostsController@restore')->name('admin.posts.restore');
Route::post('admin/posts/{post}/forceDelete', 'AdminPostsController@forceDelete')->name('admin.posts.forceDelete');

Route::resource('admin/posts', 'AdminPostsController')->names([
    'index'=> 'admin.posts.index',
    'destroy'=>'admin.posts.destroy'
]);
