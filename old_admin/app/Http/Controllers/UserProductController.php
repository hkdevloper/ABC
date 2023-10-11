<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class UserProductController extends Controller
{
    //  Function to view Product List
    public function viewProductList()
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'product');
        $data = Product::all();
        return view('pages.user.product.list')->with('data', $data);
    }

    // Function to view Product Details
    public function viewProductDetails()
    {
        return view('pages.user.product.detail');
    }

    // public function to view Add Product
    public function viewAddProduct(){
        
    }
}
