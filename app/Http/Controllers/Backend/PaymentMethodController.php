<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        //
        $payments = PaymentMethod::all();
        return view('backend.pages.settings.payment-method.index',compact('payments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $payment = new PaymentMethod();
        $payment->name = $request->name;
        $payment->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $payment->description = $request->description;
        $payment->created_by = auth()->user()->id;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '-' . rand(0, 9999999) . '-' . $payment->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/payment-method');
            $image->move($destinationPath, $name);
            $payment->logo = $name;
        }

        $payment->save();

        notify()->success("Payment created successfully");
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
        $payment = PaymentMethod::find($id);
        $payment->name = $request->name;
        $payment->slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->name)));
        $payment->description = $request->description;
        $payment->updated_by = auth()->user()->id;

        //save logo
        if ($request->hasFile('logo')) {
            //remove old image
            if (file_exists(public_path('backend/images/payment-method/' . $payment->logo))) {
                @unlink(public_path('backend/images/payment-method/' . $payment->logo));
            }
            $image = $request->file('logo');
            $name = time() . '-' . rand(0, 9999999) . '-' . $payment->slug . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('backend/images/payment-method');
            $image->move($destinationPath, $name);
            $payment->logo = $name;
        }

        $payment->save();

        notify()->success("Payment updated successfully");
        return redirect()->back();
    }



    public function destroy(string $id)
    {
        $payment = PaymentMethod::find($id);
        if ($payment) {
            //remove old image
            if (file_exists(public_path('backend/images/payment-method/' . $payment->logo))) {
                @unlink(public_path('backend/images/payment-method/' . $payment->logo));
            }

            $payment->delete();
        }

        notify()->success("Payment deleted successfully");
        return redirect()->back();
    }
    
    }

