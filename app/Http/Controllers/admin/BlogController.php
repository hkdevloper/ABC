<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Function to view All blogs
    public function viewBlogs()
    {
        return view('pages.admin.blog.view_all');
    }

    // Function to view Add blog
    public function viewAddBlog()
    {
        return view('pages.admin.blog.add');
    }

    // Function to view Edit blog
    public function viewEditBlog()
    {
        return view('pages.admin.blog.edit');
    }
}
