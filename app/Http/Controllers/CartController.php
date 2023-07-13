<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart(){
        $cart = Cart::where('user_id', auth()->id())->get();
        return view('cart.viewCart', compact('cart'));
    }

    public function addcart(Request $request, Product $product)
    {
        $existingCart = Cart::where('user_id', auth()->id())
            ->where('store_id', $product->store_id)
            ->where('product_id', $product->id)
            ->first();

        if ($existingCart) {
            return redirect()->route('index.cart');
        }

        $cart = new Cart();
        $cart->user_id = auth()->id();
        $cart->store_id = $product->store_id;
        $cart->product_id = $product->id;
        $cart->save();

        return redirect()->route('index.cart');
    }

    public function deletecart(Cart $cart, Product $product)
    {
   


        $cart->delete();

        return redirect()->route('index.cart');
    }

}
