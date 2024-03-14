<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Company;
use App\Models\Deal;
use App\Models\Event;
use App\Models\Forum;
use App\Models\Job;
use App\Models\Product;
use App\Models\RateReview;
use App\Models\Seo;
use Exception;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class APIController extends Controller
{
    // search api for Company and Products
    public function searchCompanyProduct(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $searchList = [];
        $products = Product::where('is_approved', 1)->where('is_active', 1)->get();
        foreach ($products as $item) {
            $seo = $item->seo;
            foreach ($seo->meta_keywords as $keyword) {
                if (str_contains(strtolower($keyword), strtolower($search))) {
                    $searchList[] = $keyword;
                }
            }
        }
        // Unique the array
        $searchList = array_unique($searchList);

        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }

    // Company Search Function
    public function searchCompanies(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $companies = Company::where('is_approved', 1)->where('is_active', 1)->get();
        $matchedKeywords = [];

        foreach ($companies as $company) {
            $seo = $company->seo;
            if ($seo) {
                // Check if meta_keywords is valid JSON and not null
                if (is_array($seo->meta_keywords)) {
                    foreach ($seo->meta_keywords as $keyword) {
                        // Trim each keyword to remove any leading/trailing spaces
                        $keyword = trim($keyword);

                        // Case-insensitive search
                        if (str_contains(strtolower($keyword), strtolower($search))) {
                            // Add the matched keyword to the list
                            $matchedKeywords[] = $keyword;
                        }
                    }
                }
            }
        }

        // Remove duplicate keywords
        $searchList = array_unique($matchedKeywords);
        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }


    // Deals Search Function
    public function searchDeals(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $deals = Deal::where('is_active', 1)->get();
        $searchList = [];
        foreach ($deals as $item) {
            $seo = $item->seo;
            foreach ($seo->meta_keywords as $keyword) {
                if (str_contains(strtolower($keyword), strtolower($search))) {
                    $searchList[] = $keyword;
                }
            }
        }
        // Unique the array
        $searchList = array_unique($searchList);

        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }

    // Events Search Function
    public function searchEvents(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $events = Event::where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($events as $item) {
            $seo = $item->seo;
            foreach ($seo->meta_keywords as $keyword) {
                if (str_contains(strtolower($keyword), strtolower($search))) {
                    $searchList[] = $keyword;
                }
            }
        }
        // Unique the array
        $searchList = array_unique($searchList);

        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }

    // Jobs Search Function
    public function searchJobs(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $jobs = Job::where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($jobs as $item) {
            $seo = $item->seo;
            foreach ($seo->meta_keywords as $keyword) {
                if (str_contains(strtolower($keyword), strtolower($search))) {
                    $searchList[] = $keyword;
                }
            }
        }
        // Unique the array
        $searchList = array_unique($searchList);

        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }

    // Blogs Search Function
    public function searchBlogs(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $blogs = Blog::where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($blogs as $item) {
            $seo = $item->seo;
            foreach ($seo->meta_keywords as $keyword) {
                if (str_contains(strtolower($keyword), strtolower($search))) {
                    $searchList[] = $keyword;
                }
            }
        }
        // Unique the array
        $searchList = array_unique($searchList);

        $data = [];
        foreach ($searchList as $item) {
            $data[] = $item;
        }
        return $data;
    }

    // Forums Search Function
    public function searchForums(Request $request)
    {
        $search = $this->searchModuleValidation($request);
        $forums = Forum::where('is_approved', 1)->where('is_active', 1)->get();
        $forums->where('title', 'like', '%' . $search . '%');
        // return only titles of forums
        $data = [];
        foreach ($forums as $forum) {
            $data[] = $forum->title;
        }
        return $data;
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
            } elseif ($type == 'deal') {
                $item = Deal::find($item_id);
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

    /**
     * @param Request $request
     * @return string
     */
    private function searchModuleValidation(Request $request): string
    {
        $request->validate([
            'search' => 'required',
        ]);
        return $request->search;
    }
}
