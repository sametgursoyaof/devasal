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
    $harfler=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
    $value1=request('h');
    $medicines = \App\Medicines::where('status',1)->get();
    return view('medicines.index',compact('harfler','value1','medicines'));
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
        $company=$medicine->owner->name;
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
        $harfler=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
        $value1=request('h');
        $search=request('query');
        $medicines=\App\Medicines::where('name','LIKE','%'.$search.'%')->where('status',1)->get();
        return view('medicines.index',compact('medicines','harfler','value1'));
    }
    public function ilaclar($h){
        $harfler=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','Y','X','Z'];
        $value1=request('h');
        $medicines=\App\Medicines::where('name','LIKE',$h.'%')->where('status',1)->get();
        return view('medicines.index',compact('medicines','harfler','value1'));
    }
}
