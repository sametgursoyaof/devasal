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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
/* Route::get('/create', function () {
    return view('create');
}); */
Route::resource('medicines', 'MedicinesController');
Route::get('/', function () {
    $medicines = \App\Medicines::all();
    return view('welcome', ['medicines' => $medicines]);
});
