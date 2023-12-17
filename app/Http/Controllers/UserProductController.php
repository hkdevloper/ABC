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
        // Show All Companies
        else if($request->has('show') && $request->show == 'all'){
            $products = Product::where('is_approved', 1)->paginate(100);
        }
        // Show Active Companies
        else if($request->has('filter') && $request->filter == 'active'){
            $products = Product::where('is_approved', 1)->where('is_active', 1)->paginate(10);
        }
        // Show the Latest Companies
        else if ($request->has('filter') && $request->filter == 'in-active') {
            $products = Product::where('is_approved', 1)->where('is_active', 0)->paginate(10);
        }
        // Sort by name
        else if ($request->has('sort') && $request->sort == 'name') {
            $products = Product::where('is_approved', 1)->orderBy('name', 'asc')->paginate(10);
        }
        // Sort by Date
        else if ($request->has('sort') && $request->sort == 'date') {
            $products = Product::where('is_approved', 1)->orderBy('created_at', 'desc')->paginate(10);
        }
        else {
            $products = Product::where('is_approved', 1)->where('is_active', 1)->paginate(10);
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
