<?php

namespace App\Http\Controllers;


use App\Models\Product;
use App\Http\Requests\{StoreProductRequest, UpdateProductRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view product')->only('index', 'show');
        $this->middleware('permission:create product')->only('create', 'store');
        $this->middleware('permission:edit product')->only('edit', 'update');
        $this->middleware('permission:delete product')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $products = Product::with('category:id,name', 'user:id,name');

            return Datatables::of($products)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(200);
                })
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })
                ->addColumn('product_image', function ($row) {
                    if ($row->product_image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/product_images/' . $row->product_image);
                })

                ->addColumn('action', 'products.include.action')
                ->toJson();
        }

        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('product_image') && $request->file('product_image')->isValid()) {

            $path = storage_path('app/public/uploads/product_images/');
            $filename = $request->file('product_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('product_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            $attr['product_image'] = $filename;
        }

        Product::create($attr);

        return redirect()
            ->route('products.index')
            ->with('success', __('Product created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load('category:id,name', 'user:id,name');

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product->load('category:id,name', 'user:id,name');

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $attr = $request->validated();

        if ($request->file('product_image') && $request->file('product_image')->isValid()) {

            $path = storage_path('app/public/uploads/product_images/');
            $filename = $request->file('product_image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('product_image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save($path . $filename);

            // delete old product_image from storage
            if ($product->product_image != null && file_exists($path . $product->product_image)) {
                unlink($path . $product->product_image);
            }

            $attr['product_image'] = $filename;
        }

        $product->update($attr);

        return redirect()
            ->route('products.index')
            ->with('success', __('Product updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $path = storage_path('app/public/uploads/product_images/');

            if ($product->product_image != null && file_exists($path . $product->product_image)) {
                unlink($path . $product->product_image);
            }

            $product->delete();

            return redirect()
                ->route('products.index')
                ->with('success', __('Product deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('products.index')
                ->with('error', __('The Product can`t be deleted because it is related to another table.'));
        }
    }
}
