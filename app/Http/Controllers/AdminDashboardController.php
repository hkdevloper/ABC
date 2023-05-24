<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    // Function to view Admin Dashboard
    public function adminDashboard()
    {
        return view('pages.admin.dashboard');
    }
}
