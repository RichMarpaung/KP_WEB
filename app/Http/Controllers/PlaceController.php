<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaceRequest;
use App\Http\Requests\UpdatePlaceRequest;
use App\Models\Place;
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
    public function store()
    {

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
    public function destroy()
    {
        //
    }
}
