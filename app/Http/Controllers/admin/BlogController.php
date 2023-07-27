<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Function to view All blogs
    public function viewBlogs()
    {
        $blogs = Blogs::all();

        // replace blog user id with user name
        foreach ($blogs as $key => $blog) {
            $user = User::find($blog->user_id);
            $blog->user_id = $user->first_name . ' ' . $user->last_name;
        }
        $data = compact('blogs');
        return view('pages.admin.blog.view_all')->with($data);
    }

    // Function to view Add blog
    public function viewAddBlog(Request $request)
    {
        $users = User::all();
        $categories = Category::all();

        $data = compact('users', 'categories');
        return view('pages.admin.blog.add')->with($data);
    }

    // Function to do Add blog
    public function doAddBlog(Request $request)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'title' => 'required|string',
            'slug' => 'required|string',
            'media' => 'required',
            'contents' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $blog = new Blogs();
        $blog->user_id = $request->user;
        $blog->title = $request->title;
        $blog->slug = $request->slug;

        // upload media
        // storing seo
        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;

        $seo->save();
        $blog->seo_id = $seo->id;

        // storing media
        $media_logo_id = MediaController::uploadMedia($request->media);
        $blog->thumbnail_id = $media_logo_id;

        $blog->is_active = $request->is_active ? 1 : 0;
        $blog->is_claimed = $request->is_claimed ? 1 : 0;
        $blog->is_featured = $request->is_featured ? 1 : 0;
        $blog->content = $request->contents;
        $blog->save();

        return redirect()->route('blogs')->with(['msg', 'Blog added successfully', 'types', 'success']);
    }

    // Function to view Edit blog
    public function viewEditBlog($id)
    {
        $blog = Blogs::find($id);
        $users = User::all();
        $categories = Category::all();
        $seo = Seo::find($blog->seo_id);
        $data = compact('blog', 'users', 'categories', 'seo');
        return view('pages.admin.blog.edit')->with($data);
    }

    // Function to do Edit blog
    public function doEditBlog(Request $request, $id)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'title' => 'required|string',
            'slug' => 'required|string',
            'media' => 'required',
            'contents' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $blog = Blogs::find($id);
        $blog->user_id = $request->user;
        $blog->title = $request->title;
        $blog->slug = $request->slug;

        // upload media
        // storing seo
        $seo = Seo::find($blog->seo_id);
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;

        $seo->save();
        $blog->seo_id = $seo->id;

        // storing media
        if ($request->media != $blog->thumbnail_id) {
            $media_logo_id = MediaController::uploadMedia($request->media);
            $blog->thumbnail_id = $media_logo_id;
        }

        $blog->is_active = $request->is_active ? 1 : 0;
        $blog->is_claimed = $request->is_claimed ? 1 : 0;
        $blog->is_featured = $request->is_featured ? 1 : 0;
        $blog->content = $request->contents;
        $blog->save();

        return redirect()->route('blogs')->with(['msg' => 'Blog updated Successfully', 'types' => 'success']);
    }

    // Function to do Delete blog
    public function doDeleteBlog($id)
    {
        $blog = Blogs::find($id);
        $blog->delete();
        return redirect()->route('blogs')->with(['msg', 'Blog deleted successfully', 'types', 'success']);
    }
}
