<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Http\Requests\{StoreCartRequest, UpdateCartRequest};
use Yajra\DataTables\Facades\DataTables;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view cart')->only('index', 'show');
        $this->middleware('permission:create cart')->only('create', 'store');
        $this->middleware('permission:edit cart')->only('edit', 'update');
        $this->middleware('permission:delete cart')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $carts = Cart::with('product:id,name', 'user:id,name', 'user:id,name');

            return DataTables::of($carts)
                ->addColumn('product', function ($row) {
                    return $row->product ? $row->product->name : '-';
                })->addColumn('merchant', function ($row) {
                    return $row->merchant ? $row->merchant->name : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'carts.include.action')
                ->toJson();
        }


        return view('carts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        Cart::create($request->validated());

        return redirect()
            ->route('carts.index')
            ->with('success', __('Cart created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $cart->load('product:id,name', 'user:id,name', 'user:id,name');

        return view('carts.show', compact('cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $cart->load('product:id,name', 'user:id,name', 'user:id,name');

        return view('carts.edit', compact('cart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        $cart->update($request->validated());

        return redirect()
            ->route('carts.index')
            ->with('success', __('Cart updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try {
            $cart->delete();

            return redirect()
                ->route('carts.index')
                ->with('success', __('Cart deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('carts.index')
                ->with('error', __('The Cart can`t be deleted because it is related to another table.'));
        }
    }
}
