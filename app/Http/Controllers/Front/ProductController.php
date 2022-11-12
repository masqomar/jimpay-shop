<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $product = Product::with('product_images', 'detail')->findOrFail($id);
        $carts = Cart::groupBy('user_id')->select('user_id', \DB::raw('count(*) as total'))->get();

        // return json_decode($product);
        return view('frontend.product', compact('product', 'carts'));
    }

    public function store(StoreCartRequest $request)
    {
        Cart::create([
            'product_id' => $request->product_id,
            'merchant_id' => $request->merchant_id,
            'user_id' => auth()->user()->id,
            'quantity' => $request->quantity
        ]);

        return redirect('/');
    }
}
