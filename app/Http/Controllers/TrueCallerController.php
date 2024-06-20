<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TrueCallerController extends Controller
{
    public function searchForm()
    {
        return view('search');
    }


//  =================== NUMVERIFY_API_KEY  ================== 16 used of 100 /month

    public function search(Request $request)
    {
        $phoneNumber = $request->input('phone_number');

        // Remove any non-numeric characters except the plus sign
        $phoneNumber = preg_replace('/[^0-9+]/', '', $phoneNumber);

        $client = new Client();
        $apiKey = env('NUMVERIFY_API_KEY');

        // Log the API key and phone number to ensure they are correct
        Log::info('Using API Key: ' . $apiKey);
        Log::info('Phone Number: ' . $phoneNumber);

        try {
            $response = $client->request('GET', 'https://api.apilayer.com/number_verification/validate', [
                'query' => [
                    'number' => $phoneNumber,
                ],
                'headers' => [
                    'apikey' => $apiKey
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            // Log the API response
            Log::info('Numverify API Response: ', $data);

            if (isset($data['valid']) && $data['valid']) {
                return response()->json([
                    'country' => $data['country_name'],
                    'location' => $data['location'] ?? 'N/A',
                    'carrier' => $data['carrier'] ?? 'N/A',
                    'line_type' => $data['line_type'] ?? 'N/A'
                ]);
            } else {
                return response()->json(['message' => 'Invalid phone number', 'data' => $data], 404);
            }
        } catch (\Exception $e) {
            Log::error('API request failed: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['message' => 'API request failed', 'error' => $e->getMessage()], 500);
        }
    }


//  ====================  NEUTRINO_TEST_API_KEY  =============== wright API 250 request /month

    // public function search(Request $request)
    // {
    //     $phoneNumber = $request->input('phone_number');

    //     // Remove any non-numeric characters except the plus sign
    //     $phoneNumber = preg_replace('/[^0-9+]/', '', $phoneNumber);

    //     $client = new Client();
    //     $userId = env('NEUTRINO_USER_ID');
    //     $apiKey = env('APP_ENV') === 'production' ? env('NEUTRINO_PROD_API_KEY') : env('NEUTRINO_TEST_API_KEY');

    //     // Log the environment variables and phone number to ensure they are correct
    //     Log::info('Using API Key: ' . $apiKey);
    //     Log::info('Using User ID: ' . $userId);
    //     Log::info('Phone Number: ' . $phoneNumber);

    //     try {
    //         $response = $client->request('GET', 'https://neutrinoapi.net/phone-validate', [
    //             'query' => [
    //                 'user-id' => $userId,
    //                 'api-key' => $apiKey,
    //                 'number' => $phoneNumber,
    //                 'country-code' => 'IN', // India's country code
    //             ]
    //         ]);

    //         $data = json_decode($response->getBody(), true);

    //         // Log the API response
    //         Log::info('Neutrino API Response: ', $data);

    //         if (isset($data['valid']) && $data['valid']) {
    //             return response()->json([
    //                 'country' => $data['country'],
    //                 'location' => $data['location'],
    //                 'carrier' => $data['prefix-network'] ?? 'N/A',
    //                 'line_type' => $data['type'] ?? 'N/A'
    //             ]);
    //         } else {
    //             return response()->json(['message' => 'Invalid phone number', 'data' => $data], 404);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('API request failed: ' . $e->getMessage(), ['exception' => $e]);
    //         return response()->json(['message' => 'API request failed', 'error' => $e->getMessage()], 500);
    //     }
    // }



//  ================  ABSTRACT_API_KEY  =========== wright API 250 request /month


    // public function search(Request $request)
    // {
    //     $phoneNumber = $request->input('phone_number');

    //     // Remove any non-numeric characters except the plus sign
    //     $phoneNumber = preg_replace('/[^0-9+]/', '', $phoneNumber);

    //     $client = new Client();
    //     $apiKey = env('ABSTRACT_API_KEY');

    //     // Log the API key and phone number
    //     Log::info('Using API Key: ' . $apiKey);
    //     Log::info('Phone Number: ' . $phoneNumber);

    //     try {
    //         $response = $client->request('GET', 'https://phonevalidation.abstractapi.com/v1/', [
    //             'query' => [
    //                 'api_key' => $apiKey,
    //                 'phone' => $phoneNumber,
    //             ]
    //         ]);

    //         $data = json_decode($response->getBody(), true);

    //         // Log the full API response
    //         Log::info('AbstractAPI Response: ', $data);

    //         if (isset($data['valid']) && $data['valid']) {
    //             return response()->json([
    //                 'country' => $data['country']['name'],
    //                 'location' => $data['location'],
    //                 'carrier' => $data['carrier'],
    //                 'line_type' => $data['type']
    //             ]);
    //         } else {
    //             Log::warning('Invalid phone number', $data);
    //             return response()->json(['message' => 'Invalid phone number', 'data' => $data], 404);
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('API request failed: ' . $e->getMessage(), ['exception' => $e]);
    //         return response()->json(['message' => 'API request failed', 'error' => $e->getMessage()], 500);
    //     }
    // }

}
