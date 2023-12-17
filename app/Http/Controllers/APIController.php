<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Event;
use App\Models\Product;
use App\Models\RateReview;
use Exception;
use Illuminate\Http\Request;

class APIController extends Controller
{
    // search api for Company and Products
    public function searchCompanyProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $search = $request->search;
        $products = Product::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $companies = Company::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($products as $item) {
            $searchList[] = [$item->name, $item->slug, 'product'];

        }
        foreach ($companies as $item) {
            $searchList[] = [$item->name, $item->slug, 'company'];
        }
        return response()->json(['data' => $searchList]);
    }

    public function productRate($type, Request $request)
    {
        try {
            $request->validate([
                'item_id' => 'required',
                'rating' => 'required',
                'review' => 'required|string',
                'user_id' => 'required'
            ]);

            $item_id = $request->item_id;
            $rating = $request->rating;
            $reviewText = $request->review; // Use a distinct variable name
            $user_id = $request->user_id;
            if ($rating > 5 || $rating < 1) {
                return response()->json(['message' => 'Rating must be between 1 to 5'], 400);
            }

            if (strlen($reviewText) > 500) {
                return response()->json(['message' => 'Review must be less than 500 characters'], 400);
            }

            // Check the item type
            if ($type == 'product') {
                $item = Product::find($item_id);
            } elseif ($type == 'company') {
                $item = Company::find($item_id);
            } elseif ($type == 'event') {
                $item = Event::find($item_id);
            } else {
                return response()->json(['message' => 'Invalid item type'], 400);
            }

            // Check if the item exists
            if (!$item) {
                return response()->json(['message' => ucfirst($type) . ' not found'], 404);
            }

            // Create a new RateReview instance
            $review = new RateReview();
            $review->user_id = $user_id;
            $review->type = $type;
            $review->item_id = $item_id;
            $review->rating = $rating;
            $review->review = $reviewText; // Use a distinct variable name
            try {
                $review->saveOrFail();
            } catch (\Throwable $e) {
            }
        } catch (Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
        return response()->json(['message' => 'Review submitted successfully', 'status' => 'success']);
    }

}
