<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipPackage;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // Function to view All Jobs
    public function viewJobs()
    {
        return view('pages.admin.jobs.view_all');
    }

    // Function to view Add Job
    public function viewAddJob(Request $request)
    {
        $packageId = null;
        // check if request has Membership package
        if ($request->has('membership_package')) {
            $packageId = $request->membership_package;
        }
        $packages = MembershipPackage::where('type', 'job')->get();
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
        return view('pages.admin.jobs.add')->with($data);
    }

    // Function to view Edit Job
    public function viewEditJob()
    {
        return view('pages.admin.jobs.edit');
    }
}
