<?php

namespace App\Http\Controllers;
use App\Models\Adventure;
use App\Models\Country;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $totalAdventures = Adventure::count();
        $mostPostedCountries = Country::withCount('adventures')
        ->orderByDesc('adventures_count')
        ->limit(5)  
        ->get();
        return view('explore', ['mostPostedCountries' => $mostPostedCountries,'totalAdventures' => $totalAdventures ]);

    }
}
