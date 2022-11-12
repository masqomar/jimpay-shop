<?php

namespace App\Http\Controllers;


use App\Models\PaylaterProvider;
use App\Http\Requests\{StorePaylaterProviderRequest, UpdatePaylaterProviderRequest};
use Yajra\DataTables\Facades\DataTables;

class PaylaterProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view paylaterprovider')->only('index', 'show');
        $this->middleware('permission:create paylaterprovider')->only('create', 'store');
        $this->middleware('permission:edit paylaterprovider')->only('edit', 'update');
        $this->middleware('permission:delete paylaterprovider')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $paylaterProviders = PaylaterProvider::query();

            return DataTables::of($paylaterProviders)
                ->addColumn('action', 'paylater-providers.include.action')
                ->toJson();
        }


        return view('paylater-providers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paylater-providers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaylaterProviderRequest $request)
    {
        PaylaterProvider::create($request->validated());

        return redirect()
            ->route('paylater-providers.index')
            ->with('success', __('PaylaterProvider created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function show(PaylaterProvider $paylaterProvider)
    {
        return view('paylater-providers.show', compact('paylaterprovider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(PaylaterProvider $paylaterProvider)
    {
        return view('paylater-providers.edit', compact('paylaterprovider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaylaterProviderRequest $request, PaylaterProvider $paylaterProvider)
    {
        $paylaterProvider->update($request->validated());

        return redirect()
            ->route('paylater-providers.index')
            ->with('success', __('PaylaterProvider updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaylaterProvider  $paylaterProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaylaterProvider $paylaterProvider)
    {
        try {
            $paylaterProvider->delete();

            return redirect()
                ->route('paylater-providers.index')
                ->with('success', __('PaylaterProvider deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('paylater-providers.index')
                ->with('error', __('The PaylaterProvider can`t be deleted because it is related to another table.'));
        }
    }
}
