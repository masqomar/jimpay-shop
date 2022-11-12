<?php

namespace App\Http\Controllers;


use App\Models\DetailProduct;
use App\Http\Requests\{StoreDetailProductRequest, UpdateDetailProductRequest};
use Yajra\DataTables\Facades\DataTables;

class DetailProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view detailproduct')->only('index', 'show');
        $this->middleware('permission:create detailproduct')->only('create', 'store');
        $this->middleware('permission:edit detailproduct')->only('edit', 'update');
        $this->middleware('permission:delete detailproduct')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $detailProducts = DetailProduct::with('product:id,name');

            return DataTables::of($detailProducts)
                ->addColumn('product', function ($row) {
                    return $row->product ? $row->product->name : '-';
                })->addColumn('action', 'detail-products.include.action')
                ->toJson();
        }


        return view('detail-products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detail-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailProductRequest $request)
    {
        DetailProduct::create($request->validated());

        return redirect()
            ->route('detail-products.index')
            ->with('success', __('DetailProduct created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProduct $detailProduct)
    {
        $detailProduct->load('product:id,name');

		return view('detail-products.show', compact('detailproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailProduct $detailProduct)
    {
        $detailProduct->load('product:id,name');

		return view('detail-products.edit', compact('detailproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailProductRequest $request, DetailProduct $detailProduct)
    {
        $detailProduct->update($request->validated());

        return redirect()
            ->route('detail-products.index')
            ->with('success', __('DetailProduct updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProduct  $detailProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProduct $detailProduct)
    {
        try {
            $detailProduct->delete();

            return redirect()
                ->route('detail-products.index')
                ->with('success', __('DetailProduct deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('detail-products.index')
                ->with('error', __('The DetailProduct can`t be deleted because it is related to another table.'));
        }
    }
}
