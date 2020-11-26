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
        $medicine = \App\Medicines::where('status',1)->get();
        foreach ($medicine as $m){
            if(isset($value1)){
                /* dd($value1); */
                $deger= substr($m->name,0,1);
                if(substr_count($deger, $value1)){
                    $medicines = \App\Medicines::where('name',$m->name)->where('status',1)->get();
                }
                if($value1=='Anasayfa'){
                    $medicines = \App\Medicines::where('status',1)->get();
                } 
                if($value1=='1'){
                    $deger= substr($m->name,0,1);
                    foreach($tanimsiz as $t){
                        if(substr_count($deger,$t)){
                            $medicines = \App\Medicines::where('name',$m->name)->where('status',1)->get();
                        }
                    }
                }
            }
            else{
                $medicines = \App\Medicines::where('status',1)->get();
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
        $request['slug'] =Str::slug($request->name,"-");
        if (Medicines::where('slug',$request['slug'])->count() > 0)
        {
            $request['slug'] =$request['slug'] . "_2";
        };
        $data = $request->validate([
            'name' => 'required|max:255',
            'description' => 'max:255',
            'formula' => 'max:255|nullable',
            'pharmacological' => 'max:255|nullable',
            'indication' => 'max:255|nullable',
            'kontrendikasyon' => 'max:255|nullable',
            'warning' => 'max:255|nullable',
            'side_effects' => 'max:255|nullable',
            'usage' => 'max:255|nullable',
            'extra_information' => 'max:255',
            'barcode' => 'max:255',
            'companies_id' => 'required|max:255',
            'slug' => "max:255"
            
        ]);
        $medicines = tap(new \App\Medicines($data))->save();
    
        return redirect('/?h=Anasayfa');
    }
    public function show($slug){
        $medicines=Medicines::where('slug',$slug)->firstorFail();
        $company=$medicines->owner()->get();
        return view('medicines.show',compact('medicines','company'));
    }
    public function edit($id){
        $medicines=Medicines::findOrFail($id);
        $companies=Companies::where('status',1)->get();
        return view('medicines.edit',compact('medicines','companies'));
    }
    public function update($id){
        $medicines=Medicines::findOrFail($id);
        $medicines->name=request('name');
        $medicines->description=request('description');
        $medicines->formula=request('formula');
        $medicines->pharmacological=request('pharmacological');
        $medicines->indication=request('indication');
        $medicines->kontrendikasyon=request('kontrendikasyon');
        $medicines->warning=request('warning');
        $medicines->side_effects=request('side_effects');
        $medicines->usage=request('usage');
        $medicines->extra_information=request('extra_information');
        $medicines->barcode=request('barcode');
        $medicines->companies_id=request('companies_id');
        $medicines->save();
        return redirect('/medicines');
    }
    public function status($id){
        $medicines=Medicines::findOrFail($id);
        $medicines->status==0 ? $medicines->status=1 : $medicines->status=0;
        $medicines->save();
        return redirect('/medicines');
    }
}
