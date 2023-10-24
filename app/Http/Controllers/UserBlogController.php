<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Product;
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
        $blogs = Blog::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
        $data = compact('blogs', 'categories');
        return view('pages.blogs.list')->with($data);
    }

    //Function to view Blog Details
    public function viewBlogDetails()
    {
        return view('pages.blogs.detail');
    }
}
