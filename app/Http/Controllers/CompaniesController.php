<?php

namespace App\Http\Controllers;
use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class CompaniesController extends Controller
{
    public function index(){
        if (Auth::user()==null)
        {
            abort(404);
        }
        $companies = \App\Companies::all();
        return view('companies.index',compact('companies'));
    }
    public function create(){
        if (Auth::user()==null)
        {
            abort(404);
        }
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
