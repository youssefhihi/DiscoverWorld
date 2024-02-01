<?php

namespace App\Http\Controllers;
use App\Models\Adventure;
use App\Models\Country;

use Illuminate\Http\Request;

class Pages extends Controller
{
    public function index(){
        $adventures = Adventure::with('country','pictures')->get();
        $countries = Country::with('pictures')->get();
        
        return view('home',['adventures' => $adventures, 'countries' => $countries]);
    }
}
