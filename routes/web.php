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
Route::get('/oper/tooling/search/{str}', ['uses' => 'ToolingController@search']);
Route::get('/oper/fixture', 'FixtureController@opList');
Route::get('/oper/fixture/search/{str}', ['uses' => 'FixtureController@search']);
Route::get('/oper/material', 'MaterialController@opList');
Route::get('/oper/material/search/{str}', ['uses' => 'MaterialController@search']);
Route::get('/oper/comments', function(){
  return view('oper.comments');
} );
Route::get('/oper/contactsuper', function(){
  return view('oper.contactsuper');
} );

Route::get('/oper/steps', function(){
  return view('oper.steps');
} );

// Route::get('/oper/steps', 'ToolingController@opList');

Route::get('/oper/qualityalerts', function(){
  return view('oper.qualityalerts');
} );
Route::get('/searchpart', function(){
  return view('searchpart');
} );
Route::post('/oper/part/search', 'PartController@searchPartNumber');
Route::get('/oper/part/tooling/{id}', ['uses' => 'PartController@listPartTooling']);

//SUPERVISOR AND ADMIN SHARED ROUTES
Route::group(['middleware' => ['supervisor']] , function () {

  // Parts
  Route::get('/admin/part/list', 'PartController@list');
  Route::get('/admin/part/edit/{id}', ['uses' => 'PartController@edit']);
  Route::post('/admin/part/update', 'PartController@update');
  Route::get('/admin/part/add-step', function(){
    return view('admin.part.add-step');
  });
  Route::get('/admin/part/add-alert', function(){
    return view('admin.part.add-alert');
  });
  Route::get('/admin/part/add-operation', function(){
    return view('admin.part.add-operation');
  });
  Route::get('/admin/part/part-details', function(){
    return view('admin.part.part-details');
  });
  Route::get('/admin/part/operation-details', function(){
    return view('admin.part.operation-details');
  });
   Route::get('/admin/part/add-alert', function(){
    return view('admin.part.add-alert');
  });

  Route::get('/admin/part/list/search/{str}', ['uses' => 'PartController@search']);

  // Steps // This might be deleted in future
  Route::get('/admin/step/list', 'StepController@list');
  Route::get('/admin/step/edit/{id}', ['uses' => 'StepController@edit']);
  Route::post('/admin/step/update', 'StepController@update');
  // Route::get('/admin/step/list/{id}',['uses' => 'StepController@quickview']);
  // Route::get('/admin/step/editMedia/{id}', ['uses' => 'StepController@editMedia']);

  // Tool //
  Route::get('/admin/tooling/list', 'ToolingController@list');
  Route::get('/admin/tooling/edit/{id}', ['uses' => 'ToolingController@edit']);
  Route::get('/admin/tooling/list/search/{str}', ['uses' => 'ToolingController@search']);
  Route::post('/admin/tooling/update', 'ToolingController@update');
  Route::get('/admin/tooling/list/{id}',['uses' => 'ToolingController@quickview']);
  Route::get('/admin/tooling/editMedia/{id}', ['uses' => 'ToolingController@editMedia']);

  // Fixture //
  Route::get('/admin/fixture/list', 'FixtureController@list');
  Route::get('/admin/fixture/edit/{id}', ['uses' => 'FixtureController@edit']);
  Route::get('/admin/fixture/list/search/{str}', ['uses' => 'FixtureController@search']);
  Route::post('/admin/fixture/update', 'FixtureController@update');
  Route::get('/admin/fixture/list/{id}',['uses' => 'FixtureController@quickview']);
  Route::get('/admin/fixture/editMedia/{id}', ['uses' => 'FixtureController@editMedia']);

  // Material //
  Route::get('/admin/material/list', 'MaterialController@list');
  Route::get('/admin/material/edit/{id}', ['uses' => 'MaterialController@edit']);
  Route::get('/admin/material/list/search/{str}', ['uses' => 'MaterialController@search']);
  Route::post('/admin/material/update', 'MaterialController@update');
  Route::get('/admin/material/list/{id}',['uses' => 'MaterialController@quickview']);
  Route::get('/admin/material/editMedia/{id}', ['uses' => 'MaterialController@editMedia']);

  // Media //
  Route::get('/admin/media/add', 'MediaController@add');
  Route::post('/admin/media/store', 'MediaController@store');

});

// ADMIN ONLY ROUTES
Route::middleware(['admin'])->group(function () {

  // Parts //
  Route::get('/admin/part/add', 'PartController@add');
  Route::post('/admin/part/store', 'PartController@store');
  Route::get('/admin/part/destroy/{id}', ['uses' => 'PartController@destroy']);
  Route::get('/admin/part/add/search/{str}', ['uses' => 'ToolingController@search']);

  // Operations //
  Route::get('/admin/part/add/operations', function(){
    return view('admin.operation.add');
  });
  Route::get('/admin/part/add/opdetails', function(){
    return view('admin.operation.details');
  });

  // Steps // This might be deleted in future
  Route::get('/admin/step/add', 'StepController@add');
  Route::post('/admin/step/store', 'StepController@store');
  Route::get('/admin/step/destroy/{id}', ['uses' => 'StepController@destroy']);
  Route::get('/admin/step/destroyMedia/{id}', ['uses' => 'StepController@destroyMedia']);

  // Tool //
  Route::get('/admin/tooling/add', 'ToolingController@add');
  Route::post('/admin/tooling/store', 'ToolingController@store');
  Route::get('/admin/tooling/destroy/{id}', ['uses' => 'ToolingController@destroy']);
  Route::get('/admin/tooling/destroyMedia/{id}', ['uses' => 'ToolingController@destroyMedia']);

  // Fixture //
  Route::get('/admin/fixture/add', 'FixtureController@add');
  Route::post('/admin/fixture/store', 'FixtureController@store');
  Route::get('/admin/fixture/destroy/{id}', ['uses' => 'FixtureController@destroy']);
  Route::get('/admin/fixture/destroyMedia/{id}', ['uses' => 'FixtureController@destroyMedia']);

  // Material //
  Route::get('/admin/material/add', 'MaterialController@add');
  Route::post('/admin/material/store', 'MaterialController@store');
  Route::get('/admin/material/destroy/{id}', ['uses' => 'MaterialController@destroy']);
  Route::get('/admin/material/destroyMedia/{id}', ['uses' => 'MaterialController@destroyMedia']);

  // Users //
  Route::get('/admin/user/add', 'UsersController@add');
  Route::post('/admin/user/store', 'UsersController@store');
  Route::get('/admin/user/list', 'UsersController@list');
  Route::get('/admin/user/list/{id}',['uses' => 'UsersController@quickview']);
  Route::get('/admin/user/edit/{id}', ['uses' => 'UsersController@edit']);
  Route::post('/admin/user/update', 'UsersController@update');
  Route::get('/admin/user/destroy/{id}', ['uses' => 'UsersController@destroy']);
  Route::get('/admin/user/destroyMedia/{id}', ['uses' => 'UsersController@destroyMedia']);
  Route::get('/admin/user/list/search/{str}', ['uses' => 'UsersController@search']);
});
