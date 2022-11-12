<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        $carts = Cart::groupBy('user_id')->select('user_id', \DB::raw('count(*) as total'))->get();

        // dd($carts);
        return view('frontend.homepage', compact('categories', 'products', 'carts'));
    }
}
