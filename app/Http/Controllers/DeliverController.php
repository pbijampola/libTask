<?php

namespace App\Http\Controllers;

use App\Models\DeliveyMethod;
use Illuminate\Http\Request;

class DeliverController extends Controller
{
    public function index()
    {
      //check if user is logged in
        if(auth()->check()){
            //get all delivery methods
            $methods = DeliveyMethod::all()->sortBy('id');
            //return view with delivery methods
            return view('delivery.index',compact('methods'));
        }
        //if user is not logged in or not admin redirect to home page
        return redirect()->route('login');
    }

    public function store(Request $request,DeliveyMethod $deliveyMethod)
    {
        //check if user is logged in
        if(auth()->check()){
            $request->validate([
                'location' => 'required'
            ]);
            $shipping_method = DeliveyMethod::find($deliveyMethod);
            if($shipping_method->id == 1){
                //calculate the nearest point to pick the product
                $distance = 0;

            }
        }
        //if user is not logged in or not admin redirect to home page
        return response()->json(['message' => 'You are not authorized to access this page'], 401
    }
}
