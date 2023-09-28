<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    //  Function to view Product List
    public function viewProductList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'product');
        return view('pages.user.product.list');
    }

    // Function to view Product Details
    public function viewProductDetails()
    {
        return view('pages.user.product.detail');
    }
}
