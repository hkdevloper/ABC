<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Function to view All Events
    public function viewEvents()
    {
        return view('pages.admin.events.view_all');
    }

    // Function to view Add Event
    public function viewAddEvent()
    {
        return view('pages.admin.events.add');
    }

    // Function to view Edit Event
    public function viewEditEvent()
    {
        return view('pages.admin.events.edit');
    }
}
