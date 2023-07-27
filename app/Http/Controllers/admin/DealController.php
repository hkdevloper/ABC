<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Deals;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;

class DealController extends Controller
{
    // Function to view All Deals
    public function viewDeals()
    {
        $deals = Deals::all();
        $data = compact('deals');
        return view('pages.admin.deals.view_all')->with($data);
    }

    // Function to view Add Deal
    public function viewAddDeal(Request $request)
    {
        $users = User::all();
        $categories = Category::where('type', 'deals')->get();
        $data = compact('users', 'categories');
        return view('pages.admin.deals.add')->with($data);
    }

    // Function to Do Add Deal
    public function doAddDeal(Request $request)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required',
            'slug' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'price' => 'required',
            'type' => 'required',
            'discount' => 'required',
            'code' => 'required',
            'tos' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $deal = new Deals();
        $deal->user_id = $request->user;
        $deal->category_id = $request->category;
        $deal->title = $request->title;
        $deal->slug = $request->slug;
        $deal->description = $request->description;
        $deal->offer_start_date = $request->start;
        $deal->offer_end_date = $request->end;
        $deal->price = $request->price;
        $deal->discount_type = $request->type;
        $deal->discount_value = $request->discount;
        $deal->discount_code = $request->code;
        $deal->terms_and_conditions = $request->tos;

        // Boolean
        $deal->is_featured = $request->is_featured ? 1 : 0;
        $deal->is_active = $request->is_active ? 1 : 0;
        $deal->allow_redeeming = $request->allow_redeeming ? 1 : 0;

        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->save();
        $deal->seo_id = $seo->id;

        $deal->save();

        return redirect()->route('deals')->with(['msg', 'Deal Added Successfully', 'types' => 'success']);
    }

    // Function to view Edit Deal
    public function viewEditDeal($id)
    {
        $deal = Deals::find($id);
        $users = User::all();
        $categories = Category::where('type', 'deals')->get();
        $seo = Seo::find($deal->seo_id);
        $data = compact('deal', 'users', 'categories', 'seo');
        return view('pages.admin.deals.edit')->with($data);
    }

    // Function to Do Edit Deal
    public function doEditDeal(Request $request, $id)
    {
        $request->validate([
            'user' => 'required|integer|exists:users,id',
            'category' => 'required|integer|exists:categories,id',
            'title' => 'required',
            'slug' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'price' => 'required',
            'type' => 'required',
            'discount' => 'required',
            'code' => 'required',
            'tos' => 'required',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'meta_keywords' => 'required|string',
        ]);

        $deal = Deals::find($id);
        $deal->user_id = $request->user;
        $deal->category_id = $request->category;
        $deal->title = $request->title;
        $deal->slug = $request->slug;
        $deal->description = $request->description;
        $deal->offer_start_date = $request->start;
        $deal->offer_end_date = $request->end;
        $deal->price = $request->price;
        $deal->discount_type = $request->type;
        $deal->discount_value = $request->discount;
        $deal->discount_code = $request->code;
        $deal->terms_and_conditions = $request->tos;

        // Boolean
        $deal->is_featured = $request->is_featured ? 1 : 0;
        $deal->is_active = $request->is_active ? 1 : 0;
        $deal->allow_redeeming = $request->allow_redeeming ? 1 : 0;

        $seo = Seo::find($deal->seo_id);
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->save();
        $deal->seo_id = $seo->id;

        $deal->save();

        return redirect()->route('deals')->with(['msg', 'Deal Updated Successfully', 'types' => 'success']);
    }

    // Function to Delete Deal
    public function doDeleteDeal($id)
    {
        $deal = Deals::find($id);
        $deal->delete();
        return redirect()->route('deals')->with(['msg', 'Deal Deleted Successfully', 'types' => 'success']);
    }
}
