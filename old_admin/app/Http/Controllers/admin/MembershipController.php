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
        $type = $request->type;
        $data = compact('plans', 'package_id', 'type');
        return view('pages.admin.membership.pricing.view_all')->with($data);
    }

    // Function to view Add Membership Pricing plans
    public function viewAddMembershipPlan(Request $request)
    {
        $request->validate([
            'package_id' => 'required|exists:membership_packages,id'
        ]);
        $paymentMethods = PaymentGateway::all();
        $package_id = $request->package_id;
        $type = $request->type;
        $data = compact('paymentMethods', 'package_id', 'type');
        return view('pages.admin.membership.pricing.add')->with($data);
    }

    // Function to view Edit Membership Pricing plans
    public function viewEditMembershipPlan(Request $request, $id)
    {
        $request->validate([
            'package_id' => 'required|exists:membership_packages,id',
            'type' => 'required|in:company,product,deal,job,blog,event'
        ]);

        $paymentMethods = PaymentGateway::all();
        $plan = MembershipPackagePlan::find($id);
        $package_id = $request->package_id;
        $type = $request->type;
        $supportedTypes = json_decode($plan->supported_payment_gateways);
        $data = compact('paymentMethods', 'plan', 'package_id', 'type', 'supportedTypes');
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
        return redirect()->route('memberships', ['type' => $request->type])->with(['types' => 'success', 'msg' => 'Membership package Added Successfully']);
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
            'price' => 'required|numeric',
        ]);
        $plan = new MembershipPackagePlan();
        $plan->membership_package_id = $request->package_id;
        $plan->billing_period = $request->billing_period;
        $plan->billing_interval = $request->billing_interval;
        $plan->user_limit = $request->users_limit;
        $plan->per_users_limit = $request->per_users_limit;
        $plan->supported_payment_gateways = json_encode($request->supported_payment_gateways);
        $plan->price = $request->price;
        // boolean values
        $plan->used_for_claims = $request->claims ? 1 : 0;
        $plan->auto_approve_listing = $request->listings ? 1 : 0;
        $plan->user_cancellable = $request->cancellable ? 1 : 0;
        $plan->hidden = $request->hidden ? 1 : 0;
        $plan->save();
        return redirect()->route('membership.plans',["id"=>$request->package_id, "type"=>$request->type])->with(['types' => 'success', 'msg' => 'Membership package plan Added Successfully']);
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

    // Function to do Edit Membership Plan
    public function doEditMembershipPlan(Request $request, $id)
    {
        $request->validate([
            "billing_period" => "required|in:day,week,month,year",
            "billing_interval" => "required|numeric",
            "users_limit" => "required|numeric",
            "per_users_limit" => "required|numeric",
            "supported_payment_gateways" => "required",
            'price' => 'required|numeric',
        ]);
        $plan = MembershipPackagePlan::find($request->id);
        if (!$plan) {
            return redirect()->route('membership.plans',["id"=>$request->package_id, "type"=>$request->type])->with(['types' => 'error', 'msg' => 'Invalid Membership Package Plan']);
        }
        $plan->billing_period = $request->billing_period;
        $plan->billing_interval = $request->billing_interval;
        $plan->user_limit = $request->users_limit;
        $plan->per_users_limit = $request->per_users_limit;
        $plan->supported_payment_gateways = json_encode($request->supported_payment_gateways);
        $plan->price = $request->price;
        // boolean values
        $plan->used_for_claims = $request->claims ? 1 : 0;
        $plan->auto_approve_listing = $request->listings ? 1 : 0;
        $plan->user_cancellable = $request->cancellable ? 1 : 0;
        $plan->hidden = $request->hidden ? 1 : 0;
        $plan->save();
        return redirect()->route('membership.plans',["id"=>$request->package_id, "type"=>$request->type])->with(['types' => 'success', 'msg' => 'Membership package plan Updated Successfully']);
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

    // Function to do Delete Membership Plan
    public function doDeleteMembershipPlan($id)
    {
        $plan = MembershipPackagePlan::find($id);
        if (!$plan) {
            return redirect()->back()->with(['types' => 'error', 'msg' => 'Invalid Membership Package Plan']);
        }
        $plan->delete();
        return redirect()->back()->with(['types' => 'success', 'msg' => 'Membership package plan Deleted Successfully']);
    }

}
