<?php

namespace App\Algorithm;

class SawAlgorithm
{
    public static function applySAW($places)
{
    $maxRating = $places->max('rating');         // Rating: semakin besar semakin baik (manfaat)
    $minDistance = $places->min('distance');     // Distance: semakin kecil semakin baik (biaya)

    // Normalisasi data
    $normalizedPlaces = $places->map(function ($place) use ($maxRating, $minDistance) {
        return [
            'name' => $place->name,
            'address' => $place->address,
            'rating' => $place->rating,
            'distance' => $place->distance,
            'normalized_rating' => $place->rating / $maxRating, // Manfaat
            'normalized_distance' => $minDistance / $place->distance // Biaya
        ];
    });

    // **Langkah 2: Bobot Kriteria**
    $weights = [
        'rating' => 0.6,    // Bobot untuk rating
        'distance' => 0.4   // Bobot untuk jarak
    ];

    // Hitung skor akhir berdasarkan bobot
    $rankedPlaces = $normalizedPlaces->map(function ($place) use ($weights) {
        $score = ($place['normalized_rating'] * $weights['rating']) +
                 ($place['normalized_distance'] * $weights['distance']);
        $place['score'] = $score; // Tambahkan skor ke data
        return $place;
    });

    // **Langkah 3: Urutkan Berdasarkan Skor**
    $rankedPlaces = $rankedPlaces->sortByDesc('score')->values();

    // Kembalikan data yang sudah diranking
    return response()->json($rankedPlaces);
}
}
