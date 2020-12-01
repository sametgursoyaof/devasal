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
    $search=request('query');
    if ($search) {
        $medicines=\App\Medicines::where('name','LIKE','%'.$search.'%')->get();
    } 
    else if ($value1) {
        $medicine = \App\Medicines::where('status',1)->get();
        foreach ($medicine as $m){
            $deger= substr($m->name,0,1);
            if(substr_count($deger, $value1)){
                $medicines=\App\Medicines::where('name','LIKE',$value1.'%')->where('status',1)->get();
            }
            if($value1=='Anasayfa'){
                $medicines = \App\Medicines::where('status',1)->get();
            } 
            if($value1=='1'){
                $deger= substr($m->name,0,1);
                foreach($tanimsiz as $t){
                    if(substr_count($deger,$t)){
                        $medicines=\App\Medicines::where('name','LIKE',$t.'%')->where('status',1)->get();
                    }
                }
            }
        }
    }
    else{
        $medicines = \App\Medicines::where('status',1)->get();
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
            'active_ingredient' => 'max:255',
            'description' => 'nullable',
            'formula' => 'max:255|nullable',
            'pharmacological' => 'nullable',
            'indication' => 'nullable',
            'kontrendikasyon' => 'nullable',
            'warning' => 'nullable',
            'side_effects' => 'nullable',
            'usage' => 'nullable',
            'extra_information' => 'nullable',
            'barcode' => 'max:255',
            'companies_id' => 'required',
            'slug' => "max:255"
            
        ]);
        $medicines = tap(new \App\Medicines($data))->save();
    
        return redirect('/?h=Anasayfa');
    }
    public function show($slug){
        $medicine=Medicines::where('slug',$slug)->firstorFail();
        $company=$medicine->owner()->get();
        return view('medicines.show',compact('medicine','company'));
    }
    public function edit($id){
        $medicine=Medicines::findOrFail($id);
        $company=Companies::where('status',1)->get();
        return view('medicines.edit',compact('medicine','company'));
    }
    public function update($id){
        $medicine=Medicines::findOrFail($id);
        $medicine->name=request('name');
        $medicine->active_ingredient=request('active_ingredient');
        $medicine->description=request('description');
        $medicine->formula=request('formula');
        $medicine->pharmacological=request('pharmacological');
        $medicine->indication=request('indication');
        $medicine->kontrendikasyon=request('kontrendikasyon');
        $medicine->warning=request('warning');
        $medicine->side_effects=request('side_effects');
        $medicine->usage=request('usage');
        $medicine->extra_information=request('extra_information');
        $medicine->barcode=request('barcode');
        $medicine->companies_id=request('companies_id');
        $medicine->save();
        return redirect('/medicines');
    }
    public function status($id){
        $medicine=Medicines::findOrFail($id);
        $medicine->status==0 ? $medicine->status=1 : $medicine->status=0;
        $medicine->save();
        return redirect('/medicines');
    }
    public function search(Request $request){
        $harfler=['Anasayfa','#','A','B','C','D','E','F','G','H','İ','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
        $sayac=1;
        $value1=request('h');
        $search=request('query');
        $medicines=\App\Medicines::where('name','LIKE','%'.$search.'%')->get();
        return view('medicines.index',compact('medicines','harfler','value1','sayac'));
    }
}
