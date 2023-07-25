<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();
        return view('backend.pages.inventory.unit.index', compact('units'));
    }

    public function store(Request $request)
    {
        //store unit
        $unit = new Unit();
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->created_by = auth()->user()->id;
        $unit->save();

        notify()->success("Unit created successfully");
        return redirect()->back();
    }


    public function update(Request $request, string $id)
    {
        //update unit 
        $unit = Unit::findOrFail($id);
        $unit->name = $request->name;
        $unit->description = $request->description;
        $unit->updated_by = auth()->user()->id;
        $unit->save();

        notify()->success("Unit updated successfully");
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        notify()->success("Unit deleted successfully");
        return redirect()->back();
    }
}
