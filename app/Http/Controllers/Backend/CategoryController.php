<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.pages.inventory.category.index', compact('categories'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $category = new Category();
        $category->name = $request->name;
        $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $category->description = $request->description;
        $category->created_by = auth()->user()->id;

        //save logo
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $name = time() . '-' . rand(0, 9999999) . '-' . $category->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/categories');
            $image->move($destinationPath, $name);
            $category->icon = $name;
        }

        $category->save();

        notify()->success("Category created successfully");
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        // return response()->json($request->all());
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $category->description = $request->description;
        $category->updated_by = auth()->user()->id;

        //save logo
        if ($request->hasFile('icon')) {
            //remove old icon
            if ($category->icon) {
                $image_path = public_path('backend/images/categories/' . $category->icon);
                if (file_exists($image_path)) {
                    @unlink($image_path);
                }
            }
            $image = $request->file('icon');
            $name = time() . '-' . rand(0, 9999999) . '-' . $category->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/categories');
            $image->move($destinationPath, $name);
            $category->icon = $name;
        }

        $category->save();

        notify()->success("Category updated successfully");

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        // return response()->json($id);
        $category = Category::findOrFail($id);
        //remove old icon
        if ($category->icon) {
            $image_path = public_path('backend/images/categories/' . $category->icon);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
        }
        $category->delete();
        notify()->success("Category deleted successfully");
        return redirect()->back();
    }
}
