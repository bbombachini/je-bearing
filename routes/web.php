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

	$name = 'John Doe';
	$position = 'Admin';
	$img = 'images/user.svg';

    return view('welcome', compact('name', 'position', 'img'));
});

// Route::get('/test', function () {
//   return view('test', ['name'=>'Here']);
// });

Route::get('/test', 'ToolingController@index');

Route::get('/admin/tooling/add', 'ToolingController@add');

Route::post('/admin/tooling/store', 'ToolingController@store');

Route::get('/admin/tooling/show', 'ToolingController@show');

Route::get('/admin/tooling/edit/{id}', ['uses' => 'ToolingController@edit']);

Route::get('/child', function () {
  return view('child');
});
