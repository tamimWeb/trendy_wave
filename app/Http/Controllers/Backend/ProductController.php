<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
//intervention image package
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        //show products 
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.subcategory_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->select('products.*', 'categories.name as category_name', 'sub_categories.name as subcategory_name', 'brands.name as brand_name', 'units.name as unit_name')
            ->where('products.status', 1)->orderBy('id', 'desc')->get();
        return view('backend.pages.inventory.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $sub_categories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        return view('backend.pages.inventory.product.create', compact('categories', 'sub_categories', 'brands', 'units', 'colors'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $product = new Product();
        $product->store_id = auth()->user()->store_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->unit_id = $request->unit_id;
        $product->colors_id = json_encode($request->colors_id);
        $product->sizes = strtoupper(json_encode($request->sizes));
        $product->name = $request->name;
        $product->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $product->sku = $request->sku;
        $product->full_description = $request->full_description;
        $product->short_description = $request->short_description;
        $product->quantity = $request->quantity;
        $product->alert_quantity = $request->alert_quantity;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->sale_price;
        $product->discount = $request->discount;
        $product->after_discount = $request->after_discount;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->
        $product->tags= $request->tags;
        $product->meta_keywords = json_encode($request->meta_keywords);
        $product->created_by = auth()->user()->id;

        if ($request->hasFile('thumbnail')) {
            $image= $request->thumbnail;
            $name = time() . '-' . rand(0, 9999999) . '-' . $product->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/product');
            //resize image
            $img = Image::make($image->getRealPath())->resize(500, 500);
            $img->save($destinationPath . '/' . $name);
            $product->thumbnail = $name;
        }
        //multiple image upload where $request->image[] is array of images and image field is json type in database
        // return response()->json($request->image);
        if ($request->image) {
            $image = [];
            foreach ($request->image as $img) {
                $name = time() . '-' . rand(0, 9999999) . '-' . $product->slug . '.' . $img->getClientOriginalExtension();
                $destinationPath = public_path('backend/images/product');
                $image=Image::make($img->getRealPath())->resize(580, 580);
                $image->save($destinationPath . '/' . $name);
                $image[] = $name;
            }
            $product->images = json_encode($image);
        }

        $product->save();

        notify()->success("Product created successfully");
        return redirect()->route('products.index');
    }

    public function show(string $id)
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
            ->join('sub_categories', 'sub_categories.id', '=', 'products.subcategory_id')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('units', 'units.id', '=', 'products.unit_id')
            ->join('users', 'users.id', '=', 'products.created_by')
            ->select('products.*', 'categories.name as category_name', 'sub_categories.name as subcategory_name', 'brands.name as brand_name', 'units.name as unit_name', 'users.name as creator_name')
            ->where('products.id', $id)->first();

        $colors = json_decode($product->colors_id);
        $colors = Color::whereIn('id', $colors)->get();
        return view('backend.pages.inventory.product.show', compact('product', 'colors'));
    }

    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $product->colors_id = json_decode($product->colors_id);

        $categories = Category::where('status', 1)->get();
        $sub_categories = SubCategory::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $units = Unit::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();

        // return response()->json($product);

        return view('backend.pages.inventory.product.edit', compact('product', 'categories', 'sub_categories', 'brands', 'units', 'colors'));
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->store_id = auth()->user()->store_id;
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->unit_id = $request->unit_id;
        $product->colors_id = json_encode($request->colors_id);
        $product->sizes =strtoupper( json_encode($request->sizes));
        $product->name = $request->name;
        $product->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $product->sku = $request->sku;
        $product->full_description = $request->full_description;
        $product->short_description = $request->short_description;
        $product->quantity = $request->quantity;
        $product->alert_quantity = $request->alert_quantity;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->sale_price;
        $product->discount = $request->discount;
        $product->after_discount = $request->after_discount;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->tags= json_encode($request->tags);
        $product->meta_keywords = json_encode($request->meta_keywords);
        $product->updated_by = auth()->user()->id;

        $database_image = json_decode($product->images);

        //if thumbnil equals to null then unlink image from folder
        if ($request->thumbnail !== null) {
            $destinationPath = public_path('backend/images/product');
            if (file_exists($destinationPath . '/' . $product->thumbnail)) {
                @unlink($destinationPath . '/' . $product->thumbnail);
            }
            $product->thumbnail = null;
        }

        //if request has thumbnail then store it in database
        if ($request->hasFile('thumbnail')) {
            $image= $request->thumbnail;
            $name = 'thumb-' . time() . '-' . rand(0, 9999999) . '-' . $product->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/product');
            //resize image
            $img = Image::make($image->getRealPath())->resize(450, 450);
            $img->save($destinationPath . '/' . $name);
            $product->thumbnail = $name;
        }

        if ($request->old_image) {
            foreach ($request->old_image as $img) {
                if (($key = array_search($img, $database_image)) !== false) {
                    unset($database_image[$key]);
                }
                //remove key from array
                $database_image = array_values($database_image);

                // unlink image from folder
                $destinationPath = public_path('backend/images/product');
                if (file_exists($destinationPath . '/' . $img)) {
                    @unlink($destinationPath . '/' . $img);
                }
            }
            $product->images = json_encode($database_image);
        }

        if ($request->image) {
            foreach ($request->image as $img) {
                $name = 'product-'. time() . '-' . rand(0, 9999999) . '-' . $product->slug . '.' . $img->getClientOriginalExtension();
                $destinationPath = public_path('backend/images/product');
                $image=Image::make($img->getRealPath())->resize(580, 580);
                $image->save($destinationPath . '/' . $name);
                $database_image[] = $name;
            }
        }

        $product->images = json_encode($database_image);
        $product->save();

        notify()->success("Product updated successfully");
        return redirect()->route('products.index');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        $product->save();

        notify()->success("Product deleted successfully");
        return redirect()->route('products.index');
    }
}