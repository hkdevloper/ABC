<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class UserBlogController extends Controller
{
    // Function to View Blog List
    public function viewBlogList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'blog');
        return view('pages.blogs.list');
    }

    //Function to view Blog Details
    public function viewBlogDetails()
    {
        return view('pages.blogs.detail');
    }
}
