<?php

namespace App\Http\Controllers;

class UserForumController extends Controller
{
    // Function to view Forum List
    public function viewForumList()
    {
        return view('pages.user.forum.list');
    }

    // Function to view Forum Detail
    public function viewForumDetails()
    {
        return view('pages.user.forum.detail');
    }
}
