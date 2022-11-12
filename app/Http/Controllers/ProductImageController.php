<?php

namespace App\Http\Controllers;


use App\Models\ProductImage;
use App\Http\Requests\{StoreProductImageRequest, UpdateProductImageRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class ProductImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view productimage')->only('index', 'show');
        $this->middleware('permission:create productimage')->only('create', 'store');
        $this->middleware('permission:edit productimage')->only('edit', 'update');
        $this->middleware('permission:delete productimage')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $productImages = ProductImage::with('product:id,name');

            return Datatables::of($productImages)
                ->addColumn('product', function ($row) {
                    return $row->product ? $row->product->name : '-';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'product-images.include.action')
                ->toJson();
        }

        return view('product-images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductImageRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['image'] = $filename;
        }

        ProductImage::create($attr);

        return redirect()
            ->route('product-images.index')
            ->with('success', __('ProductImage created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        $productImage->load('product:id,name');

		return view('product-images.show', compact('productImage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        $productImage->load('product:id,name');

		return view('product-images.edit', compact('productImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        $attr = $request->validated();

        if ($request->file('image') && $request->file('image')->isValid()) {

            $path = storage_path('app/public/uploads/images/');
            $filename = $request->file('image')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('image')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old image from storage
            if ($productImage->image != null && file_exists($path . $productImage->image)) {
                unlink($path . $productImage->image);
            }

            $attr['image'] = $filename;
        }

        $productImage->update($attr);

        return redirect()
            ->route('product-images.index')
            ->with('success', __('ProductImage updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($productImage->image != null && file_exists($path . $productImage->image)) {
                unlink($path . $productImage->image);
            }

            $productImage->delete();

            return redirect()
                ->route('product-images.index')
                ->with('success', __('ProductImage deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('product-images.index')
                ->with('error', __('The ProductImage can`t be deleted because it is related to another table.'));
        }
    }
}
