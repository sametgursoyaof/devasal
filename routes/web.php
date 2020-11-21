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
Route::get('/', function () {
    $harfler=['Anasayfa','#','A','B','C','D','E','F','G','H','İ','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
    $tanimsiz=['%','1','2','3','4','5','6','7','8','9','0'];

    $sayac=1;
    $value1=request('h');
        $medicine = \App\Medicines::all();
        foreach ($medicine as $m){
            if(isset($value1)){
                $deger= substr($m->name, 0);
                if(substr_count($deger, $value1)){
                    $medicines = \App\Medicines::where('name',$deger)->get();
                }
                if($value1=='Anasayfa'){
                    $medicines = \App\Medicines::all();
                } 
            }else{
                $deger= substr($m->name, 0);
                foreach($tanimsiz as $t){
                    if(substr_count($deger,$t)){
                        $medicines = \App\Medicines::where('name',$deger)->get();
                    }
                }
            }
        }
    return view('welcome', ['medicines' => $medicines],compact('harfler','value1','sayac'));
});
