<?php

namespace App\Http\Controllers;


use App\Models\SavingTransaction;
use App\Http\Requests\{StoreSavingTransactionRequest, UpdateSavingTransactionRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class SavingTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view savingtransaction')->only('index', 'show');
        $this->middleware('permission:create savingtransaction')->only('create', 'store');
        $this->middleware('permission:edit savingtransaction')->only('edit', 'update');
        $this->middleware('permission:delete savingtransaction')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $savingTransactions = SavingTransaction::with('user:id,name', 'kop_product:id,name');

            return Datatables::of($savingTransactions)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('kop_product', function ($row) {
                    return $row->kop_product ? $row->kop_product->name : '-';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'saving-transactions.include.action')
                ->toJson();
        }

        return view('saving-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saving-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingTransactionRequest $request)
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

        SavingTransaction::create($attr);

        return redirect()
            ->route('saving-transactions.index')
            ->with('success', __('SavingTransaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingTransaction $savingTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(SavingTransaction $savingTransaction)
    {
        $savingTransaction->load('user:id,name', 'kop_product:id,name');

		return view('saving-transactions.show', compact('savingTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingTransaction $savingTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingTransaction $savingTransaction)
    {
        $savingTransaction->load('user:id,name', 'kop_product:id,name');

		return view('saving-transactions.edit', compact('savingTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingTransaction $savingTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingTransactionRequest $request, SavingTransaction $savingTransaction)
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
            if ($savingTransaction->image != null && file_exists($path . $savingTransaction->image)) {
                unlink($path . $savingTransaction->image);
            }

            $attr['image'] = $filename;
        }

        $savingTransaction->update($attr);

        return redirect()
            ->route('saving-transactions.index')
            ->with('success', __('SavingTransaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingTransaction $savingTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingTransaction $savingTransaction)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($savingTransaction->image != null && file_exists($path . $savingTransaction->image)) {
                unlink($path . $savingTransaction->image);
            }

            $savingTransaction->delete();

            return redirect()
                ->route('saving-transactions.index')
                ->with('success', __('SavingTransaction deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('saving-transactions.index')
                ->with('error', __('The SavingTransaction can`t be deleted because it is related to another table.'));
        }
    }
}
