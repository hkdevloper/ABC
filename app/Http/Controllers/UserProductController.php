<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $query = Product::where('is_approved', 1)->where('is_active', 1);
        $categories = Category::where('type', 'product')->where('is_active', 1)->get();
        if ($request->has('search')) {
            $search = $request->search;
            $products = DB::table('products as p')
                ->join('seo as s', 'p.seo_id', '=', 's.id')
                ->join('categories as c', 'p.category_id', '=', 'c.id')
                ->select('p.*', 'c.name as category_name', 's.meta_keywords')
                ->where('p.is_approved', 1)
                ->where('p.is_active', 1)
                ->where('s.meta_keywords', 'LIKE', '%' . $search . '%')
                ->paginate(10);
            // Get Related SEO Keywords
            $seo = [];
            foreach ($products as $product) {
                foreach (json_decode($product->meta_keywords) as $keyword) {
                    $seo[] = $keyword;
                }
            }

            // Get Up to 10 Related SEO Keywords
            $seo = array_unique($seo);
            $seo = array_slice($seo, 0, 6);
            $data = compact('products', 'seo', 'categories');
            return view('pages.product.search-list')->with($data);
        }

        if ($request->has('category')) {
            // Get Category I'd from Category Name
            $cat_id = Category::where('name', $request->category)->first();
            $query->where('category_id', $cat_id->id);
        }

        if ($request->has('sort')) {
            if ($request->sort == 'name') {
                $query->orderBy('name', 'asc');
            } elseif ($request->sort == 'price-low-to-high') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price-high-to-low') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->paginate(12);

        // Get Random Companies for SEO
        $seo = Product::where('is_approved', 1)->inRandomOrder()->limit(6)->get()->pluck('seo');
        $data = compact('products', 'categories', 'seo');
        return view('pages.product.list')->with($data);
    }

    // Function to view Product Details
    public function viewProductDetails($slug)
    {
        // Forgot session
        Session::forget('menu');

        $product = Product::where('slug', $slug)->firstOrFail();
        //  check if product has a company
        if ($product->company == null) {
            // Store Session for Home Menu Active
            Session::put('menu', 'product');
            return redirect()->back();
        }
        $related_products = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('is_approved', 1)->where('is_active', 1)->get();
        // Get only products which have a company
        $related_products = $related_products->filter(function ($value, $key) {
            return $value->company != null;
        });
        // get the 3-random records from the database if is less than 10 then it will return all
        if (count($related_products) > 3) {
            $related_products = $related_products->random(3);
        }
        $data = compact('product', 'related_products');
        return view('pages.product.detail')->with($data);
    }
}
