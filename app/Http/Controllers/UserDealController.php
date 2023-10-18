<?php

namespace App\Http\Controllers;

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
        return view('pages.deals.list');
    }

    // Function to view Deal Details
    public function viewDealDetails()
    {
        return view('pages.deals.detail');
    }
}
