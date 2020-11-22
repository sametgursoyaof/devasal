<?php

namespace App\Http\Controllers;
use App\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(){
        $companies = \App\Companies::all();
        return view('companies.index',compact('companies'));
    }
    public function create(){
        return view('companies.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255'
            
        ]);
        $companies = tap(new \App\Companies($data))->save();
    
        return redirect('companies');
    }
}
