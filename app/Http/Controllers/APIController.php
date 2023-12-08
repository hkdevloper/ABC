<?php

namespace App\Http\Controllers;

use App\Models\RateReview;
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
        $products = \App\Models\Product::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $companies = \App\Models\Company::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($products as $item) {
            $searchList[] = [$item->name, $item->slug, 'product'];

        }
        foreach ($companies as $item) {
            $searchList[] = [$item->name, $item->slug, 'company'];
        }
        return response()->json(['data' => $searchList]);
    }

    public function productRate($type, Request $request,)
    {
        $request->validate([
            'item_id' => 'required',
            'rating' => 'required',
            'review' => 'required|string',
            'user_id' => 'required',
        ]);
        $item_id = $request->item_id;
        $rating = $request->rating;
        $review = $request->review;
        $user_id = $request->user_id;
        if($type == 'product'){
            $product = \App\Models\Product::where('id', $item_id)->first();
            if(!$product){
                return response()->json(['message' => 'Product not found'], 404);
            }
        }else if ($type == 'company'){
            $company = \App\Models\Company::where('id', $item_id)->first();
            if(!$company){
                return response()->json(['message' => 'Company not found'], 404);
            }
        }else if ($type == 'event'){
            $event = \App\Models\Event::where('id', $item_id)->first();
            if(!$event){
                return response()->json(['message' => 'Event not found'], 404);
            }
        }
        $review = new RateReview();
        $review->user_id = $user_id;
        $review->type = $type;
        $review->item_id = $item_id;
        $review->rating = $rating;
        $review->review = $review;
        $review->save();
        return response()->json(['message' => 'Review submitted successfully']);
    }
}
