<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Adventure;
use App\Models\Country;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $totalAdventures = Cache::remember('total_adventures', 60, function () {
            return Adventure::count();
        });
    
        $mostPostedCountries = Cache::remember('most_posted_countries', 60, function () {
            return Country::withCount('adventures')
                ->orderByDesc('adventures_count')
                ->limit(4)
                ->get();
        });
    
        return view('explore', [
            'mostPostedCountries' => $mostPostedCountries,
            'totalAdventures' => $totalAdventures,
        ]);
    }
}
