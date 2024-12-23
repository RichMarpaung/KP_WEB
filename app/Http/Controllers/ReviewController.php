<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Place;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'place_id' => 'required',
            'user_id' => 'required',
            'coment' => 'required',
            'pic' => 'nullable|image|file|max:2048|mimes:png,jpeg,jpg',
            'rating' =>'required',
        ]);
        if($request->file('pic')){
            $validated['pic'] = $request->file('pic')->store('review/pic_path','public');
            // $validated['image'] = $request->file('image')->storeAs('product/image_path');
        }

        Review::create($validated);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $place_id = Crypt::decrypt($id);
        $place = Place::withAvg('reviews', 'rating')->findOrFail($place_id);
        $reviews = Review::where('place_id', $place_id)->get();
        return view('userpage.komen', compact('reviews','place'));
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
