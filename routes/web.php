<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Route::get('/create', function () {
    return view('create');
}); */
Route::resource('medicines', 'MedicinesController');
Route::resource('companies', 'CompaniesController');
Route::get('/', 'MedicinesController@index');
Route::get('{slug}', 'MedicinesController@show');
Route::get('companies/status/{companies}', 'CompaniesController@status');
Route::get('medicines/status/{medicines}', 'MedicinesController@status');
Route::get('search/{query}', 'MedicinesController@search');
Route::post('search', 'MedicinesController@search');
Route::get('ilaclar/{h}', 'MedicinesController@ilaclar');
Route::get('ilaclar/{slug}', 'MedicinesController@show');
Route::get('medicines/{id}/upload', 'MedicinesController@upload');
Route::post('/addimage', 'MedicinesController@upload_create')->name('addimage');
Route::post('/destroy', 'MedicinesController@destroy');