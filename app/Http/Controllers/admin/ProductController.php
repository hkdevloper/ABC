<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Function to view the products
    public function viewproducts()
    {
        return view('pages.admin.products.view_all');
    }

    // Function to add the products
    public function viewAddProduct()
    {
        return view('pages.admin.products.add');
    }

    // Function to view edit the products
    public function viewEditProduct()
    {
        return view('pages.admin.products.edit');
    }
}
