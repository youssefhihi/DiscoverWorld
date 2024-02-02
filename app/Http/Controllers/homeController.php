<?php

namespace App\Http\Controllers;
use App\Models\Adventure;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filterPosts(Request $request)
    {
        $countries = Country::with('pictures')->get();
        $sortOption = $request->input('sort');
        $countryFilter = $request->input('country');
    
        $adventuresQuery = Adventure::query();
    
        // Filter by time
        if ($sortOption === 'oldest') {
            $adventuresQuery->orderBy('created_at');
        } elseif ($sortOption === 'newest') {
            $adventuresQuery->orderByDesc('created_at');
        }
    
        // Filter by country
        if ($countryFilter) {
            $adventuresQuery->whereHas('Country', function ($query) use ($countryFilter) {
                $query->where('country', $countryFilter);
            });
        }
    
        // Get the filtered adventures
        $adventures = $adventuresQuery->get();
       
    
        return view('home', ['adventures' => $adventures, 'countries' => $countries]);
    }
   

}
