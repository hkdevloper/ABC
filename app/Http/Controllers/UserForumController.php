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
            if ($request->has('country')) {
                $country = $request->country;
                $forumQuery->whereHas('company', function ($query) use ($country) {
                    $query->whereHas('address', function ($innerQuery) use ($country) {
                        $innerQuery->where('country_id', $country);
                    });
                });
            }
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
            'id' => 'required',
            'action' => 'nullable'
        ]);
        Forum::findOrFail($request->id);
        // Store Forum ID in Session
        Session::put('forum_id', $request->id);
        if ($request->action == 'edit') {
            return redirect('/user/forum-replies/edit');
        } else {
            return redirect('/user/forum-replies');
        }
    }
}
