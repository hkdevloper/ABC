<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    // search api for Company and Products
    public function searchCompanyProduct(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $search = $request->search;
        $products = \App\Models\Product::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $companies = \App\Models\Company::where('name', 'LIKE', "%{$search}%")->where('is_approved', 1)->where('is_active', 1)->get();
        $searchList = [];
        foreach ($products as $item) {
            $searchList[] = [$item->name, $item->slug, 'product'];

        }
        foreach ($companies as $item) {
            $searchList[] = [$item->name, $item->slug, 'company'];
        }
        return response()->json(['data' => $searchList]);
    }
}
