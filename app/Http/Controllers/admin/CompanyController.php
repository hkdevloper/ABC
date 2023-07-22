<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Company;
use App\Models\Location;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // Function to view All Companies
    public function viewCompanies(Request $request)
    {
        $companies = Company::all();
        $data = compact('companies');
        return view('pages.admin.company.view_all')->with($data);
    }

    // Function to view Add Company Form
    public function viewAddCompany(Request $request)
    {
        $data = $this->initCrudView();
        return view('pages.admin.company.add')->with($data);
    }

    // Function to do Add Company

    public function initCrudView(): array
    {
        // get all the users
        $users = User::all();
        // get all the categories
        $categories = Category::where('type', 'company')->get();
        // get all the Countries from location table
        $countries = Location::where('parent_id', 0)->get();

        return compact('users', 'categories', 'countries');
    }

    // Function to view Edit Company Form

    public function doAddCompany(Request $request)
    {
        $request->validate([
            'approved' => 'nullable',
            'claimed' => 'nullable',
            'user' => 'required:exists:users,id',
            'category' => 'required:exists:categories,id',
            'logo' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'extra' => 'nullable',
            'gallery' => 'required|array',
            'phone' => 'required:unique:companies,phone',
            'email' => 'required:unique:companies,email',
            'website' => 'nullable:unique:companies,website|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'address' => 'required|min:10',
            'country' => 'required|exists:location,id',
            'state' => 'required|exists:location,id',
            'city' => 'required|exists:location,id',
            'zip_code' => 'required|numeric',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'meta_title' => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable',
        ]);

        // storing company
        $company = new Company();
        $company->approved = $request->approved == 'on' ? 1 : 0;
        $company->claimed = $request->claimed == 'on' ? 1 : 0;
        $company->user_id = $request->user;
        $company->category_id = $request->category;
        $company->name = $request->name;
        $company->slug = $request->slug;
        $company->description = $request->description;
        $company->extra_things = $request->extra;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->linkdin = $request->linkedin;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->address = $request->address;
        $company->country_id = $request->country;
        $company->state_id = $request->state;
        $company->city_id = $request->city;
        $company->zip_code = $request->zip_code;
        $company->latitude = $request->latitude;
        $company->longitude = $request->longitude;
        $company->map_zoom_level = $request->map_zoom_level ? $request->map_zoom_level : 2;

        // storing seo
        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;

        $seo->save();
        $company->seo_id = $seo->id;

        // storing media
        $media_logo_id = MediaController::uploadMedia($request->logo);
        $company->media_logo_id = $media_logo_id;

        $gallery = [];
        foreach ($request->gallery as $image) {
            $gallery[] = MediaController::uploadMedia($image);
        }

        $company->gallery = json_encode($gallery);
        $company->save();

        // get all companies
        $companies = Company::all();
        $data = compact('companies');
        return redirect()->route('companies')->with(['msg' => 'Company Added Successfully', 'types' => 'success', $data]);
    }

    // Function to do Edit Company

    public function viewEditCompany($id)
    {
        $data = $this->initCrudView();
        $company = Company::find($id);
        $seo = Seo::find($company->seo_id);
        $data['company'] = $company;
        $data['seo'] = $seo;
        return view('pages.admin.company.edit')->with($data);
    }

    // Function to get basic details of company for insert and update

    public function doEditCompany(Request $request, $id)
    {
        $request->validate([
            'approved' => 'nullable',
            'claimed' => 'nullable',
            'user' => 'required:exists:users,id',
            'category' => 'required:exists:categories,id',
            'logo' => 'nullable',
            'old_logo' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'description' => 'nullable',
            'extra' => 'nullable',
            'gallery' => 'nullable|array',
            'old_gallery' => 'required|array',
            'phone' => 'required|unique:companies,phone,' . $id . '|numeric',
            'email' => 'required|unique:companies,email,' . $id . '|email',
            'website' => 'nullable|unique:companies,website,' . $id . '|url',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'address' => 'required|min:10',
            'country' => 'required|exists:location,id',
            'state' => 'required|exists:location,id',
            'city' => 'required|exists:location,id',
            'zip_code' => 'required|numeric',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'meta_title' => 'nullable|max:70',
            'meta_description' => 'nullable|max:160',
            'meta_keywords' => 'nullable',
        ]);

        // storing company
        $company = Company::find($id);
        $company->approved = $request->approved == 'on' ? 1 : 0;
        $company->claimed = $request->claimed == 'on' ? 1 : 0;
        $company->user_id = $request->user;
        $company->category_id = $request->category;
        $company->name = $request->name;
        $company->slug = $request->slug;
        $company->description = $request->description;
        $company->extra_things = $request->extra;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->website = $request->website;
        $company->facebook = $request->facebook;
        $company->twitter = $request->twitter;
        $company->linkdin = $request->linkedin;
        $company->instagram = $request->instagram;
        $company->youtube = $request->youtube;
        $company->address = $request->address;

        $seo = Seo::find($company->seo_id);
        if ($seo) {
            $seo->title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_keywords = $request->meta_keywords;
        } else {
            $seo = new Seo();
            $seo->title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_keywords = $request->meta_keywords;
        }
        $seo->save();
        $company->seo_id = $seo->id;


        // storing media
        if ($request->old_logo) {
            $company->media_logo_id = $request->old_logo;
        } else {
            $media_logo_id = MediaController::uploadMedia($request->logo);
            $company->media_logo_id = $media_logo_id;
        }
        // storing gallery
        $gallery = [];
        if ($request->old_gallery) {
            $gallery = $request->old_gallery;
        }
        foreach ($request->gallery as $image) {
            $gallery[] = MediaController::uploadMedia($image);
        }

        $company->gallery = json_encode($gallery);
        $company->save();

        // get all companies
        $companies = Company::all();
        $data = compact('companies');

        return redirect()->route('companies')->with(['msg' => 'Company Updated Successfully', 'types' => 'success', $data]);
    }
}
