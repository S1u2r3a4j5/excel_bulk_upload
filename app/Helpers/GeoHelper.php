<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Log; 

class GeoHelper
{
    public static function getAddressFromGoogle($address = '', $lat = '', $lng = '')
    {
        $data = [
            'lat' => '',
            'lng' => '',
            'locality' => '',
            'street_number' => '',
            'route' => '',
            'sublocality_level_1' => '',
            'postal_code' => '',
            'city' => '',
            'short_city' => '',
            'state' => '',
            'short_state' => '',
            'country' => '',
            'short_country' => '',
        ];

        try {
            if ($address) {
                $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=' . env('GOOGLE_MAPS_API_KEY') . '&address=' . urlencode($address) . '&sensor=false&region=IN');
            } else {
                $geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?key=' . env('GOOGLE_MAPS_API_KEY') . '&latlng=' . $lat . ',' . $lng . '&sensor=false&region=IN');
            }

            $output = json_decode($geocode);

            if (!isset($output->results) || !isset($output->results[0])) {
                return $data;
            }

            $data['lat'] = $output->results[0]->geometry->location->lat ?? '';
            $data['lng'] = $output->results[0]->geometry->location->lng ?? '';

            foreach ($output->results[0]->address_components as $res) {
                switch ($res->types[0]) {
                    case 'administrative_area_level_1':
                        $data['state'] = $res->long_name;
                        $data['short_state'] = $res->short_name;
                        break;
                    case 'administrative_area_level_2':
                        $data['city'] = $res->long_name;
                        $data['short_city'] = $res->short_name;
                        break;
                    case 'country':
                        $data['country'] = $res->long_name;
                        $data['short_country'] = $res->short_name;
                        break;
                    case 'locality':
                        $data['locality'] = $res->long_name;
                        break;
                    case 'sublocality_level_1':
                        $data['sublocality_level_1'] = $res->long_name;
                        break;
                    case 'postal_code':
                        $data['postal_code'] = $res->long_name;
                        break;
                    case 'street_number':
                        $data['street_number'] = $res->long_name;
                        break;
                    case 'route':
                        $data['route'] = $res->long_name;
                        break;
                }
            }

            $data['address'] = $output->results[0]->formatted_address ?? '';
        } catch (\Exception $e) {
            // Log the error
            Log::error('Google Maps Geocoding API error: ' . $e->getMessage());
        }

        return $data;
    }

        
}
