<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use Illuminate\Support\Facades\Session;

class UserDealController extends Controller
{
    // Function to view Deal List
    public function viewDealList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'deal');
        $categories = Category::where('is_active', 1)->where('type', 'deal')->get();
        $deals = Deal::where('is_active', 1)->paginate(12);
        $data = compact('categories', 'deals');
        return view('pages.deals.list')->with($data);
    }

    // Function to view Deal Details
    public function viewDealDetails()
    {
        // Forgot session
        Session::forget('menu');
        return view('pages.deals.detail');
    }
}
