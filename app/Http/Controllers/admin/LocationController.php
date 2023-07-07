<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Media;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LocationController extends Controller
{
    // Function to View Locations
    public function viewLocations(Request $request)
    {
        // Get All Locations
        $locations = Location::all();

        if (isset($request->parent_id)) {
            // Find the parent location based on parent_id
            $parentLocation = Location::where('id', $request->parent_id)->first();

            // Get the children of the parent location
            $locations = $parentLocation->children;
        }

        // Add has_children property to each location
        foreach ($locations as $location) {
            $location->has_children = $location->children->isNotEmpty();
        }

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

    // Function to view Edit Location
    public function viewEditLocation($id)
    {
        // Get All Locations
        $location = Location::find($id);
        // Find Seo Data
        $seo = Seo::find($location->seo_id);
        // if seo data not found then create new one
        if (!$seo) {
            $seo = [
                "title" => "",
                "meta_keywords" => "",
                "meta_description" => "",
            ];
            $seo = (object)$seo;
        }
        // Find Medias
        $logo = Media::where($location->logo_image_id)->first()->path;
        $header = Media::where($location->header_image_id)->first()->path;

        $data = compact('location', 'seo', 'logo', 'header');
        return view('pages.admin.locations.edit')->with($data);
    }

    // Function to Update Location
    public function doEditLocation($id, Request $request){
        $validate = $request->validate([
            'location_name' => 'required',
            'slug' => 'required',
            'summary' => 'nullable',
            'description' => 'nullable',
            'placement' => 'nullable',
            'new_location' => 'nullable',
            'sub_location' => 'nullable',
            'before_location' => 'nullable',
            'after_location' => 'nullable',
            'longitude' => 'required',
            'latitude' => 'required',
            'zoom' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
            'logo_image_id' => 'nullable',
            'header_image_id' => 'nullable',
            'featured' => 'nullable',
        ]);

        // update location
        $location = Location::find($id);

        if(!$location){
            return redirect()->back()->with(['type' => 'error', 'message' => 'Location not found']);
        }

        // update seo record
        if($request->meta_title && $request->meta_keywords && $request->meta_description){
            $seo = Seo::find($request->seo_id);
            if(!$seo){
                $seo = new Seo();
            }
            $seo->title = $request->meta_title;
            $seo->meta_keywords = $request->meta_keywords;
            $seo->meta_description = $request->meta_description;
            $seo->save();
            $location->seo_id = $seo->id;
        }

        // update logo if logo id is present
        if($request->logo_image_id && $request->header_image_id){
            // update logo image
            $logo = Media::find($request->logo_image_id);
            $header = Media::find($request->header_image_id);

            if($logo && $header){
                // update header image
                $logo->path = $request->logo_image_id;
                $header->path = $request->header_image_id;
                $logo->save();
                $header->save();

                // update location
                $location->media_logo_id = $logo;
                $location->media_header_image_id = $header;
            }
        }

        $parent_id = $request->parent_id;
        if($request->placement){
            // get parent id
            if ($request->placement == 'rd-new') {
                $parent_id = 0;
            } elseif ($request->placement == 'rd-sub') {
                $parent_id = $request->new_location;
            } elseif ($request->placement == 'rd-before') {
                $parent_id = $request->before_location;
            } elseif ($request->placement == 'rd-after') {
                $parent_id = $request->after_location;
            }
        }

        $location->name = $request->location_name;
        $location->slug = $request->slug;
        $location->summary = $request->summary ? $request->summary : '';
        $location->parent_id = $parent_id;
        $location->description = $request->description ? $request->description : '';
        $location->longitude = $request->longitude ? $request->longitude : 90.123;
        $location->latitude = $request->latitude ? $request->latitude : 45.123;
        $location->map_zoom_level = $request->zoom ? $request->zoom : 2;
        $location->featured = $request->featured == 'true' ? 1 : 0;
        $location->save();

        return redirect()->back()->with(['msg', 'Location Updated Successfully', 'type' => 'success']);


    }

    // Function to view Add Multiple Locations
    public function viewAddMultipleLocations()
    {
        // Get All Locations
        return view('pages.admin.locations.add_multiple');
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
        if ($request->placement == 'rd-new') {
            $parent_id = 0;
        } elseif ($request->placement == 'rd-sub') {
            $parent_id = $request->new_location;
        } elseif ($request->placement == 'rd-before') {
            $parent_id = $request->before_location;
        } elseif ($request->placement == 'rd-after') {
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

        return redirect()->back()->with(['msg', 'Location Added Successfully', 'type' => 'success']);
    }

    // Function to do add multiple locations
    public function doAddMultipleLocations(Request $request)
    {
        $validate = $request->validate([
            'locations' => 'required',
            'featured' => 'nullable',
        ]);
        // Getting the featured value
        $featured = $request->featured == 'true' ? 1 : 0;
        $inputString = $request->locations;

        // Split the input string into individual records
        $locationRecords = explode("\n", $inputString);

        foreach ($locationRecords as $locationRecord) {
            // Split the location record into its hierarchy
            $locations = explode(';', $locationRecord);
            $parent = null;

            foreach ($locations as $location) {
                // Trim the location name and convert to lowercase
                $name = Str::lower(trim($location));

                // Find the location based on the name and parent ID
                $record = Location::whereRaw("LOWER(name) = ?", [$name])
                    ->where('parent_id', $parent ? $parent->id : null)
                    ->first();

                if (!$record) {
                    // Create a new location if it doesn't exist
                    $record = Location::create([
                        'name' => $location,
                        'slug' => Str::slug($location) . '-' . Str::random(5),
                        'parent_id' => $parent ? $parent->id : null,
                        'featured' => $featured,
                    ]);
                }


                // Set the parent to the current record for the next iteration
                $parent = $record;
            }
        }
        return redirect()->back()->with(['msg', 'Location Added Successfully', 'type' => 'success']);
    }

    // Function to Delete Location
    public function doDeleteLocation($id)
    {
        $location = Location::find($id);

        // Delete records from SEO table
        $seo = Seo::find($location->seo_id);
        $logo = Media::find($location->media_logo_id);
        $header = Media::find($location->media_header_image_id);
        if ($seo && $logo && $header) {
            $seo->delete();
            File::delete(public_path('/' . $logo->path));
            File::delete(public_path($header->path));
            $logo->delete();
            $header->delete();
        }

        $location->delete();
        return redirect()->back()->with(['msg', 'Location Deleted Successfully', 'type' => 'success']);
    }
}
