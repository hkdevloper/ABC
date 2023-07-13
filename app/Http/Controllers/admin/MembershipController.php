<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackage;
use App\Models\MembershipPackagePlan;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    // Function to view All Memberships Plans
    public function viewMemberships(Request $request)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        $type = $request->type;
        if (!in_array($type, $validatedType)) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Type']);
        }
        $memberships = MembershipPackage::where('type', $type)->get();
        $data = compact('type', 'memberships');
        return view('pages.admin.membership.view_all')->with($data);
    }

    // Function to view Add Membership
    public function viewAddMembership(Request $request)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        $type = $request->type;
        if (!in_array($type, $validatedType)) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Type']);
        }
        $data = compact('type');
        return view('pages.admin.membership.add')->with($data);
    }

    // Function to view Edit Membership
    public function viewEditMembership(Request $request, $id)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        $type = $request->type;
        if (!in_array($type, $validatedType)) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Type']);
        }
        $package = MembershipPackage::find($id);
        if (!$package) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Membership Package']);
        }
        $data = compact('package', 'type');
        return view('pages.admin.membership.edit')->with($data);
    }

    // Function to view All Memberships Pricing plans
    public function viewMembershipPlans(Request $request)
    {
        $request->validate([
            'type' => 'required|in:company,product,deal,job,blog,event',
            'id' => 'required|numeric'
        ]);
        $plans = MembershipPackagePlan::where('membership_package_id', $request->id)->get();
        $package_id = $request->id;
        $data = compact('plans', 'package_id');
        return view('pages.admin.membership.pricing.view_all')->with($data);
    }

    // Function to view Add Membership Pricing plans
    public function viewAddMembershipPlan(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:membership_packages,id'
        ]);
        $paymentMethods = PaymentGateway::all();
        $data = compact('paymentMethods');
        return view('pages.admin.membership.pricing.add')->with($data);
    }

    // Function to view Edit Membership Pricing plans
    public function viewEditMembershipPlan(Request $request, $id)
    {

        $paymentMethods = PaymentGateway::all();
        $data = compact('paymentMethods');
        return view('pages.admin.membership.pricing.edit')->with($data);
    }

    // Function to do Add Membership
    public function doAddMembership(Request $request)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        /*
          "type": "company",
          "name": null,
          "description": null,
          "listing_position": null,
          "extra_categories_limit": null,
          "title_size_limit": null,
          "short_description_size_limit": null,
          "description_size_limit": null,
          "gallery_photos_limit": null,

         * CheckBox Properties
          "hidden": "true",
          "featured": "true",
          "featured_listing": "true",
          "show_address": "true",
          "show_map": "true",
          "allow_message": "true",
          "enable_review": "true",
          "enable_seo": "true",
          "require_backlink": "true"
         */
        $request->validate([
            'type' => 'required|in:' . implode(',', $validatedType),
            'name' => 'required|string',
            'description' => 'required|string',
            'listing_position' => 'required|numeric',
            'extra_categories_limit' => 'required|numeric',
            'title_size_limit' => 'required|numeric',
            'short_description_size_limit' => 'required|numeric',
            'description_size_limit' => 'required|numeric',
            'gallery_photos_limit' => 'required|numeric',
        ]);

        $membership = new MembershipPackage();
        $membership->type = $request->type;
        $membership->name = $request->name;
        $membership->description = $request->description;
        $membership->listing_position = $request->listing_position;
        $membership->extra_category_limit = $request->extra_categories_limit;
        $membership->title_size_limit = $request->title_size_limit;
        $membership->short_description_limit = $request->short_description_size_limit;
        $membership->description_size_limit = $request->description_size_limit;
        $membership->gallery_photos_limit = $request->gallery_photos_limit;
        $membership->hidden = $request->hidden ? 1 : 0;
        $membership->featured = $request->featured ? 1 : 0;
        $membership->featured_listings = $request->featured_listing ? 1 : 0;
        $membership->show_address = $request->show_address ? 1 : 0;
        $membership->show_map = $request->show_map ? 1 : 0;
        $membership->allow_messages = $request->allow_message ? 1 : 0;
        $membership->enable_review = $request->enable_review ? 1 : 0;
        $membership->enable_seo = $request->enable_seo ? 1 : 0;
        $membership->require_backlink = $request->require_backlink ? 1 : 0;
        $membership->save();
        return redirect()->back()->with(['types' => 'success', 'msg' => 'Membership package Added Successfully']);
    }

    // Function to do Add Membership Package Plan
    public function doAddMembershipPlan(Request $request)
    {
        $request->validate([
            "billing_period" => "required|in:day,week,month,year",
            "billing_interval" => "required|numeric",
            "users_limit" => "required|numeric",
            "per_users_limit" => "required|numeric",
            "supported_payment_gateways" => "required",
        ]);
        return $request->all();
    }

    // Function to do Edit Membership
    public function doEditMembership(Request $request, $id)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        $request->validate([
            'type' => 'required|in:' . implode(',', $validatedType),
            'name' => 'required|string',
            'description' => 'required|string',
            'listing_position' => 'required|numeric',
            'extra_categories_limit' => 'required|numeric',
            'title_size_limit' => 'required|numeric',
            'short_description_size_limit' => 'required|numeric',
            'description_size_limit' => 'required|numeric',
            'gallery_photos_limit' => 'required|numeric',
        ]);

        $membership = MembershipPackage::find($request->id);
        if (!$membership) {
            return redirect()->route('memberships', ["type" => $request->type])->with(['types' => 'error', 'msg' => 'Invalid Membership Package']);
        }
        $membership->type = $request->type;
        $membership->name = $request->name;
        $membership->description = $request->description;
        $membership->listing_position = $request->listing_position;
        $membership->extra_category_limit = $request->extra_categories_limit;
        $membership->title_size_limit = $request->title_size_limit;
        $membership->short_description_limit = $request->short_description_size_limit;
        $membership->description_size_limit = $request->description_size_limit;
        $membership->gallery_photos_limit = $request->gallery_photos_limit;
        $membership->hidden = $request->hidden ? 1 : 0;
        $membership->featured = $request->featured ? 1 : 0;
        $membership->featured_listings = $request->featured_listing ? 1 : 0;
        $membership->show_address = $request->show_address ? 1 : 0;
        $membership->show_map = $request->show_map ? 1 : 0;
        $membership->allow_messages = $request->allow_message ? 1 : 0;
        $membership->enable_review = $request->enable_review ? 1 : 0;
        $membership->enable_seo = $request->enable_seo ? 1 : 0;
        $membership->require_backlink = $request->require_backlink ? 1 : 0;
        $membership->save();
        return redirect()->route('memberships', ["type" => $request->type])->with(['types' => 'success', 'msg' => 'Membership package Updated Successfully']);
    }

    // Function to do Delete Membership
    public function doDeleteMembership($id)
    {
        $membership = MembershipPackage::find($id);
        if (!$membership) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Membership Package']);
        }
        $membership->delete();
        return redirect()->back()->with(['types' => 'success', 'msg' => 'Membership package Deleted Successfully']);
    }

}
