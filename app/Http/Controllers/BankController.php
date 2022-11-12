<?php

namespace App\Http\Controllers;


use App\Models\Bank;
use App\Http\Requests\{StoreBankRequest, UpdateBankRequest};
use Yajra\DataTables\Facades\DataTables;

class BankController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view bank')->only('index', 'show');
        $this->middleware('permission:create bank')->only('create', 'store');
        $this->middleware('permission:edit bank')->only('edit', 'update');
        $this->middleware('permission:delete bank')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $banks = Bank::query();

            return DataTables::of($banks)
                ->addColumn('action', 'banks.include.action')
                ->toJson();
        }


        return view('banks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('banks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBankRequest $request)
    {
        Bank::create($request->validated());

        return redirect()
            ->route('banks.index')
            ->with('success', __('Bank created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('banks.show', compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('banks.edit', compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBankRequest $request, Bank $bank)
    {
        $bank->update($request->validated());

        return redirect()
            ->route('banks.index')
            ->with('success', __('Bank updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        try {
            $bank->delete();

            return redirect()
                ->route('banks.index')
                ->with('success', __('Bank deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('banks.index')
                ->with('error', __('The Bank can`t be deleted because it is related to another table.'));
        }
    }
}
