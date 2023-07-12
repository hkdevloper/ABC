<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
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
        $data = compact('type');
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
    public function viewEditMembership()
    {
        return view('pages.admin.membership.edit');
    }

    // Function to view All Memberships Pricing plans
    public function viewMembershipPlans()
    {
        return view('pages.admin.membership.pricing.view_all');
    }

    // Function to view Add Membership Pricing plans
    public function viewAddMembershipPlan(Request $request)
    {
        $request->validate([
            'parent_id' => 'required|exists:membership_packages,id'
        ]);
        $paymentMethods = PaymentGateway::all();
        $data = compact('paymentMethods');
        return view('pages.admin.membership.pricing.add')->with($data);
    }

    // Function to view Edit Membership Pricing plans
    public function viewEditMembershipPlan()
    {
        return view('pages.admin.membership.pricing.edit');
    }

    // Function to do Add Membership
    public function doAddMembership(Request $request)
    {
        $validatedType = ['company', 'product', 'deal', 'job', 'blog', 'event'];
        $type = $request->type;
        if (!in_array($type, $validatedType)) {
            return redirect()->back()->with(['type' => 'error', 'msg' => 'Invalid Type']);
        }
        $data = compact('type');
        return view('pages.admin.membership.add')->with($data);
    }
}
