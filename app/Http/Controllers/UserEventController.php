<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserEventController extends Controller
{
    //  Function to view Event List
    public function viewEventList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'event');
        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $events = Event::where('is_approved', 1)->where('category_id', $cat_id->id)->paginate(10);
        }
        // Show All Companies
        else if($request->has('show') && $request->show == 'all'){
            $events = Event::where('is_approved', 1)->paginate(100);
        }
        // Show Active Companies
        else if($request->has('filter') && $request->filter == 'active'){
            $events = Event::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        // Show the Latest Companies
        else if ($request->has('filter') && $request->filter == 'in-active') {
            $events = Event::where('is_approved', 1)->where('is_active', 0)->paginate(10);
        }
        // Sort by name
        else if ($request->has('sort') && $request->sort == 'name') {
            $events = Event::where('is_approved', 1)->orderBy('name', 'asc')->paginate(10);
        }
        // Sort by Date
        else if ($request->has('sort') && $request->sort == 'date') {
            $events = Event::where('is_approved', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        else {
            $events = Event::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        $categories = Category::where('type', 'event')->where('is_active', 1)->get();
        $data = compact('events', 'categories');
        return view('pages.event.list')->with($data);
    }

    // Function to view Event Details
    public function viewEventDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $event = Event::where('slug', $slug)->where('is_approved', 1)->where('is_active', 1)->firstOrFail();
        $related_events = Event::where('category_id', $event->category_id)->where('is_approved', 1)->where('is_active', 1)->where('id', '!=', $event->id)->get();
        $data = compact('event', 'related_events');
        return view('pages.event.detail')->with($data);
    }
}
