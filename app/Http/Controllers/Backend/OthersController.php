<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OthersController extends Controller
{

    public function statusUpdate(Request $request)
    {
        // validation
        $validated = $request->validate([
            'id' => 'required',
            'status' => 'required',
            'model' => 'required',
        ]);

        if ($validated) {
            $model = "\App\Models\\" . $request->model;
            $data = $model::find($request->id);
            $data->status = $request->status;
            $data->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully',
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
            ]);
        }
    }
}
