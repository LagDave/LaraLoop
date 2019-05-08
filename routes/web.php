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

// Resource Functionalities
Route::resource('admin/users', 'AdminUsersController')->names([
    'index' => 'admin.users.index',
    'show'=> 'admin.users.show',
    'create'=> 'admin.users.create',
    'destroy'=>'admin.users.destroy',
    'edit'=>'admin.users.edit',
    'update'=>'admin.users.update'
]);




/*
 * Administrator Posts : Rights
 * */

// Trashed Posts Page
Route::get('admin/posts/trashed', 'AdminPostsController@trashed')->name('admin.posts.trashed');

// Restore and ForceDelete Functionalities
Route::get('admin/posts/{post}/restore', 'AdminPostsController@restore')->name('admin.posts.restore');
Route::get('admin/posts/{post}/forceDelete', 'AdminPostsController@forceDelete')->name('admin.posts.forceDelete');

// Resource Functionalities
Route::resource('admin/posts', 'AdminPostsController')->names([
    'index'=> 'admin.posts.index',
    'destroy'=>'admin.posts.destroy',
    'update'=>'admin.posts.update',
    'edit'=>'admin.posts.edit'
]);