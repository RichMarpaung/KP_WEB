<?php

namespace App\Http\Controllers;
use App\Algorithm\SawAlgorithm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{


    public  function nearestPlaces(Request $request)
    {
        // Ambil lokasi user dari request
        $userLatitude = $request->latitude;
        $userLongitude = $request->longitude;

        // Query untuk tempat terdekat menggunakan rumus Haversine
        $places = DB::table('places')
            ->select(
                'name',
                'address',
                'rating',
                'latitude',
                'longitude',
                DB::raw("(
                    6371 * acos(
                        cos(radians($userLatitude)) *
                        cos(radians(latitude)) *
                        cos(radians(longitude) - radians($userLongitude)) +
                        sin(radians($userLatitude)) *
                        sin(radians(latitude))
                    )
                ) AS distance")
            )
            ->orderBy('distance', 'asc') // Urutkan berdasarkan jarak terdekat
            ->limit(3) // Ambil 5 tempat terdekat
            ->get();
            // Log::info("Places Query Result: ", $places->toArray());
            return response()->json($places); // Kembalikan sebagai JSON
            // $recommendedPlaces = SawAlgorithm::applySAW($places);
            // return response()->json($recommendedPlaces);
    }



}
