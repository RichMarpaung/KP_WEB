<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $tempat = Place::withAvg('reviews', 'rating') // Mengambil rata-rata rating
        ->withCount('reviews') // Mengambil total review
        ->get();
        $rekomendasi = $tempat->sortByDesc('reviews_avg_rating')->first();
        return view('userpage.listtempat',compact('tempat','rekomendasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|file|max:2048|mimes:png,jpeg,jpg',
        'description' => 'required|string',
        'address' => 'required|string',
    ]);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('place/photo_path', 'public');
    }

    Place::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'address' => $validated['address'],
        'photo' => $validated['photo'] ?? null,
        'total_review' => 0,
    ]);

    return redirect(route('admin.place.list'))->with('success', 'Place added successfully');
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $place = Place::find($id);
        $place->delete();
        return redirect()->route('admin.place.list')->with('success', 'User deleted successfully.');

    }
}
