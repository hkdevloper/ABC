<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Seo;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Function to view All Categories
    public function viewCategories(Request $request)
    {
        $request->validate([
            'type' => 'required|in:product,job,deals,event,company',
        ]);
        $type = $request->type;
        if ($request->has('child')) {
            $categories = Category::find($request->child);
            $categories = $categories->children;
        } else {
            $categories = Category::where('type', $type)->where('parent_id', null)->get();
        }
        $data = compact('type', 'categories');
        return view('pages.admin.category.view_all')->with($data);
    }

    // Function to view Add SelectCategory
    public function viewAddCategory(Request $request)
    {
        $request->validate([
            'type' => 'required|in:product,job,deals,event,company',
        ]);
        $categories = Category::where('type', $request->type)->get();
        $type = $request->type;
        $data = compact('type', 'categories');
        return view('pages.admin.category.add')->with($data);
    }

    // Function to view Edit SelectCategory
    public function viewEditCategory(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|in:product,job,deals,event,company',
        ]);
        $type = $request->type;
        $category = Category::find($id);
        $categories = Category::where('type', $request->type)->get();
        if ($category->type != $type)
            return view('pages.admin.category.view_all')->with(['msg' => 'SelectCategory Not Found', 'types' => 'danger', 'type' => $request->type]);
        $seo = $category->seo;
        $data = compact('type', 'category', 'seo', 'categories');
        return view('pages.admin.category.edit')->with($data);
    }

    // Function to Do Add SelectCategory
    public function doAddCategory(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|in:product,job,deals,event,company',
                'category_name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'summary' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'icon' => 'nullable|string|max:255',
                'meta_title' => 'required|string|max:255',
                'meta_description' => 'required|string|max:255',
                'meta_keywords' => 'required|json',
            ]);


            $category = new Category();
            $category->type = $request->type;
            $category->name = $request->category_name;
            $category->slug = $request->slug;
            $category->summary = $request->summary;
            $category->description = $request->description;
            $category->icon = $request->icon;

            // Upload Media
            $media_id = MediaController::uploadMedia($request->media);
            $category->media_id = $media_id;

            // Create Seo
            $seo = new Seo();
            $seo->title = $request->meta_title;
            $seo->meta_description = $request->meta_description;
            $seo->meta_keywords = $request->meta_keywords;
            $seo->save();

            // Handle Parent SelectCategory
            if ($request->has('parent_id') && $request->parent_id != 0 && $request->parent_id != null && $request->parent_id != '') {
                $parent_category = Category::find($request->parent_id);
                if (!$parent_category)
                    return redirect()->back()->with(['msg' => 'Parent SelectCategory Not Found', 'types' => 'danger']);
                $category->parent_id = $parent_category->id;
            }
            $category->seo_id = $seo->id;
            $category->is_active = $request->is_active ? 1 : 0;
            $category->is_featured = $request->is_featured ? 1 : 0;
            $category->save();

            $categories = Category::where('type', $request->type)->get();
            $type = $request->type;
            $data = compact('type', 'categories');
            return redirect()->route('categories', ['type' => $request->type])->with(['msg' => 'SelectCategory Added Successfully', 'types' => 'success', $data]);
        } catch (Exception $e) {
            return redirect()->back()->with(['msg' => 'Something Went Wrong', 'types' => 'danger']);
        }
    }

    // Function to Do Edit SelectCategory
    public function doEditCategory(Request $request, $id)
    {
        $request->id = $id;
        $request->validate([
            'type' => 'required|in:product,job,deals,event,company',
            'category_name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'summary' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string|max:255',
            'meta_keywords' => 'required|json',
        ]);
        $type = $request->type;
        $category = Category::find($id);
        if ($category->type != $type)
            return view('pages.admin.category.view_all')->with(['msg' => 'SelectCategory Not Found', 'types' => 'danger', 'type' => $request->type]);
        $category->name = $request->category_name;
        $category->slug = $request->slug;
        $category->summary = $request->summary;
        $category->description = $request->description;
        $category->icon = $request->icon;

        // Upload Media
        $media = MediaController::uploadMedia($request->media);
        $category->media_id = $media;
        $seo = Seo::find($category->seo_id);
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;
        $seo->save();
        // Handle Parent SelectCategory
        if ($request->has('parent_id') && $request->parent_id != 0 && $request->parent_id != null && $request->parent_id != '') {
            $parent_category = Category::find($request->parent_id);
            if (!$parent_category)
                return redirect()->back()->with(['msg' => 'Parent SelectCategory Not Found', 'types' => 'danger']);
            $category->parent_id = $parent_category->id;
        }
        $category->seo_id = $seo->id;
        $category->is_active = $request->is_active == 'on' ? 1 : 0;
        $category->is_featured = $request->is_featured == 'on' ? 1 : 0;
        $category->save();
        $categories = Category::where('type', $request->type)->get();
        $type = $request->type;
        $data = compact('type', 'categories');
        return redirect()->route('categories', ['type' => $request->type])->with(['msg' => 'SelectCategory Updated Successfully', 'types' => 'success', $data]);
    }

    // Function to Delete SelectCategory
    public function doDeleteCategory(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category)
            return view('pages.admin.category.view_all')->with(['msg' => 'SelectCategory Not Found', 'types' => 'danger', 'type' => $request->type]);
        $category->delete();
        $type = $request->type;
        $categories = Category::where('type', $request->type)->get();
        $data = compact('type', 'categories');
        return redirect()->back()->with(['msg' => 'SelectCategory Deleted Successfully', 'types' => 'success', $data]);
    }
}
