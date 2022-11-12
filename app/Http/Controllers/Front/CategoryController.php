<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::with('product')->findOrFail($id);
        $carts = Cart::groupBy('user_id')->select('user_id', \DB::raw('count(*) as total'))->get();

        // return json_decode($category);
        return view('frontend.category', compact('category', 'carts'));
    }
}
