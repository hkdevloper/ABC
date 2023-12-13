<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserBlogController extends Controller
{
    // Function to View Blog List
    public function viewBlogList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'blog');
        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $blogs = Blog::where('is_approved', 1)->where('category_id', $cat_id->id)->paginate(10);
        }
        // Show All Companies
        else if($request->has('show') && $request->show == 'all'){
            $blogs = Blog::where('is_approved', 1)->paginate(100);
        }
        // Show Active Companies
        else if($request->has('filter') && $request->filter == 'active'){
            $blogs = Blog::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        // Show the Latest Companies
        else if ($request->has('filter') && $request->filter == 'in-active') {
            $blogs = Blog::where('is_approved', 1)->where('is_active', 0)->paginate(10);
        }
        // Sort by name
        else if ($request->has('sort') && $request->sort == 'name') {
            $blogs = Blog::where('is_approved', 1)->orderBy('name', 'asc')->paginate(10);
        }
        // Sort by Date
        else if ($request->has('sort') && $request->sort == 'date') {
            $blogs = Blog::where('is_approved', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        else {
            $blogs = Blog::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
        $data = compact('blogs', 'categories');
        return view('pages.blogs.list')->with($data);
    }

    //Function to view Blog Details
    public function viewBlogDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $blog = Blog::where('slug', $slug)->where('is_approved', 1)->where('is_active', 1)->first();
        $related_blogs = Blog::where('category_id', $blog->category_id)->where('is_approved', 1)->where('is_active', 1)->where('id', '!=', $blog->id)->get();
        $data = compact('blog', 'related_blogs');
        return view('pages.blogs.detail')->with($data);
    }
}
