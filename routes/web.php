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

Route::get('/', [
    'uses'=> 'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/about', [
    'uses' => 'BlogController@about',
    'as' => 'blog.about'
]);
Route::get('/blog/contact', [
    'uses' => 'BlogController@contact',
    'as' => 'blog.contact'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as' => 'category'
]);

Route::get('/tag/{tag}', [
    'uses' => 'BlogController@tag',
    'as' => 'tag'
]);

Route::auth();

Route::get('/home', 'HomeController@index');

Route::put('/backend/blog/restore/{blog}', [
    'uses' => 'BackendBController@restore',
    'as'   =>  'backend.blog.restore'
]);

Route::delete('/backend/blog/delete/{blog}', [
    'uses' => 'BackendBController@forceDestroy',
    'as'   =>  'backend.blog.delete'
]);


Route::resource('/backend/blog', 'BackendBController', ['as'=> 'backend']);

Route::resource('/backend/categories', 'BackendCController', ['as'=> 'backend']);

Route::resource('/backend/users', 'BackendUController', ['as'=> 'backend']);
