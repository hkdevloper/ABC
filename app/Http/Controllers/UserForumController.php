<?php

namespace App\Http\Controllers;

use App\classes\HelperFunctions;
use App\Models\Category;
use App\Models\Country;
use App\Models\Forum;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Throwable;

class UserForumController extends Controller
{
    // Function to view Forum List
    public function viewForumList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'forum');
        //$forums = Forum::where('is_approved', 1)->where('is_active', 1)->paginate(12);
        $query = $request->input('q');
        $categoryFilter = $request->input('category');
        $countryFilter = $request->input('country');

        $forumQuery = Forum::where('is_approved', 1)->where('is_active', 1);

        if (!empty($categoryFilter)) {
            // Get Category I'd from Category Name
            $catId = Category::where('name', $categoryFilter)->first();
            $forumQuery->where('category_id', $catId->id);
        }

        if (!empty($countryFilter)) {
            $forumQuery->whereHas('user', function ($query) use ($countryFilter) {
                $query->whereHas('company', function ($innerQuery) use ($countryFilter) {
                    $innerQuery->whereHas('address', function ($innerInnerQuery) use ($countryFilter) {
                        $innerInnerQuery->where('country_id', $countryFilter);
                    });
                });
            });
        }

        if (!empty($query)) {
            $forumQuery->where(function ($innerQuery) use ($query) {
                $innerQuery->where('title', 'like', '%' . $query . '%');
            });
        }
        $forums = $forumQuery->paginate(12);
        $categories = Category::where('type', 'forum')->where('is_active', 1)->get();
        $countries = Country::all();
        $data = compact('forums', 'categories', 'countries');
        return view('pages.forum.list')->with($data);
    }

    // Function to view Forum Detail
    public function viewForumDetails($id, $title)
    {
        // Forgot session
        Session::forget('menu');
        $forum = Forum::findOrFail($id);
        if (!$forum) {
            return redirect()->back()->with('error', 'Forum not found');
        }

        // Update Stat Counter
        HelperFunctions::updateStat('view', 'forum', $forum->id);
        $viewCount = HelperFunctions::getStat('view', 'forum', $forum->id);
        $data = compact('forum', 'viewCount');
        return view('pages.forum.detail')->with($data);
    }

    public function answerForum(Request $request)
    {
        $request->validate([
            'body' => 'required',
            'forum_id' => 'required'
        ]);
        if (!auth()->user()) {
            return redirect()->route('auth.login')->with('error', 'You must login to answer this forum');
        }
        return $request->all();
        $forum = Forum::find($request->forum_id);
        if (!$forum) {
            return redirect()->back()->with('error', 'Forum not found');
        }

        $data = new ForumReply();
        $data->body = $request->body;
        $data->user_id = auth()->user()->id;
        $data->forum_id = $request->forum_id;
        try {
            $data->saveOrFail();
        } catch (Throwable $e) {
        }
        return redirect()->back()->with('success', 'Forum answered successfully');
    }
}
