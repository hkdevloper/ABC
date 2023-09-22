<?php

namespace App\Http\Controllers;
class BlogController extends Controller
{
    // Function to View Blog List
    public function viewBlogList()
    {
        return view('pages.user.blogs.list');
    }

    //Function to view Blog Details
    public function viewBlogDetails()
    {
        return view('pages.user.blogs.detail');
    }
}
