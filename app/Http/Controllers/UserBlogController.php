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
        // Initialize the query to retrieve deals
        $blogsQuery = Blog::select('blogs.*', 'seo.title as seo_title')
            ->join('seo', 'blogs.seo_id', '=', 'seo.id')
            ->join('companies as co', 'blogs.company_id', '=', 'co.id')
            ->where('co.is_approved', 1)
            ->where('co.is_active', 1)
            ->where('blogs.is_active', 1)
            ->where('blogs.is_approved', 1);

        if (!empty($categoryFilter)) {
            // Get Category I'd from Category Name
            $catId = Category::where('name', $categoryFilter)->first();
            $blogsQuery->where('category_id', $catId->id);
        }


        // Search Query
        if ($request->has('q')) {
            $search = $request->q;
            $blogsQuery->whereHas('seo', function ($seoQuery) use ($search) {
                $seoQuery->whereJsonContains('meta_keywords', $search);
            });
        }

        $blogs = $blogsQuery->paginate(12);
        $categories = Category::where('type', 'blog')->where('is_active', 1)->get();
        // Get Random Companies for SEO
        $seo = Blog::where('is_approved', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');
        $data = compact('blogs', 'categories', 'query', 'categoryFilter', 'seo');

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
