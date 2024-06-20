<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function Ajax()
    {
        return view('ajax');
    }

    // public function w3Ajax()
    // {
    //     return response([
    //         'name' => 'suraj',
    //         'profile' => 'developer',
    //         "place" => 'Indore',
    //     ]);
    // }

    public function w3Ajax()
    {
        return view("w3Ajax");
    }
    public function delhi()
    {
        return view("delhi");
    }
    public function noida()
    {
        return view("noida");
    }
    public function indore()
    {
        return view("indore");
    }
    public function jabalpur()
    {
        return view("jabalpur");
    }


    public function w3Jquery()
    {
        return view('w3Jquery');
    }


}
