<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function index(){
        return view('/create2');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255'
            
        ]);
        $companies = tap(new \App\Companies($data))->save();
    
        return redirect('/');
    }
}
