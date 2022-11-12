<?php

namespace App\Http\Controllers;


use App\Models\Paylater;
use App\Http\Requests\{StorePaylaterRequest, UpdatePaylaterRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class PaylaterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view paylater')->only('index', 'show');
        $this->middleware('permission:create paylater')->only('create', 'store');
        $this->middleware('permission:edit paylater')->only('edit', 'update');
        $this->middleware('permission:delete paylater')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $paylaters = Paylater::with('user:id,name', 'paylater_provider:id,name', 'bank:id,code');

            return Datatables::of($paylaters)
                ->addColumn('note', function ($row) {
                    return str($row->note)->limit(200);
                })
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('paylater_provider', function ($row) {
                    return $row->paylater_provider ? $row->paylater_provider->name : '-';
                })->addColumn('bank', function ($row) {
                    return $row->bank ? $row->bank->code : '-';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'paylaters.include.action')
                ->toJson();
        }

        return view('paylaters.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paylaters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaylaterRequest $request)
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

        Paylater::create($attr);

        return redirect()
            ->route('paylaters.index')
            ->with('success', __('Paylater created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function show(Paylater $paylater)
    {
        $paylater->load('user:id,name', 'paylater_provider:id,name', 'bank:id,code');

        return view('paylaters.show', compact('paylater'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function edit(Paylater $paylater)
    {
        $paylater->load('user:id,name', 'paylater_provider:id,name', 'bank:id,code');

        return view('paylaters.edit', compact('paylater'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaylaterRequest $request, Paylater $paylater)
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
            if ($paylater->image != null && file_exists($path . $paylater->image)) {
                unlink($path . $paylater->image);
            }

            $attr['image'] = $filename;
        }

        $paylater->update($attr);

        return redirect()
            ->route('paylaters.index')
            ->with('success', __('Paylater updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paylater $paylater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paylater $paylater)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($paylater->image != null && file_exists($path . $paylater->image)) {
                unlink($path . $paylater->image);
            }

            $paylater->delete();

            return redirect()
                ->route('paylaters.index')
                ->with('success', __('Paylater deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('paylaters.index')
                ->with('error', __('The Paylater can`t be deleted because it is related to another table.'));
        }
    }
}
