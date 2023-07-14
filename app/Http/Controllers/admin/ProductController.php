<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Function to view the products
    public function viewproducts()
    {
        return view('pages.admin.products.view_all');
    }

    // Function to add the products
    public function viewAddProduct(Request $request)
    {
        $packageId = null;
        // check if request has Membership package
        if ($request->has('membership_package')) {
            $packageId = $request->membership_package;
        }
        $packages = MembershipPackage::where('type', 'product')->get();
        $membershipPackage = [];
        foreach ($packages as $package) {
            $member = [];
            $member['id'] = $package->id;
            $member['name'] = $package->name;
            $member['description'] = $package->description;
            $member['plans'] = [];
            foreach ($package->plans as $plan) {
                $member['plans'][] = [
                    'id' => $plan->id,
                    'price' => $plan->price,
                    'billing_period' => $plan->billing_period,
                    'billing_interval' => $plan->billing_interval,
                ];
            }
            $membershipPackage[] = $member;
        }
        $data = compact('packageId', 'membershipPackage');
        return view('pages.admin.products.add')->with($data);
    }

    // Function to view edit the products
    public function viewEditProduct()
    {
        return view('pages.admin.products.edit');
    }
}
