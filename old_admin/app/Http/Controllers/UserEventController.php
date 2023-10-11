<?php

namespace App\Http\Controllers;

use App\Models\Events;
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
        $data = Events::all();
        return view('pages.user.event.list')->with('data', $data);
    }

    // Function to view Event Details
    public function viewEventDetails()
    {
        return view('pages.user.event.detail');
    }
}
