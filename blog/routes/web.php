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

Route::group(['middleware' => ['auth','admin']],function() {


	Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
	Route::get('/rooms','AdminController@rooms')->name('admin.rooms');
	Route::put('/roomcreate','AdminController@roomstore');
	Route::delete('/deleteroom/{id}','AdminController@roomdelete');



	Route::resource('/users','UserController');

	Route::get('/users','AdminController@users');
	Route::get('/userroleedit/{id}','AdminController@userroleedit');
	Route::put('/userroleupdate/{id}','AdminController@userroleupdate');
	Route::delete('/deleteuser/{id}','AdminController@userdelete');


	Route::get('/students','AdminController@students');
	Route::put('/infocreate','AdminController@infostore');
	Route::get('/editinfo/{id}','AdminController@editinfo');
	Route::put('/updateinfo/{id}','AdminController@updateinfo');


	Route::put('/billcreate','AdminController@billstore');
	Route::get('/viewbill/{id}','AdminController@viewbill');




});

Auth::routes();
Route::get('/new-register', function () {
    return view('new-register');
});
Route::get('/new-login', function () {
    return view('new-login');
});
Route::get('/', 'IndexController@index')->name('home');




