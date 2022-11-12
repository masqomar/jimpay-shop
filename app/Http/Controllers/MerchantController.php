<?php

namespace App\Http\Controllers;


use App\Models\Merchant;
use App\Http\Requests\{StoreMerchantRequest, UpdateMerchantRequest};
use Yajra\DataTables\Facades\DataTables;

class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view merchant')->only('index', 'show');
        $this->middleware('permission:create merchant')->only('create', 'store');
        $this->middleware('permission:edit merchant')->only('edit', 'update');
        $this->middleware('permission:delete merchant')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $merchants = Merchant::with('user:id,name', 'merchant');

            return DataTables::of($merchants)
                ->addColumn('description', function ($row) {
                    return str($row->description)->limit(200);
                })
                ->addColumn('merchant', function ($row) {
                    return $row->merchant ? $row->merchant->name : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'merchants.include.action')
                ->toJson();
        }


        return view('merchants.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantRequest $request)
    {
        Merchant::create($request->validated());

        return redirect()
            ->route('merchants.index')
            ->with('success', __('Merchant created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        $merchant->load('user:id,name', 'user:id,name');

        return view('merchants.show', compact('merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        $merchant->load('user:id,name', 'user:id,name');

        return view('merchants.edit', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        $merchant->update($request->validated());

        return redirect()
            ->route('merchants.index')
            ->with('success', __('Merchant updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        try {
            $merchant->delete();

            return redirect()
                ->route('merchants.index')
                ->with('success', __('Merchant deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('merchants.index')
                ->with('error', __('The Merchant can`t be deleted because it is related to another table.'));
        }
    }
}
