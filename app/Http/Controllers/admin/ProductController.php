<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Location;
use App\Models\Media;
use App\Models\Product;
use App\Models\Seo;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Function to view the products
    public function viewproducts()
    {
        $products = Product::all();
        return view('pages.admin.products.view_all')->with(['products' => $products]);
    }

    // Function to add the products
    public function viewAddProduct(Request $request)
    {
        $data = $this->initCrudView(); // get all the users, categories, countries and states
        return view('pages.admin.products.add')->with($data);
    }

    public function initCrudView(): array
    {
        // get all the users
        $users = User::all();
        // get all the categories
        $categories = Category::where('type', 'product')->get();
        // get all the Countries from location table
        $countries = Location::where('parent_id', 0)->orWhere('parent_id', null)->get();

        return compact('users', 'categories', 'countries');
    }

    // Function to do Add the products
    public function doAddProduct(Request $request)
    {
        $request->validate(['name' => 'required', 'slug' => 'required', 'description' => 'required', 'price' => 'required', 'category' => 'required', 'user' => 'required', 'meta_title' => 'required', 'meta_description' => 'required', 'meta_keywords' => 'required',]);

        $product = new Product();
        $product->is_active = $request->is_approved == 'on' ? 1 : 0;
        $product->is_claimed = $request->is_claimed == 'on' ? 1 : 0;
        $product->is_featured = $request->is_featured == 'on' ? 1 : 0;
        $product->user_id = $request->user;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->condition = $request->condition;
        $product->brand = $request->brand;
        $product->price = $request->price;
        // storing seo
        $seo = new Seo();
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;

        $seo->save();
        $product->seo_id = $seo->id;

        // storing media
        $media_logo_id = MediaController::uploadMedia($request->media);
        $product->thumbnail_id = $media_logo_id;

        $gallery = [];
        foreach ($request->gallery as $image) {
            $gallery[] = MediaController::uploadMedia($image);
        }

        $product->gallery = json_encode($gallery);
        $product->save();

        return redirect()->route('products')->with(['msg' => 'Product Added Successfully', 'types' => 'success']);
    }

    // Function to view edit the products
    public function viewEditProduct($id)
    {
        $product = Product::find($id);
        $data = $this->initCrudView();
        $seo = Seo::find($product->seo_id);
        $data['seo'] = $seo;
        $data['product'] = $product;
        return view('pages.admin.products.edit')->with($data);
    }

    // Function to do edit the products
    public function doEditProduct(Request $request, $id)
    {
        $request->validate(['name' => 'required', 'slug' => 'required', 'description' => 'required', 'price' => 'required', 'category' => 'required', 'user' => 'required', 'meta_title' => 'required', 'meta_description' => 'required', 'meta_keywords' => 'required',]);

        $product = Product::find($id);
        $product->is_active = $request->is_approved == 'on' ? 1 : 0;
        $product->is_claimed = $request->is_claimed == 'on' ? 1 : 0;
        $product->is_featured = $request->is_featured == 'on' ? 1 : 0;
        $product->user_id = $request->user;
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->condition = $request->condition;
        $product->brand = $request->brand;
        $product->price = $request->price;

        // storing seo
        $seo = Seo::find($product->seo_id);
        $seo->title = $request->meta_title;
        $seo->meta_description = $request->meta_description;
        $seo->meta_keywords = $request->meta_keywords;

        $seo->save();
        $product->seo_id = $seo->id;

        // storing media
        if ($request->media) {
            $media_logo_id = MediaController::uploadMedia($request->media);
            $product->thumbnail_id = $media_logo_id;
        }
        $gallery = [];
        if ($request->gallery) {
            foreach ($request->gallery as $image) {
                $gallery[] = MediaController::uploadMedia($image);
            }
            $product->gallery = json_encode($gallery);
        }
        $product->save();

        return redirect()->route('products')->with(['msg' => 'Product Updated Successfully', 'types' => 'success']);
    }

    // Function to delete the products
    public function doDeleteProduct($id)
    {
        $product = Product::find($id);
        // deleting seo
        $seo = Seo::find($product->seo_id);
        $seo->delete();
        // deleting media
        $media = Media::find($product->thumbnail_id);
        $media->delete();
        $product->delete();
        return redirect()->route('products')->with(['msg' => 'Product Deleted Successfully', 'types' => 'success']);
    }
}
