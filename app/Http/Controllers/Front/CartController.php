<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product', 'user', 'merchant')->get();
        // $carts = Cart::with('user', 'product')->groupBy('user_id')->select('user_id', \DB::raw('count(*) as total'))->get();
        foreach ($carts as $cart)
            $subtotal = $cart->quantity * $cart->product->price;
        $total = $subtotal + 1000;

        // return json_decode($total);

        return view('frontend.cart', compact('carts', 'subtotal', 'total'));
    }
}
