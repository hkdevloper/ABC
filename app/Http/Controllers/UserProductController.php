<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
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
        $products = Product::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        $categories = Category::where('type', 'product')->where('is_active', 1)->get();
        $data = compact('products', 'categories');
        return view('pages.product.list')->with($data);
    }

    // Function to view Product Details
    public function viewProductDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $product = Product::where('slug', $slug)->first();
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('is_approved', 1)->where('is_active', 1)->get();
        $data = compact('product', 'related_products');
        return view('pages.product.detail')->with($data);
    }
}
