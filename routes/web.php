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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/taskList/{text?}','TaskController@index');
Route::post('/taskList','TaskController@store');
Route::get('/taskList/edit/{id}','TaskController@edit');
Route::put('/taskList/edit/{id}','TaskController@update');
Route::delete('/taskList/{id}','TaskController@destroy');


