<?php

namespace App\Http\Controllers;
use App\Companies;
use Illuminate\Http\Request;
use App\Medicines;
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
    return view('medicines.index', ['medicines' => $medicines],compact('harfler','value1','sayac'));
    }
    public function create(){
        $companies=Companies::all();
        return view('medicines.create',compact('companies'));
    }
    public function store(Request $request){
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
            'url' => 'required|url|max:255'
            
        ]);
        $medicines = tap(new \App\Medicines($data))->save();
    
        return redirect('/medicines');
    }
    public function show($name){
        $name = str_replace('-', ' ', $name);
        $medicines=Medicines::where('name',$name)->first();
        $c=Medicines::where('name',$name)->first()->companies_id;
        $companies=Companies::where('id',$c)->first()->name;
        return view('medicines.show',compact('medicines','companies'));
    } 
}
