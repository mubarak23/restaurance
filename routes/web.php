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
Route::post('review/{id}/',[
    'uses' => 'ReviewController@store',
    'as' => 'write',
    'middleware' => 'auth'
]);

Route::resource('product', 'ProductController');


Route::resource('user', 'UserController');


Route::resource('permissions', 'PermissionController');


Route::resource('roles', 'RoleController');





