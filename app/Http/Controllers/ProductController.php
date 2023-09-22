<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    //  Function to view Product List
    public function viewProductList()
    {
        return view('pages.user.product.list');
    }

    // Function to view Product Details
    public function viewProductDetails()
    {
        return view('pages.user.product.detail');
    }
}
