<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Events;
use App\Models\Location;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Function to view All Events
    public function viewEvents()
    {
        $events = Events::all();
        foreach ($events as $event) {
            // get category name from category id
            $event->category = $event->category->name;
        }
        $data = compact('events');
        return view('pages.admin.events.view_all')->with($data);
    }

    public function initCrudView(): array
    {
        // get all the users
        $users = User::all();
        // get all the categories
        $categories = Category::where('type', 'event')->get();
        // get all the Countries from location table
        $countries = Location::where('parent_id', 0)->orWhere('parent_id', null)->get();

        return compact('users', 'categories', 'countries');
    }

    // Function to view Add Event
    public function viewAddEvent(Request $request)
    {
        $data = $this->initCrudView(); // get all the users, categories, countries and states
        return view('pages.admin.events.add')->with($data);
    }

    // Function to view Edit Event
    public function viewEditEvent($id)
    {
        $event = Events::find($id);

        if (!$event) {
            return redirect()->route('events')->with(['msg', 'Event not found', 'types' => 'error']);
        }
        $users = User::all();
        // get all the categories
        $categories = Category::where('type', 'event')->get();
        // get all the Countries from location table
        $countries = Location::where('parent_id', 0)->orWhere('parent_id', null)->get();
        $seo = Seo::find($event->seo_id);
        $all = compact('event', 'id', 'users', 'categories', 'countries', 'seo');
        return view('pages.admin.events.edit')->with($all);
    }

    // Function to do Add Event
    public function doAddEvent(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'user' => 'required',
            'start' => 'required',
            'end' => 'required',
            'website' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'thumbnail' => 'required',
            'gallery' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $event = new Events();
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->description = $request->description;
        $event->website = $request->website;
        $event->category_id = $request->category;
        $event->user_id = $request->user;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->address = $request->address;
        $event->city_id = $request->city;
        $event->state_id = $request->state;
        $event->country_id = $request->country;
        $event->zip_code = $request->zip_code;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;

        // Boolean values
        $event->is_active = $request->is_active ? 1 : 0;
        $event->is_featured = $request->is_featured ? 1 : 0;
        $event->is_rsvp = $request->is_rsvp ? 1 : 0;
        $event->is_claimed = $request->is_claimed ? 1 : 0;

        // storing media
        $media_logo_id = MediaController::uploadMedia($request->thumbnail);
        $event->thumbnail_id = $media_logo_id;

        $gallery = [];
        foreach ($request->gallery as $image) {
            $gallery[] = MediaController::uploadMedia($image);
        }

        $event->gallery = json_encode($gallery);

        // Set SEO
        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->save();

        $event->seo_id = $seo->id;

        $event->save();
        return redirect()->route('events')->with(['msg', 'Event added successfully', 'types' => 'success']);
    }

    // Function to do Edit Event
    public function doEditEvent(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'user' => 'required',
            'start' => 'required',
            'end' => 'required',
            'website' => 'nullable',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'thumbnail' => 'required',
            'gallery' => 'required',
            'meta_title' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',
        ]);

        $event = Events::find($id);
        $event->title = $request->title;
        $event->slug = $request->slug;
        $event->description = $request->description;
        $event->website = $request->website;
        $event->category_id = $request->category;
        $event->user_id = $request->user;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->address = $request->address;
        $event->city_id = $request->city;
        $event->state_id = $request->state;
        $event->country_id = $request->country;
        $event->zip_code = $request->zip_code;
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;

        // Boolean values
        $event->is_active = $request->is_active ? 1 : 0;
        $event->is_featured = $request->is_featured ? 1 : 0;
        $event->is_rsvp = $request->is_rsvp ? 1 : 0;
        $event->is_claimed = $request->is_claimed ? 1 : 0;

        // storing media
        $media_logo_id = MediaController::uploadMedia($request->thumbnail);
        $event->thumbnail_id = $media_logo_id;

        $gallery = [];
        if ($request->has('old_gallery')) {
            foreach ($request->old_gallery as $image) {
                $gallery[] = MediaController::uploadMedia($image);
            }
        }

        $event->gallery = json_encode($gallery);

        // Set SEO
        $seo = null;
        if ($request->has('old_seo_id')) {
            $seo = Seo::find($request->old_seo_id);
            $seo->title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_keywords = $request->meta_keywords;
            $seo->save();
            $event->seo_id = $seo->id;
        } else {
            $seo = new Seo();
            $seo->title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_keywords = $request->meta_keywords;
            $seo->save();
            $event->seo_id = $seo->id;
        }
//        return $event;
        $event->save();
        return redirect()->route('events')->with(['msg', 'Event added successfully', 'types' => 'success']);
    }
    // Function to do Delete Event
    public function doDeleteEvent($id)
    {
        $event = Events::find($id);
        if (!$event) {
            return redirect()->route('events')->with(['msg', 'Event not found', 'types' => 'error']);
        }
        $event->delete();
        return redirect()->route('events')->with(['msg', 'Event deleted successfully', 'types' => 'success']);
    }
}
