<?php

namespace App\Http\Controllers;

class DealController extends Controller
{
    // Function to view Deal List
    public function viewDealList()
    {
        return view('pages.user.deals.list');
    }

    // Function to view Deal Details
    public function viewDealDetails()
    {
        return view('pages.user.deals.detail');
    }
}
