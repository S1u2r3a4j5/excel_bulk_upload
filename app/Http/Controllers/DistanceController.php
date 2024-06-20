<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use App\Models\Test;
use App\Models\DistanceCalculator;


class DistanceController extends Controller
{
    public function showFormm()
    {
        return view('distance_formm');
    }

   
    public function calculateDistance(Request $request)
    {
        // Validate input
        $request->validate([
            'pincode1' => 'required',
            'pincode2' => 'required',
        ]);

        $client = new Client();
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $endpoint = 'https://maps.googleapis.com/maps/api/distancematrix/json';

        $pincode1 = $request->input('pincode1');
        $pincode2 = $request->input('pincode2');

        try {
            // Request to Distance Matrix API
            $response = $client->get($endpoint, [
                'query' => [
                    'origins' => $pincode1,
                    'destinations' => $pincode2,
                    'key' => $apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            

            // Check if results are available
            if (empty($data['rows'][0]['elements'][0]['distance'])) {
                return redirect()->back()->withErrors(['message' => 'Could not calculate distance.']);
            }

            $distance = $data['rows'][0]['elements'][0]['distance']['text'];

            

            return view('distance_formm', [
                'pincode1' => $pincode1,
                'pincode2' => $pincode2,
                'distance' => $distance
            ]);
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Distance Matrix API error: ' . $e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->withErrors(['message' => 'There was an error processing your request. Please try again.']);
        }
    }

    
    // private function calcDistance($point1, $point2)
    // {
    //     $radius = 6371; // Earth's radius in kilometers

    //     // Convert degrees to radians
    //     $lat1 = deg2rad($point1['lat']);
    //     $lon1 = deg2rad($point1['long']);
    //     $lat2 = deg2rad($point2['lat']);
    //     $lon2 = deg2rad($point2['long']);

    //     // Haversine formula
    //     $dlat = $lat2 - $lat1;
    //     $dlon = $lon2 - $lon1;
    //     $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
    //     $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    //     $distance = $radius * $c;

    //     return round($distance, 2);
    // }
}
