<?php

namespace App\Http\Controllers;

use App\classes\HelperFunctions;
use App\Models\Forum;
use App\Models\ForumReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserForumController extends Controller
{
    // Function to view Forum List
    public function viewForumList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'forum');
        $forums = [];
        $tab = null;
        // Filtered Tab
        if ($request->has('tab')) {
            // Most Answered
            if ($request->tab == 'most_answered') {
                $forums = Forum::where('is_approved', 1)->where('is_active', 1)->withCount('forumReplies')->orderBy('forum_replies_count', 'desc')->paginate(10);
                $tab = 'most_answered';
            }
            // Un-Answered
            if ($request->tab == 'un_answered') {
                $forums = Forum::where('is_approved', 1)->where('is_active', 1)->doesntHave('forumReplies')->paginate(10);
                $tab = 'un_answered';
            }
            // Featured
            if ($request->tab == 'featured') {
                $forums = Forum::where('is_approved', 1)->where('is_active', 1)->where('is_featured', 1)->paginate(10);
                $tab = 'featured';
            }
        } else {
            $forums = Forum::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        $data = compact('forums', 'tab');
        return view('pages.forum.list')->with($data);
    }

    // Function to view Forum Detail
    public function viewForumDetails($id, $title)
    {
        // Forgot session
        Session::forget('menu');
        $forum = Forum::findOrFail($id);
        if(!$forum){
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
            return redirect()->route('user/dashboard')->with('error', 'You must login to answer this forum');
        }
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
        } catch (\Throwable $e) {
        }
        return redirect()->back()->with('success', 'Forum answered successfully');
    }
}
