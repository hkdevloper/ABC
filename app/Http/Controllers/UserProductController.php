<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserProductController extends Controller
{
    //  Function to view Product List
    public function viewProductList(Request $request)
    {
        // Forgot session
        Session::forget('menu');
        // Store Session for Home Menu Active
        Session::put('menu', 'product');
        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $products = Product::where('is_approved', 1)->where('category_id', $cat_id->id)->paginate(10);
        }
        // sort by Name
        else if ($request->has('sort') && $request->sort == 'name') {
            $products = Product::where('is_approved', 1)->orderBy('name', 'asc')->paginate(12);
        }
        // Sort by price low to high
        else if ($request->has('sort') && $request->sort == 'price-low-to-high') {
            $products = Product::where('is_approved', 1)->orderBy('price', 'asc')->paginate(12);
        }
        // Sort by price high to low
        else if ($request->has('sort') && $request->sort == 'price-high-to-low') {
            $products = Product::where('is_approved', 1)->orderBy('price', 'desc')->paginate(12);
        }
        else {
            $products = Product::where('is_approved', 1)->where('is_active', 1)->paginate(12);
        }
        $categories = Category::where('type', 'product')->where('is_active', 1)->get();
        $data = compact('products', 'categories');
        return view('pages.product.list')->with($data);
    }

    // Function to view Product Details
    public function viewProductDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $product = Product::where('slug', $slug)->firstOrFail();
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('is_approved', 1)->where('is_active', 1)->get();
        $data = compact('product', 'related_products');
        return view('pages.product.detail')->with($data);
    }
}
