<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Support\Facades\Session;

class UserEventController extends Controller
{
    //  Function to view Event List
    public function viewEventList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'event');
        $data = Event::all();
        return view('pages.event.list')->with('data', $data);
    }

    // Function to view Event Details
    public function viewEventDetails()
    {
        return view('pages.event.detail');
    }
}
