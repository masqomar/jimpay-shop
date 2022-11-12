<?php

namespace App\Http\Controllers;


use App\Models\KopProduct;
use App\Http\Requests\{StoreKopProductRequest, UpdateKopProductRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class KopProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view kopproduct')->only('index', 'show');
        $this->middleware('permission:create kopproduct')->only('create', 'store');
        $this->middleware('permission:edit kopproduct')->only('edit', 'update');
        $this->middleware('permission:delete kopproduct')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $kopProducts = KopProduct::with('product_type:id,name');

            return Datatables::of($kopProducts)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('product_type', function ($row) {
                    return $row->product_type ? $row->product_type->name : '-';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'kop-products.include.action')
                ->toJson();
        }

        return view('kop-products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kop-products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKopProductRequest $request)
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

        KopProduct::create($attr);

        return redirect()
            ->route('kop-products.index')
            ->with('success', __('KopProduct created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function show(KopProduct $kopProduct)
    {
        $kopProduct->load('product_type:id,name');

		return view('kop-products.show', compact('kopProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(KopProduct $kopProduct)
    {
        $kopProduct->load('product_type:id,name');

		return view('kop-products.edit', compact('kopProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKopProductRequest $request, KopProduct $kopProduct)
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
            if ($kopProduct->image != null && file_exists($path . $kopProduct->image)) {
                unlink($path . $kopProduct->image);
            }

            $attr['image'] = $filename;
        }

        $kopProduct->update($attr);

        return redirect()
            ->route('kop-products.index')
            ->with('success', __('KopProduct updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KopProduct $kopProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(KopProduct $kopProduct)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($kopProduct->image != null && file_exists($path . $kopProduct->image)) {
                unlink($path . $kopProduct->image);
            }

            $kopProduct->delete();

            return redirect()
                ->route('kop-products.index')
                ->with('success', __('KopProduct deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('kop-products.index')
                ->with('error', __('The KopProduct can`t be deleted because it is related to another table.'));
        }
    }
}
