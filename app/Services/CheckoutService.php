<?php

use DB;
use App\Events\OrderPlaced;

class CheckoutService
{
    public function checkout($user)
    {
        DB::transaction(function() use($user){
            $cartItems = $user->cart->items()->with('product')->get();
            $grouped = $cartItems->groupBy(fn($i)=>$i->product->vendor_id);

            foreach($grouped as $vendorId=>$items){
                $order = Order::create([
                    'user_id'=>$user->id,
                    'vendor_id'=>$vendorId,
                    'total'=>0,
                    'status'=>'pending'
                ]);

                $total=0;
                foreach($items as $item){
                    $product = $item->product;
                    if($item->quantity>$product->stock) throw new \Exception('Stock error');
                    $product->decrement('stock',$item->quantity);

                    $order->items()->create([
                        'product_id'=>$product->id,
                        'quantity'=>$item->quantity,
                        'price'=>$product->price
                    ]);
                    $total+=$item->quantity*$product->price;
                }

                $order->update(['total'=>$total,'status'=>'paid']);
                Payment::create(['order_id'=>$order->id,'status'=>'paid']);
                event(new OrderPlaced($order));
            }

            $user->cart->items()->delete();
        });
    }
}
