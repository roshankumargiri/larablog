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
    'uses' => 'BlogController@index',
    'as' => 'blog'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'

]);
Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as' => 'category'
]);
Route::get('/user/{user}', [
    'uses' => 'BlogController@user',
    'as' => 'user'
]);
Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
// Route::resource('/backend/blog', 'Backend\BlogController');
Route::resource('/backend/blog', 'Backend\BlogController', ['as' => 'backend']);

Route::put('/backend/blog/restore/{blog}', [
    'uses' => 'Backend\Blogcontroller@restore',
    'as' => 'backend.blog.restore'

]);
Route::delete('/backend/blog/force-destroy/{blog}', [
    'uses' => 'Backend\Blogcontroller@forceDestroy',
    'as' => 'backend.blog.force-destroy'

]);
Route::get('/backend/category/index', [
    'uses' => 'Backend\CategoryController@index',
    'as' => 'backend.category.index'
]);
Route::get('/backend/category/create', [
    'uses' => 'Backend\CategoryController@create',
    'as' => 'backend.category.create'
]);
Route::post('/backend/category/store', [
    'uses' => 'Backend\CategoryController@store',
    'as' => 'backend.category.store'
]);
Route::delete('/backend/category/delete/{id}', [
    'uses' => 'Backend\CategoryController@destroy',
    'as' => 'backend.category.destroy'
]);
Route::put('/backend/category/edit/{id}', [
    'uses' => 'Backend\CategoryController@edit',
    'as' => 'backend.category.edit'
]);
Route::put('/backend/category/update/{id}', [
    'uses' => 'Backend\CategoryController@update',
    'as' => 'backend.category.update'
]);
Route::resource('/backend/user', 'Backend\UserController', ['as' => 'backend']);

Route::post('/backend/user/confirmdelete/{id}', [
    'uses' => 'Backend\UserController@confirmdelete',
    'as' => 'backend.user.confirmdelete'
]);
Route::get('/backend/user/changeimage/{id}', [
    'uses' => 'Backend\UserController@changeimage',
    'as' => 'backend.user.changeimage'
]);
Route::put('/backend/user/updateimage/{id}', [
    'uses' => 'Backend\UserController@updateimage',
    'as' => 'backend.user.updateimage'
]);
