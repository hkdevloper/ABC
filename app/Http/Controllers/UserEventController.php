<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Product;
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
        $events = Event::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        $categories = Category::where('type', 'event')->where('is_active', 1)->get();
        $data = compact('events', 'categories');
        return view('pages.event.list')->with($data);
    }

    // Function to view Event Details
    public function viewEventDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $event = Event::where('slug', $slug)->where('is_approved', 1)->where('is_active', 1)->first();
        $related_events = Event::where('category_id', $event->category_id)->where('is_approved', 1)->where('is_active', 1)->where('id', '!=', $event->id)->get();
        $data = compact('event', 'related_events');
        return view('pages.event.detail')->with($data);
    }
}
