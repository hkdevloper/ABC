<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\api\UploadMediaController;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Media;
use App\Models\Seo;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Function to View Locations
    public function viewLocations()
    {
        // Get All Locations
        $locations = Location::all();
        $data = compact('locations');
        return view('pages.admin.locations.view_all')->with($data);
    }

    // Function to View Add Location
    public function viewAddLocation()
    {
        // Get All Locations
        $locations = Location::all();
        $data = compact('locations');
        return view('pages.admin.locations.add_single')->with($data);
    }

    // Function to Add Location
    public function doAddLocation(Request $request)
    {
        $validate = $request->validate([
            'location_name' => 'required',
            'slug' => 'required',
            'summary' => 'required',
            'description' => 'nullable',
            'placement' => 'required',
            'new_location' => 'nullable',
            'sub_location' => 'nullable',
            'before_location' => 'nullable',
            'after_location' => 'nullable',
            'longitude' => 'required',
            'latitude' => 'required',
            'zoom' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'logo_image_id' => 'required',
            'header_image_id' => 'required',
            'featured' => 'nullable',
        ]);

        // Insert new Seo record
        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->meta_description = $request->meta_description;
        $seo->save();

        $logo = MediaController::uploadMedia($request->logo_image_id);
        $header = MediaController::uploadMedia($request->header_image_id);

        // get parent id
        $parent_id = null;
        if ($request->placement == 'new_location') {
            $parent_id = 0;
        } elseif ($request->placement == 'sub_location') {
            $parent_id = $request->new_location;
        } elseif ($request->placement == 'before_location') {
            $parent_id = $request->before_location;
        } elseif ($request->placement == 'after_location') {
            $parent_id = $request->after_location;
        }

        $location = new Location();
        $location->name = $request->location_name;
        $location->slug = $request->slug;
        $location->summary = $request->summary;
        $location->parent_id = $parent_id;
        $location->description = $request->description;
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $location->map_zoom_level = $request->zoom;
        $location->seo_id = $seo->id;
        $location->media_logo_id = $logo;
        $location->media_header_image_id = $header;
        $location->featured = $request->featured == 'true' ? 1 : 0;
        $location->save();

        return redirect()->back()->with('success', 'Location Added Successfully');
    }
}
