<?php

namespace App\Http\Controllers;


use App\Models\Cashflow;
use App\Http\Requests\{StoreCashflowRequest, UpdateCashflowRequest};
use Yajra\DataTables\Facades\DataTables;

class CashflowController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view cashflow')->only('index', 'show');
        $this->middleware('permission:create cashflow')->only('create', 'store');
        $this->middleware('permission:edit cashflow')->only('edit', 'update');
        $this->middleware('permission:delete cashflow')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $cashflows = Cashflow::with('saving_account:id,code');

            return DataTables::of($cashflows)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('saving_account', function ($row) {
                    return $row->saving_account ? $row->saving_account->code : '-';
                })->addColumn('action', 'cashflows.include.action')
                ->toJson();
        }


        return view('cashflows.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashflows.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCashflowRequest $request)
    {
        Cashflow::create($request->validated());

        return redirect()
            ->route('cashflows.index')
            ->with('success', __('Cashflow created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function show(Cashflow $cashflow)
    {
        $cashflow->load('saving_account:id,code');

		return view('cashflows.show', compact('cashflow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function edit(Cashflow $cashflow)
    {
        $cashflow->load('saving_account:id,code');

		return view('cashflows.edit', compact('cashflow'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCashflowRequest $request, Cashflow $cashflow)
    {
        $cashflow->update($request->validated());

        return redirect()
            ->route('cashflows.index')
            ->with('success', __('Cashflow updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cashflow  $cashflow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cashflow $cashflow)
    {
        try {
            $cashflow->delete();

            return redirect()
                ->route('cashflows.index')
                ->with('success', __('Cashflow deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('cashflows.index')
                ->with('error', __('The Cashflow can`t be deleted because it is related to another table.'));
        }
    }
}
