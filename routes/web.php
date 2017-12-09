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
    return view('app');
});

// Route::get('/admin/tooling', 'ToolingController@index');
Route::get('/admin/tooling/add', 'ToolingController@add');
Route::post('/admin/tooling/store', 'ToolingController@store');
Route::get('/admin/tooling/list', 'ToolingController@list');
Route::get('/admin/tooling/edit/{id}', ['uses' => 'ToolingController@edit']);
Route::post('/admin/tooling/update', 'ToolingController@update');
Route::get('/admin/tooling/destroy/{id}', ['uses' => 'ToolingController@destroy']);

Route::get('/admin/fixture', 'FixtureController@index');
Route::get('/admin/fixture/add', 'FixtureController@add');
Route::post('/admin/fixture/store', 'FixtureController@store');
Route::get('/admin/fixture/list', 'FixtureController@list');
Route::get('/admin/fixture/edit/{id}', ['uses' => 'FixtureController@edit']);
Route::post('/admin/fixture/update', 'FixtureController@update');
Route::get('/admin/fixture/destroy/{id}', ['uses' => 'FixtureController@destroy']);
