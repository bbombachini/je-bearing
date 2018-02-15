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

Route::get('/', function(){
  return view('auth.login');
} );
//Operator Routes
Route::get('/oper/tooling', 'ToolingController@opList');
Route::get('/oper/fixture', 'FixtureController@opList');
Route::get('/oper/material', 'MaterialController@opList');




Route::get('/oper/comments', function(){
  return view('oper.comments');
} );

Route::get('/oper/contactsuper', function(){
  return view('oper.contactsuper');
} );

Route::get('/oper/steps', function(){
  return view('oper.steps');
} );

Route::get('/oper/qualityalerts', function(){
  return view('oper.qualityalerts');
} );

Route::get('/searchpart', function(){
  return view('searchpart');
} );

// Admin routes
Route::get('/admin/tooling/add', 'ToolingController@add');
Route::post('/admin/tooling/store', 'ToolingController@store');
Route::get('/admin/tooling/list', 'ToolingController@list');
Route::get('/admin/tooling/edit/{id}', ['uses' => 'ToolingController@edit']);
Route::get('/admin/tooling/search/{str}', ['uses' => 'ToolingController@search']);
Route::post('/admin/tooling/update', 'ToolingController@update');
Route::get('/admin/tooling/list/{id}',['uses' => 'ToolingController@quickview']);
Route::get('/admin/tooling/destroy/{id}', ['uses' => 'ToolingController@destroy']);
Route::get('/admin/tooling/editMedia/{id}', ['uses' => 'ToolingController@editMedia']);
Route::get('/admin/tooling/destroyMedia/{id}', ['uses' => 'ToolingController@destroyMedia']);

Route::get('/admin/fixture/add', 'FixtureController@add');
Route::post('/admin/fixture/store', 'FixtureController@store');
Route::get('/admin/fixture/list', 'FixtureController@list');
Route::get('/admin/fixture/edit/{id}', ['uses' => 'FixtureController@edit']);
Route::get('/admin/fixture/search/{str}', ['uses' => 'FixtureController@search']);
Route::post('/admin/fixture/update', 'FixtureController@update');
Route::get('/admin/fixture/list/{id}',['uses' => 'FixtureController@quickview']);
Route::get('/admin/fixture/destroy/{id}', ['uses' => 'FixtureController@destroy']);
Route::get('/admin/fixture/editMedia/{id}', ['uses' => 'FixtureController@editMedia']);
Route::get('/admin/fixture/destroyMedia/{id}', ['uses' => 'FixtureController@destroyMedia']);

Route::get('/admin/material/add', 'MaterialController@add');
Route::post('/admin/material/store', 'MaterialController@store');
Route::get('/admin/material/list', 'MaterialController@list');
Route::get('/admin/material/edit/{id}', ['uses' => 'MaterialController@edit']);
Route::get('/admin/material/search/{str}', ['uses' => 'MaterialController@search']);
Route::post('/admin/material/update', 'MaterialController@update');
Route::get('/admin/material/list/{id}',['uses' => 'MaterialController@quickview']);
Route::get('/admin/material/destroy/{id}', ['uses' => 'MaterialController@destroy']);
Route::get('/admin/material/editMedia/{id}', ['uses' => 'MaterialController@editMedia']);
Route::get('/admin/material/destroyMedia/{id}', ['uses' => 'MaterialController@destroyMedia']);

Route::get('/admin/user/add', 'UsersController@add');
Route::post('/admin/user/store', 'UsersController@store');
Route::get('/admin/user/list', 'UsersController@list');
Route::get('/admin/user/list/{id}',['uses' => 'UsersController@quickview']);
Route::get('/admin/user/edit/{id}', ['uses' => 'UsersController@edit']);
Route::post('/admin/user/update', 'UsersController@update');
Route::get('/admin/user/destroy/{id}', ['uses' => 'UsersController@destroy']);
Route::get('/admin/user/destroyMedia/{id}', ['uses' => 'UsersController@destroyMedia']);
Route::get('/admin/user/search/{str}', ['uses' => 'UsersController@search']);

Route::get('/admin/operator/add', function(){
  return view('admin.operator.add');
} );

Route::get('/admin/media/add', 'MediaController@add');
Route::post('/admin/media/store', 'MediaController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
