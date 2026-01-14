<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::with('vendor','user')
            ->when($request->vendor,fn($q)=>$q->where('vendor_id',$request->vendor))
            ->when($request->status,fn($q)=>$q->where('status',$request->status))
            ->latest()->get();
        return view('admin.orders.index',compact('orders'));
    }

    public function show(Order $order){
        $order->load('items.product','vendor','user');
        return view('admin.orders.show',compact('order'));
    }
}

