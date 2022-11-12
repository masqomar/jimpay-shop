<?php

namespace App\Http\Controllers;


use App\Models\MerchantTransaction;
use App\Http\Requests\{StoreMerchantTransactionRequest, UpdateMerchantTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class MerchantTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view merchanttransaction')->only('index', 'show');
        $this->middleware('permission:create merchanttransaction')->only('create', 'store');
        $this->middleware('permission:edit merchanttransaction')->only('edit', 'update');
        $this->middleware('permission:delete merchanttransaction')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $merchantTransactions = MerchantTransaction::with('user:id,name', 'merchant');

            return DataTables::of($merchantTransactions)
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('merchant', function ($row) {
                    return $row->merchant ? $row->merchant->name : '-';
                })->addColumn('action', 'merchant-transactions.include.action')
                ->toJson();
        }


        return view('merchant-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantTransactionRequest $request)
    {
        MerchantTransaction::create($request->validated());

        return redirect()
            ->route('merchant-transactions.index')
            ->with('success', __('MerchantTransaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerchantTransaction  $merchantTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantTransaction $merchantTransaction)
    {
        $merchantTransaction->load(
            'user:id,name',

            'user:id,name'
        );

        return view('merchant-transactions.show', compact('merchanttransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchantTransaction  $merchantTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantTransaction $merchantTransaction)
    {
        $merchantTransaction->load(
            'user:id,name',

            'user:id,name'
        );

        return view('merchant-transactions.edit', compact('merchanttransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerchantTransaction  $merchantTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantTransactionRequest $request, MerchantTransaction $merchantTransaction)
    {
        $merchantTransaction->update($request->validated());

        return redirect()
            ->route('merchant-transactions.index')
            ->with('success', __('MerchantTransaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchantTransaction  $merchantTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchantTransaction $merchantTransaction)
    {
        try {
            $merchantTransaction->delete();

            return redirect()
                ->route('merchant-transactions.index')
                ->with('success', __('MerchantTransaction deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('merchant-transactions.index')
                ->with('error', __('The MerchantTransaction can`t be deleted because it is related to another table.'));
        }
    }
}
