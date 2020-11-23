<?php

namespace App\Http\Controllers;
use App\Companies;
use Illuminate\Http\Request;
use App\Medicines;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Support\Str;
class MedicinesController extends Controller
{
    public function index(){
    $harfler=['Anasayfa','#','A','B','C','D','E','F','G','H','İ','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
    $tanimsiz=['%','1','2','3','4','5','6','7','8','9','0'];

    $sayac=1;
    $value1=request('h');
        $medicine = \App\Medicines::all();
        foreach ($medicine as $m){
            if(isset($value1)){
                /* dd($value1); */
                $deger= substr($m->name,0,1);
                if(substr_count($deger, $value1)){
                    $medicines = \App\Medicines::where('name',$m->name)->get();
                }
                if($value1=='Anasayfa'){
                    $medicines = \App\Medicines::all();
                } 
                if($value1=='1'){
                    $deger= substr($m->name,0,1);
                    foreach($tanimsiz as $t){
                        if(substr_count($deger,$t)){
                            $medicines = \App\Medicines::where('name',$m->name)->get();
                        }
                    }
                }
            }
            else{
                $medicines = \App\Medicines::all();
            }
        }
    return view('medicines.index',compact('harfler','value1','sayac','medicines'));
    }
    public function create(){
        if (Auth::user()==null)
        {
            abort(404);
        }
        $companies=Companies::all();
        return view('medicines.create',compact('companies'));
    }
    public function store(Request $request){
        $request['url'] =Str::slug($request->name,"_");
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'formula' => 'max:255|nullable',
            'pharmacological' => 'max:255|nullable',
            'indication' => 'max:255|nullable',
            'kontrendikasyon' => 'max:255|nullable',
            'warning' => 'max:255|nullable',
            'side_effects' => 'max:255|nullable',
            'usage' => 'max:255|nullable',
            'extra_information' => 'required|max:255',
            'barcode' => 'required|max:255',
            'companies_id' => 'required|max:255',
            'url' => "required|max:255"
            
        ]);
        $medicines = tap(new \App\Medicines($data))->save();
    
        return redirect('/?h=Anasayfa');
    }
    public function show($url){
        $url = str_replace('_', ' ', $url);
        $medicines=Medicines::where('name',$url)->first();
        $c=Medicines::where('name',$url)->first()->companies_id;
        $companies=Companies::where('id',$c)->first()->name;
        return view('medicines.show',compact('medicines','companies'));
    }
}
