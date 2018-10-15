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

// Auth controller
Auth::routes();

// Home Controllers
Route::get('/dashboards', 'DashboardsController@index');
Route::get('/home', 'HomeController@index')->name('students.index');
Route::get('/home/add', 'HomeController@add')->name('students.add');
Route::get('/home/show', 'HomeController@show')->name('home.show');

// StudentsController
Route::get('/students/index/{id}', 'StudentsController@index')->name('students.index');
Route::get('/students/student/{id}', 'StudentsController@student')->name('students.student');
Route::get('/students/destroy/{id}', 'HomeController@destroy')->name('students.destroy');

// Test Datable controller
Route::get('dis/create', 'DisplayDataController@create');
Route::get('dis/index', 'DisplayDataController@index');