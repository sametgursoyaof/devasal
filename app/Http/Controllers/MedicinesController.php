<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class MedicinesController extends Controller
{
    public function index(){
        return view('/create');
    }
    public function store(Request $request)
    {
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
            'url' => 'required|url|max:255',
            
        ]);
        $medicines = tap(new \App\Medicines($data))->save();
    
        return redirect('/');
    }
}
