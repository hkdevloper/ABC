<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DealController extends Controller
{
    // Function to view All Deals
    public function viewDeals()
    {
        return view('pages.admin.deals.view_all');
    }

    // Function to view Add Deal
    public function viewAddDeal()
    {
        return view('pages.admin.deals.add');
    }

    // Function to view Edit Deal
    public function viewEditDeal()
    {
        return view('pages.admin.deals.edit');
    }
}
