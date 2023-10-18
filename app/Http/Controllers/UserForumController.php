<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class UserForumController extends Controller
{
    // Function to view Forum List
    public function viewForumList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'forum');
        return view('pages.forum.list');
    }

    // Function to view Forum Detail
    public function viewForumDetails()
    {
        return view('pages.forum.detail');
    }
}
