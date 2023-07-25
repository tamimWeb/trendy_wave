<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        //
        $colors = Color::orderBy('name', 'asc')->get();
        return view('backend.pages.inventory.color.index', compact('colors'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $color = new Color();
        $color->name = $request->name;
        $color->code = $request->code;
        $color->created_by = auth()->user()->id;
        $color->save();

        notify()->success("Color created successfully");
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
        //
        $color = Color::find($id);
        $color->name = $request->name;
        $color->code = $request->code;
        $color->updated_by = auth()->user()->id;
        $color->save();

        notify()->success("Color updated successfully");
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $color = Color::find($id);
        $color->delete();

        notify()->success("Color deleted successfully");
        return redirect()->back();
    }
}
