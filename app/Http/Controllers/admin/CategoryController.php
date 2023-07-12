<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Function to view All Categories
    public function viewCategories()
    {
        return view('pages.admin.categories.view_all');
    }
}
