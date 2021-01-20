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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController')->only([
    'index', 'edit', 'update', 'destroy',
]);
Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', 'TaskController@index')->name('index');
    Route::get('/create','TaskController@createTask')->name('add');
    Route::post('/create', 'TaskController@storeTask');
    Route::get('/edit/{id}', 'TaskController@editTask')->name('edit');
    Route::post('/edit/{id}', 'TaskController@updateTask');
    Route::get('/delete/{id}', 'TaskController@deleteTask')->name('delete');
});
Route::get('lang/{lang}', 'LangController@changeLanguage')->name('lang');
