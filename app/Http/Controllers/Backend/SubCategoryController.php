<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $subCategories = SubCategory::join('categories', 'categories.id', '=', 'sub_categories.category_id')
            ->select('sub_categories.*', 'categories.id as category_id', 'categories.name as category_name')
            ->get();
        return view('backend.pages.inventory.sub-category.index', compact('subCategories', 'categories'));
    }

    public function store(Request $request)
    {
        //store sub category
        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $subCategory->description = $request->description;
        $subCategory->created_by = auth()->user()->id;

        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = time() . '-' . rand(0, 9999999) . '-' . $subCategory->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/sub-categories');
            $image->move($destinationPath, $name);
            $subCategory->icon = $name;
        }
        $subCategory->save();

        notify()->success("Sub Category created successfully");
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        //update sub category
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $subCategory->description = $request->description;
        $subCategory->updated_by = auth()->user()->id;

        //remove old icon

        //save new icon
        if ($request->hasFile('icon')) {
            if ($subCategory->icon) {
                $image_path = public_path('backend/images/sub-categories/' . $subCategory->icon);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                }
            }

            $image = $request->file('icon');
            $name = time() . '-' . rand(0, 9999999) . '-' . $subCategory->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/sub-categories');
            $image->move($destinationPath, $name);
            $subCategory->icon = $name;
        }
        $subCategory->save();

        notify()->success("Sub Category updated successfully");
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        //remove old icon
        if ($subCategory->icon) {
            $image_path = public_path('backend/images/sub-categories/' . $subCategory->icon);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
        $subCategory->delete();

        notify()->success("Sub Category deleted successfully");
        return redirect()->back();
    }
}
