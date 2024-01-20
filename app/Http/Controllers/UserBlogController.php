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

        $query = $request->input('q');
        $categoryFilter = $request->input('category');

        $blogsQuery = Blog::where('is_approved', 1)->where('is_active', 1);

        if (!empty($categoryFilter)) {
            // Get Category Id from Category Name
            $catId = Category::where('name', $categoryFilter)->first();
            $blogsQuery->where('category_id', $catId->id);
        }

        if (!empty($query)) {
            $blogsQuery->where(function ($innerQuery) use ($query) {
                $innerQuery->where('title', 'like', '%' . $query . '%')
                    ->orWhere('content', 'like', '%' . $query . '%');
            });
        }

        $blogs = $blogsQuery->paginate(12);
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
        $data = compact('blogs', 'categories', 'query', 'categoryFilter');

        return view('pages.blogs.list')->with($data);
    }


    //Function to view Blog Details
    public function viewBlogDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $blog = Blog::where('slug', $slug)->where('is_approved', 1)->where('is_active', 1)->firstOrFail();
        $related_blogs = Blog::where('category_id', $blog->category_id)->where('is_approved', 1)->where('is_active', 1)->where('id', '!=', $blog->id)->get();
        $data = compact('blog', 'related_blogs');
        return view('pages.blogs.detail')->with($data);
    }
}
