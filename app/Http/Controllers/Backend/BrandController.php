<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        //
        $brands = Brand::all();
        return view('backend.pages.inventory.brand.index', compact('brands'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $brand->description = $request->description;
        $brand->created_by = auth()->user()->id;

        //save logo
        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '-' . rand(0, 9999999) . '-' . $brand->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/brands');
            $image->move($destinationPath, $name);
            $brand->logo = $name;
        }

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = time() . '-' . rand(0, 9999999) . '-' . $brand->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/brands');
            $image->move($destinationPath, $name);
            $brand->banner = $name;
        }

        $brand->save();

        notify()->success("Brand created successfully");
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

        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $brand->description = $request->description;
        $brand->updated_by = auth()->user()->id;

        //save logo
        if ($request->hasFile('logo')) {
            //remove old image
            if (file_exists(public_path('backend/images/brands/' . $brand->logo))) {
                @unlink(public_path('backend/images/brands/' . $brand->logo));
            }
            $image = $request->file('logo');
            $name = time() . '-' . rand(0, 9999999) . '-' . $brand->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/brands');
            $image->move($destinationPath, $name);
            $brand->logo = $name;
        }

        if ($request->hasFile('banner')) {
            //remove old image
            if (file_exists(public_path('backend/images/brands/' . $brand->banner))) {
                @unlink(public_path('backend/images/brands/' . $brand->banner));
            }
            $image = $request->file('banner');
            $name = time() . '-' . rand(0, 9999999) . '-' . $brand->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/brands');
            $image->move($destinationPath, $name);
            $brand->banner = $name;
        }

        $brand->save();

        notify()->success("Brand updated successfully");
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
        $brand = Brand::find($id);
        if ($brand) {
            //remove old image
            if (file_exists(public_path('backend/images/brands/' . $brand->logo))) {
                @unlink(public_path('backend/images/brands/' . $brand->logo));
            }
            if (file_exists(public_path('backend/images/brands/' . $brand->banner))) {
                @unlink(public_path('backend/images/brands/' . $brand->banner));
            }
            $brand->delete();
        }

        notify()->success("Brand deleted successfully");
        return redirect()->back();
    }
}
