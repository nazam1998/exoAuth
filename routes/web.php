<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', "IndexController@index")->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user','UsersController@index')->name('user');
Route::get('/userAdd','UsersController@add')->name('addUserRole');
Route::post('/userSaveRole','UsersController@save')->name('saveUserRole');
Route::get('/userEditRole/{id}','UsersController@editRole')->name('editUserRole');
Route::post('/userUpdateRole/{id}','UsersController@updateRole')->name('updateUserRole');
Route::get('/userDeleteRole/{id}','UsersController@destroy')->name('deleteUserRole');

Route::get('/admin','AdminController@index')->name('admin');

Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/editProfile','ProfileController@edit')->name('editProfile');
Route::post('/updateProfile','ProfileController@update')->name('updateProfile');
Route::get('/deleteProfile','ProfileController@destroy')->name('deleteProfile');


Route::get('/role','RoleController@index')->name('role');
Route::get('/addRole','RoleController@create')->name('addRole');
Route::post('/saveRole','RoleController@store')->name('saveRole');
Route::get('/editRole/{id}','RoleController@edit')->name('editRole');
Route::post('/updateRole/{id}','RoleController@update')->name('updateRole');
Route::get('/deleteRole/{id}','RoleController@destroy')->name('deleteRole');
