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

/*Route::get('/', function () {
    return view('index');
});*/

Route::resource('users', 'UserController')->middleware('admin');

Route::resource('apps', 'AppController')->middleware('admin');

Route::get('apps/user/{user}', 'AppController@select')->name('apps.select')->middleware('admin');

Route::post('apps/user/{user}', 'AppController@assign')->name('apps.assign')->middleware('admin');

Route::resource('teachers', 'TeacherController')->middleware('admin');

Route::resource('students', 'StudentController')->middleware('admin');

Route::resource('technicians', 'TechnicianController')->middleware('admin');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('users/{user}', 'UserController@show')->name('users.show');

Route::get('user/{user}', 'UserController@edit')->name('users.edit');