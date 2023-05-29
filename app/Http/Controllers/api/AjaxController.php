<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Function to get Country List
    public function getCountryList()
    {
        $countries = Location::all();
        return response()->json($countries);
    }

    // Function to get State List
    public function getStateList(Request $request)
    {
        $states = Location::where('parent_id', $request->country_id)->get();
        return response()->json($states);
    }

    // Function to get City List
    public function getCityList(Request $request)
    {
        $cities = Location::where('parent_id', $request->state_id)->get();
        return response()->json($cities);
    }
}
