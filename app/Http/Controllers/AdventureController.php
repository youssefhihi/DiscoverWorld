<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use App\Models\Adventure;
use App\Models\Pictures;
use App\Models\Country;
use Illuminate\Http\Request;

class AdventureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $key = 'adventures.all';

        $adventures = Cache::remember($key, 60, function () {

            return Adventure::all();
        });
    
        return view('home', ['adventures' => $adventures]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addAdventure');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    

    // Create the adventure
    $adventure = new Adventure();
    $adventure->title = $request->title;
    $adventure->description = $request->description;
    $adventure->advice = $request->advice;
    $adventure->countryID = $request->countryID;
    
    $adventure->save();

    // Handle picture upload
    

    // Handle picture upload
    if ($request->hasFile('pictures')) {
    $pictures = [];

    foreach ($request->file('pictures') as $picture) {
        // Use the original filename as the second parameter to storeAs
        $filename = time() . '_' . $picture->getClientOriginalName();
        $path = $picture->storeAs('pictures', $filename);

        // $path now contains the relative path including the original filename
        $pictures[] = ['picture' => $path];
    }

    // Use createMany to insert multiple records
    $adventure->pictures()->createMany($pictures);
}


   // return redirect()->route('filterAdventures')->with('success', 'Adventure added successfully!');
}




    public function filterPosts(Request $request)
    {
        $sortOption = $request->input('sort');

        if ($sortOption === 'oldest') {
            $posts = Adventure::orderBy('created_at')->get();
        } elseif ($sortOption === 'newest') {
            $posts = Adventure::orderByDesc('created_at')->get();
        } else {          
            $posts = Adventure::all();
        }

        return view('home', ['adventures' => $posts]);
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
