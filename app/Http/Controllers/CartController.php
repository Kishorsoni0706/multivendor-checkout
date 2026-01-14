<?php

use App\Services\CartService;

class CartController extends Controller
{
    public function index(CartService $cartService){
        $groupedCart = $cartService->groupedByVendor();
        return view('cart.index',compact('groupedCart'));
    }

    public function add(Product $product,Request $request,CartService $cartService){
        $request->validate(['quantity'=>'required|int|min:1']);
        $cartService->addToCart($product,$request->quantity);
        return redirect()->back()->with('success','Added to cart');
    }
}

