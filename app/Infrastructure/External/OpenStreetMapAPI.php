<?php

namespace App\Infrastructure\External;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OpenStreetMapAPI
{
    public function geocode(float $lat, float $lng): array
    {
        // Cache key based on coordinates with precision
        $cacheKey = "geocode_" . round($lat, 6) . "_" . round($lng, 6);

        // Return cached response if available
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        try {
            // Call external geocoding API
            $response = Http::get("https://nominatim.openstreetmap.org/reverse", [
                'lat' => $lat,
                'lon' => $lng,
                'format' => 'json',
                'addressdetails' => 1
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // Cache the result for 24 hours
                Cache::put($cacheKey, $data, 86400);

                return $data;
            }

            return ['error' => 'Geocoding API request failed'];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public function validateDeliveryLocation(float $lat, float $lng): array
    {
        // Define store location or delivery zones
        $storeLocation = [
            'lat' => 32.2833,
            'lng' => -9.2333
        ];

        // Calculate distance using Haversine formula
        $distance = $this->calculateDistance(
            $storeLocation['lat'],
            $storeLocation['lng'],
            $lat,
            $lng
        );

        // Determine if delivery is possible (e.g., within 10km)
        $isDeliverable = $distance <= 10;

        return [
            'isDeliverable' => $isDeliverable,
            'distance' => $distance,
            'message' => $isDeliverable
                ? 'Location is within delivery range.'
                : 'Sorry, we don\'t deliver to this location.'
        ];
    }

    private function calculateDistance(float $lat1, float $lon1, float $lat2, float $lon2): float
    {
        // Earth's radius in kilometers
        $radius = 6371;

        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);

        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;

        $a = sin($deltaLat/2) * sin($deltaLat/2) +
             cos($lat1) * cos($lat2) *
             sin($deltaLon/2) * sin($deltaLon/2);

        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $radius * $c;
    }
}
