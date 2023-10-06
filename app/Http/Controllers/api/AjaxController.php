<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Company;
use App\Models\Deals;
use App\Models\Events;
use App\Models\Jobs;
use App\Models\Location;
use App\Models\PaymentGateway;
use App\Models\Product;
use App\Models\TaxRates;
use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    // Function to get Country List
    public function getCountryList()
    {
        $countries = Location::all();
        return response()->json($countries);
    }

    // Function to get State List
    public function getStateList(Request $request)
    {
        $states = Location::where('parent_id', $request->country_id)->get();
        return response()->json($states);
    }

    // Function to get City List
    public function getCityList(Request $request)
    {
        $cities = Location::where('parent_id', $request->state_id)->get();
        return response()->json($cities);
    }

    // Function to handle checkbox for featured location
    public function locationFeatured(Request $request){
        $validate = $request->validate([
            'location_id' => 'required|integer',
            'featured' => 'required'
        ]);
        $featured = 0;
        if ($request->featured == 'checked'){
            $featured = 1;
        }
        $location = Location::find($request->location_id);
        $location->featured = $featured;
        $location->save();
        return response()->json(['status' => 'success']);
    }

    // Function to handle user status
    public function userStatus(Request $request){
        $validate = $request->validate([
            'user_id' => 'required|integer',
            'status' => 'required',
            'approve' => 'nullable',
            'email_verified' => 'nullable',
            'banned' => 'nullable'
        ]);

         $value = 0;
        if ($request->value == 'checked'){
            $value = 1;
        }
        $user = User::find($request->user_id);
        switch ($request->status) {
            case 'approve':
                $user->approved = $value;;
                break;
            case 'email_verified':
                $user->email_verified = $value;
                break;
            case 'banned':
                $user->banned = $value;
                break;
            default:
                $status = 0;
                break;
        }
        $user->save();
        return response()->json(['status' => 'success']);
    }

    // Function to handle payment gateway status
    public function paymentGatewayStatus(Request $request){
        $validate = $request->validate([
            'gateway_id' => 'required|integer',
            'status' => 'required'
        ]);
        $value = 0;
        if ($request->status == 'checked'){
            $value = 1;
        }
        $gateway = PaymentGateway::find($request->gateway_id);
        $gateway->is_active = $value;
        $gateway->save();
        return response()->json(['status' => 'success']);
    }

    // Function to update compound rate status
    public function taxRateCompound(Request $request){
        $validate = $request->validate([
            'tax_rate_id' => 'required|integer',
            'status' => 'required'
        ]);
        $value = 0;
        if ($request->status == 'checked'){
            $value = 1;
        }
        $taxRate = TaxRates::find($request->tax_rate_id);
        $taxRate->compound = $value;
        $taxRate->save();
        return response()->json(['status' => 'success']);
    }

    // Function to Get All
    public function getAll(Request $request){
        $request->validate([
            'table' => 'required'
        ]);
        $table = $request->table;
        switch ($table) {
            case 'company':
                $data = Company::all();
                $columns = ['id', 'name', 'email', 'phone', 'address', 'city', 'state', 'country', 'zip', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            case 'product':
                $data = Product::all();
                $columns = ['id', 'name', 'price', 'discount', 'discount_type', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            case 'event':
                $data = Events::all();
                $columns = ['id', 'name', 'price', 'discount', 'discount_type', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            case 'job':
                $data = Jobs::all();
                $columns = ['id', 'name', 'price', 'discount', 'discount_type', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            case 'blog':
                $data = Blogs::all();
                $columns = ['id', 'name', 'price', 'discount', 'discount_type', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            case 'deals':
                $data = Deals::all();
                $columns = ['id', 'name', 'price', 'discount', 'discount_type', 'featured', 'status', 'created_at'];
                return response()->json(compact('data', 'columns'));
                break;
            default:
                return response()->json(['status' => 'error', 'message' => 'Invalid Table Name']);
                break;
        }
    }
}
