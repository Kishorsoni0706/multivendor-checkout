<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Exception;

class CartService
{
    public function getCart()
    {
        return Cart::firstOrCreate([
            'user_id' => auth()->id()
        ]);
    }

    public function addToCart(Product $product, int $quantity)
    {
        if ($quantity > $product->stock) {
            throw new Exception('Quantity exceeds stock');
        }

        $cart = $this->getCart();

        $item = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $newQty = $item->quantity + $quantity;

            if ($newQty > $product->stock) {
                throw new Exception('Quantity exceeds stock');
            }

            $item->update(['quantity' => $newQty]);
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }
    }

    public function groupedByVendor()
    {
        $cart = $this->getCart();

        return $cart->items()
            ->with('product.vendor')
            ->get()
            ->groupBy(fn($item) => $item->product->vendor->name);
    }
}
