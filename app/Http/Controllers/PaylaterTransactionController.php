<?php

namespace App\Http\Controllers;


use App\Models\PaylaterTransaction;
use App\Http\Requests\{StorePaylaterTransactionRequest, UpdatePaylaterTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class PaylaterTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view paylatertransaction')->only('index', 'show');
        $this->middleware('permission:create paylatertransaction')->only('create', 'store');
        $this->middleware('permission:edit paylatertransaction')->only('edit', 'update');
        $this->middleware('permission:delete paylatertransaction')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $paylaterTransactions = PaylaterTransaction::with('paylater:id,code', 'user:id,name');

            return DataTables::of($paylaterTransactions)
                ->addColumn('note', function($row){
                    return str($row->note)->limit(200);
                })
				->addColumn('paylater', function ($row) {
                    return $row->paylater ? $row->paylater->code : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'paylater-transactions.include.action')
                ->toJson();
        }


        return view('paylater-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paylater-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaylaterTransactionRequest $request)
    {
        PaylaterTransaction::create($request->validated());

        return redirect()
            ->route('paylater-transactions.index')
            ->with('success', __('PaylaterTransaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaylaterTransaction  $paylaterTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(PaylaterTransaction $paylaterTransaction)
    {
        $paylaterTransaction->load('paylater:id,code', 'user:id,name');

		return view('paylater-transactions.show', compact('paylatertransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaylaterTransaction  $paylaterTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(PaylaterTransaction $paylaterTransaction)
    {
        $paylaterTransaction->load('paylater:id,code', 'user:id,name');

		return view('paylater-transactions.edit', compact('paylatertransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaylaterTransaction  $paylaterTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaylaterTransactionRequest $request, PaylaterTransaction $paylaterTransaction)
    {
        $paylaterTransaction->update($request->validated());

        return redirect()
            ->route('paylater-transactions.index')
            ->with('success', __('PaylaterTransaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaylaterTransaction  $paylaterTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaylaterTransaction $paylaterTransaction)
    {
        try {
            $paylaterTransaction->delete();

            return redirect()
                ->route('paylater-transactions.index')
                ->with('success', __('PaylaterTransaction deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('paylater-transactions.index')
                ->with('error', __('The PaylaterTransaction can`t be deleted because it is related to another table.'));
        }
    }
}
