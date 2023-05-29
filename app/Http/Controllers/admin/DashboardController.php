<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Function to view Admin Dashboard
    public function adminDashboard()
    {
        return view('pages.admin.dashboard');
    }
}
