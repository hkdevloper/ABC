<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
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
        $countryFilter = $request->input('country');

        // Initialize the query to retrieve deals
        $eventQuery = Event::select('events.*')
            ->join('seo', 'events.seo_id', '=', 'seo.id')
            ->join('companies as co', 'events.company_id', '=', 'co.id')
            ->where('co.is_approved', 1)
            ->where('co.is_active', 1)
            ->where('events.is_active', 1)
            ->where('events.is_approved', 1);

        // Search Query
        if ($request->has('q')) {
            $search = $request->q;
            $eventQuery->whereHas('seo', function ($seoQuery) use ($search) {
                $seoQuery->whereJsonContains('meta_keywords', $search);
            });
        }
        if (!empty($countryFilter)) {
            $eventQuery->whereHas('user', function ($query) use ($countryFilter) {
                $query->whereHas('company', function ($innerQuery) use ($countryFilter) {
                    $innerQuery->whereHas('address', function ($innerInnerQuery) use ($countryFilter) {
                        $innerInnerQuery->where('country_id', $countryFilter);
                    });
                });
            });
        }
        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $eventQuery->where('events.category_id', $cat_id->id);
        }
        $events = $eventQuery->paginate(12);
        $categories = Category::where('type', 'event')->where('is_active', 1)->get();
        $seo = Event::where('is_approved', 1)->where('is_active', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');
        $countries = Country::all();
        $data = compact('events', 'categories', 'seo', 'countries');
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
