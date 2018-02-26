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

//Authentication Routes
Route::get('/', function(){
  return view('auth.login');
} );
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

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

//Supervisor and Admin shared routes
Route::group(['middleware' => ['admin', 'supervisor']] , function () {
  Route::get('/admin/tooling/list', 'ToolingController@list');
  Route::get('/admin/tooling/edit/{id}', ['uses' => 'ToolingController@edit']);
  Route::get('/admin/tooling/search/{str}', ['uses' => 'ToolingController@search']);
  Route::post('/admin/tooling/update', 'ToolingController@update');
  Route::get('/admin/tooling/list/{id}',['uses' => 'ToolingController@quickview']);
  Route::get('/admin/tooling/editMedia/{id}', ['uses' => 'ToolingController@editMedia']);

  Route::get('/admin/fixture/list', 'FixtureController@list');
  Route::get('/admin/fixture/edit/{id}', ['uses' => 'FixtureController@edit']);
  Route::get('/admin/fixture/search/{str}', ['uses' => 'FixtureController@search']);
  Route::post('/admin/fixture/update', 'FixtureController@update');
  Route::get('/admin/fixture/list/{id}',['uses' => 'FixtureController@quickview']);
  Route::get('/admin/fixture/editMedia/{id}', ['uses' => 'FixtureController@editMedia']);

  Route::get('/admin/material/list', 'MaterialController@list');
  Route::get('/admin/material/edit/{id}', ['uses' => 'MaterialController@edit']);
  Route::get('/admin/material/search/{str}', ['uses' => 'MaterialController@search']);
  Route::post('/admin/material/update', 'MaterialController@update');
  Route::get('/admin/material/list/{id}',['uses' => 'MaterialController@quickview']);
  Route::get('/admin/material/editMedia/{id}', ['uses' => 'MaterialController@editMedia']);

  Route::get('/admin/media/add', 'MediaController@add');

  Route::get('/admin/addnew', function() {
      return view('admin.addnew');
  });

});
// Route::middleware(['supervisor'])->group(function () {
//
//
//
// });

// Admin routes
Route::middleware(['admin'])->group(function () {

    Route::get('/admin/tooling/add', 'ToolingController@add');
    Route::post('/admin/tooling/store', 'ToolingController@store');
    Route::get('/admin/tooling/destroy/{id}', ['uses' => 'ToolingController@destroy']);
    Route::get('/admin/tooling/destroyMedia/{id}', ['uses' => 'ToolingController@destroyMedia']);

    Route::get('/admin/part/add/search/{str}', ['uses' => 'ToolingController@search']);
    Route::get('/admin/part/add', function(){
     return view('admin.part.add');
    } );

    Route::get('/admin/fixture/add', 'FixtureController@add');
    Route::post('/admin/fixture/store', 'FixtureController@store');
    Route::get('/admin/fixture/destroy/{id}', ['uses' => 'FixtureController@destroy']);
    Route::get('/admin/fixture/destroyMedia/{id}', ['uses' => 'FixtureController@destroyMedia']);

    Route::get('/admin/material/add', 'MaterialController@add');
    Route::post('/admin/material/store', 'MaterialController@store');

    Route::get('/admin/material/destroy/{id}', ['uses' => 'MaterialController@destroy']);
    Route::get('/admin/material/destroyMedia/{id}', ['uses' => 'MaterialController@destroyMedia']);

    Route::post('/admin/media/store', 'MediaController@store');

    // Route::get('/admin/addnew', function() {
    //     return view('admin.addnew');
    // });


});
