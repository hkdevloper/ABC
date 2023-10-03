<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    //  Function to view Event List
    public function viewEventList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'event');
        return view('pages.user.event.list');
    }

    // Function to view Event Details
    public function viewEventDetails()
    {
        return view('pages.user.event.detail');
    }
}
