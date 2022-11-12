<?php

namespace App\Http\Controllers;


use App\Models\ProductType;
use App\Http\Requests\{StoreProductTypeRequest, UpdateProductTypeRequest};
use Yajra\DataTables\Facades\DataTables;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view producttype')->only('index', 'show');
        $this->middleware('permission:create producttype')->only('create', 'store');
        $this->middleware('permission:edit producttype')->only('edit', 'update');
        $this->middleware('permission:delete producttype')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $productTypes = ProductType::query();

            return DataTables::of($productTypes)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('action', 'product-types.include.action')
                ->toJson();
        }


        return view('product-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTypeRequest $request)
    {
        ProductType::create($request->validated());

        return redirect()
            ->route('product-types.index')
            ->with('success', __('ProductType created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        return view('product-types.show', compact('producttype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        return view('product-types.edit', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType)
    {
        $productType->update($request->validated());

        return redirect()
            ->route('product-types.index')
            ->with('success', __('ProductType updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        try {
            $productType->delete();

            return redirect()
                ->route('product-types.index')
                ->with('success', __('ProductType deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('product-types.index')
                ->with('error', __('The ProductType can`t be deleted because it is related to another table.'));
        }
    }
}
