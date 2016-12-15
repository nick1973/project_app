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
    return redirect('/projects');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('/projects', 'ProjectsController');
Route::resource('/projects/requirements', 'RequirementsController');
Route::post('/projects/requirements/add_requirements', 'RequirementsController@add_requirements')
    ->name('requirements.add_requirements');
