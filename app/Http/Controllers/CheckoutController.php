<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(CheckoutService $checkoutService){
        try{
            $checkoutService->checkout(auth()->user());
            return redirect()->route('orders.index')->with('success','Order placed!');
        }catch(\Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
