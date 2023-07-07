<?php

namespace App\Http\Controllers;

use App\Models\ListingType;
use App\Models\RatingCategory;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class TypeController extends Controller
{
    // Function to view All listing Types
    public function viewTypes()
    {
        // Get All Listing Types
        $types = ListingType::all();
        $data = compact('types');
        return view('pages.admin.types.types')->with($data);
    }

    // Function to view Add listing Type
    public function viewAddType()
    {
        // Get All Listing Types
        $types = ListingType::all();
        $rating_categories = RatingCategory::all();
        $data = compact('types', 'rating_categories');
        return view('pages.admin.types.add_listing_type')->with($data);
    }

    // Function to view Edit listing Type
    public function viewEditType($id)
    {
        // Get All Listing Types
        $types = ListingType::all();
        $rating_categories = RatingCategory::all();
        $type = ListingType::find($id);
        $data = compact('types', 'rating_categories', 'type');
        return view('pages.admin.types.edit_listing_type')->with($data);
    }

    // Function to Add listing Type
    public function doAddType(Request $request)
    {
        $validated = $request->validate([
            'published' => 'nullable',
            'listing_type' => 'required',
            'name_singular' => 'required|string',
            'slug' => 'required',
            'icon' => 'nullable',
            'location' => 'nullable',
            'review' => 'nullable',
            'per_user_limit' => 'nullable|integer',
            'parent_type' => 'nullable',
            'rating_category' => 'nullable',
            'address_format' => 'required|string',
            'approve_new_listing' => 'nullable',
            'approve_updates' => 'nullable',
            'approve_reviews' => 'nullable',
            'approve_review_comments' => 'nullable',
            'approve_messages' => 'nullable',
            'approve_message_replies' => 'nullable',
        ]);

        $type = new ListingType();
        $type->published = $request->published ? 1 : 0;
//        $type->listing_type = $request->listing_type;

        $type->name_singular = $request->name_singular;
        // Get plural name if not provided
        if ($request->name_plural) {
            $type->name_plural = $request->name_plural;
        } else {
            $type->name_plural = $request->name_singular . 's';
        }
        $type->slug = $request->slug;
        $type->icon = $request->icon ? $request->icon : 'fa fa-list';
        $type->enable_locations = $request->location ? 1 : 0;
        $type->enable_reviews = $request->review ? 1 : 0;
        $type->per_user_limit = $request->per_user_limit ? $request->per_user_limit : 0;
        $type->parent_types = $request->parent_type ? $request->parent_type : 0;
        $type->rating_categories = $request->rating_category ? $request->rating_category : 0;
        $type->address_format = $request->address_format;
        $type->approve_new_listing = $request->approve_new_listing ? 1 : 0;
        $type->approve_edits = $request->approve_updates ? 1 : 0;
        $type->approve_reviews = $request->approve_reviews ? 1 : 0;
        $type->approve_review_comments = $request->approve_review_comments ? 1 : 0;
        $type->approve_messages = $request->approve_messages ? 1 : 0;
        $type->approve_message_replies = $request->approve_message_replies ? 1 : 0;
        try {
        $type->save();
        }catch (\Exception $e){
            return redirect()->route('listing.types')->with(['msg' => $e->getMessage(), 'types' => 'error']);
        }
        return redirect()->route('listing.types')->with(['msg' => 'Listing Type Added Successfully', 'types' => 'success']);
    }

    // Function to Edit listing Type
    public function doEditType(Request $request)
    {
        $validated = $request->validate([
            'published' => 'nullable',
            'name_singular' => 'required|string',
            'slug' => 'required',
            'icon' => 'nullable',
            'location' => 'nullable',
            'review' => 'nullable',
            'per_user_limit' => 'nullable|integer',
            'parent_type' => 'nullable',
            'rating_category' => 'nullable',
            'address_format' => 'required|string',
            'approve_new_listing' => 'nullable',
            'approve_updates' => 'nullable',
            'approve_reviews' => 'nullable',
            'approve_review_comments' => 'nullable',
            'approve_messages' => 'nullable',
            'approve_message_replies' => 'nullable',
        ]);

        $type = ListingType::find($request->id);
        $type->published = $request->published ? 1 : 0;
        $type->name_singular = $request->name_singular;
        // Get plural name if not provided
        if ($request->name_plural) {
            $type->name_plural = $request->name_plural;
        } else {
            $type->name_plural = $request->name_singular . 's';
        }
        $type->slug = $request->slug;
        $type->icon = $request->icon ? $request->icon : 'fa fa-list';
        $type->enable_reviews = $request->review ? 1 : 0;
        $type->per_user_limit = $request->per_user_limit ? $request->per_user_limit : 0;
        $type->parent_types = $request->parent_type ? $request->parent_type : 0;
        $type->rating_categories = $request->rating_category ? $request->rating_category : 0;
        $type->address_format = $request->address_format;
        $type->approve_new_listing = $request->approve_new_listing ? 1 : 0;
        $type->approve_edits = $request->approve_updates ? 1 : 0;
        $type->approve_reviews = $request->approve_reviews ? 1 : 0;
        $type->approve_review_comments = $request->approve_review_comments ? 1 : 0;
        $type->approve_messages = $request->approve_messages ? 1 : 0;
        $type->approve_message_replies = $request->approve_message_replies ? 1 : 0;

        try {
            $type->save();
        }catch (\Exception $e){
            return redirect()->route('listing.types')->with(['msg' => $e->getMessage(), 'types' => 'error']);
        }

        return redirect()->route('listing.types')->with('success', 'Listing Type Updated Successfully')->with('types', 'success');
    }

    // Function to Delete listing Type
    public function doDeleteType($id)
    {
        $type = ListingType::find($id);
        if (!$type) {
            return redirect()->route('listing.types')->with('error', 'Listing Type Not Found')->with('types', 'danger');
        }
        $type->delete();
        return redirect()->route('listing.types')->with(['msg' => 'Listing Type Deleted Successfully', 'types' => 'success']);
    }
}
