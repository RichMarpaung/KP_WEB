<?php

namespace App\Http\Controllers;

use App\Algorithm\SawAlgorithm;
use App\Http\Controllers\Controller;
use App\Models\Place;
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



    // Fungsi untuk menampilkan halaman view
    public function showPlacesView()
    {
        return view('lokasi');
    }

    public static function applySAW($latitude, $longitude)
    {
        $places = DB::table('places')
            ->leftJoin('reviews', 'places.id', '=', 'reviews.place_id')
            ->select(
                'places.id',
                'places.name',
                'places.address',
                'places.description',
                'places.photo',
                DB::raw('COALESCE(AVG(reviews.rating), 0) as rating'), // Rata-rata rating
                DB::raw('COUNT(reviews.id) as total_review'), // Rata-rata rating
                DB::raw("(
                    6371 * acos(
                        cos(radians($latitude))
                        * cos(radians(places.latitude))
                        * cos(radians(places.longitude) - radians($longitude))
                        + sin(radians($latitude))
                        * sin(radians(places.latitude))
                    )
                ) AS distance") // Hitung jarak
            )
            ->groupBy('places.id') // Grup berdasarkan tempat
            ->get();

        // Langkah 1: Normalisasi Data
        $maxRating = $places->max('rating');         // Rating maksimal
        $minDistance = $places->min('distance');     // Jarak minimal

        // Normalisasi data
        $normalizedPlaces = $places->map(function ($place) use ($maxRating, $minDistance) {
            return [
                'id' => $place->id,
                'name' => $place->name,
                'address' => $place->address,
                'rating' => $place->rating,
                'distance' => $place->distance,
                'photo' => $place->photo,
                'total_review' => $place->total_review,
                'description' => $place->description,
                'normalized_rating' => $place->rating / ($maxRating ?: 1),
                'normalized_distance' => ($minDistance ?: 1) / $place->distance // Hindari pembagian dengan nol
            ];
        });

        $weights = [
            'rating' => 0.6,    // Bobot untuk rating
            'distance' => 0.4   // Bobot untuk jarak
        ];

        $rankedPlaces = $normalizedPlaces->map(function ($place) use ($weights) {
            $score = ($place['normalized_rating'] * $weights['rating']) +
                ($place['normalized_distance'] * $weights['distance']);
            $place['score'] = $score; // Tambahkan skor ke data
            return $place;
        });

        $rankedPlaces = $rankedPlaces->sortByDesc('score')->values();
        return response()->json($rankedPlaces);
    }


    public function showRankedPlaces(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        if (!$latitude || !$longitude) {
            return redirect()->back()->with('error', 'Latitude dan Longitude diperlukan.');
        }

        $tempat = json_decode(self::applySAW($latitude, $longitude)->getContent(), true);
        $rekomen = $tempat[0];


        return view('ranked_places', ['rekomen' => $rekomen, 'tempat' => $tempat, 'latitude' => $latitude, 'longitude' => $longitude]);
    }

    public function listplaces(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        // Validasi input
        if (!$latitude || !$longitude) {
            return redirect()->back()->with('error', 'Latitude dan Longitude diperlukan.');
        }

        $tempat = json_decode(self::applySAW($latitude, $longitude)->getContent(), true);
        $rekomen = $tempat[0];
        // Kirim data ke view
        return view('userpage.card', ['rekomen' => $rekomen, 'tempat' => $tempat, 'latitude' => $latitude, 'longitude' => $longitude]);
    }
}
