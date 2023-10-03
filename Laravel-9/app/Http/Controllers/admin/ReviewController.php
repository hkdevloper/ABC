<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Function to view All Reviews
    public function viewReviews()
    {
        return view('pages.admin.review.view_all');
    }
}
