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

	// \Auth::loginUsingId(1);

	$users = \App\User::with('roles')->get();
	$roles = \App\Role::with('permissions');	

    return view('index',compact('users','roles'));

});
