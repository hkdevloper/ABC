<?php

namespace App\Http\Controllers;

class EventController extends Controller
{
    //  Function to view Event List
    public function viewEventList()
    {
        return view('pages.user.event.list');
    }

    // Function to view Event Details
    public function viewEventDetails()
    {
        return view('pages.user.event.detail');
    }
}
