<?php

namespace App\Http\Controllers;

use App\Models\Forum;
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
        $forums = Forum::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        return view('pages.forum.list');
    }

    // Function to view Forum Detail
    public function viewForumDetails()
    {
        return view('pages.forum.detail');
    }
}
