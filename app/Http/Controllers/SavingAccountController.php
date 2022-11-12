<?php

namespace App\Http\Controllers;


use App\Models\SavingAccount;
use App\Http\Requests\{StoreSavingAccountRequest, UpdateSavingAccountRequest};
use Yajra\DataTables\Facades\DataTables;

class SavingAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view savingaccount')->only('index', 'show');
        $this->middleware('permission:create savingaccount')->only('create', 'store');
        $this->middleware('permission:edit savingaccount')->only('edit', 'update');
        $this->middleware('permission:delete savingaccount')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $savingAccounts = SavingAccount::query();

            return DataTables::of($savingAccounts)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('action', 'saving-accounts.include.action')
                ->toJson();
        }


        return view('saving-accounts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('saving-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSavingAccountRequest $request)
    {
        SavingAccount::create($request->validated());

        return redirect()
            ->route('saving-accounts.index')
            ->with('success', __('SavingAccount created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function show(SavingAccount $savingAccount)
    {
        return view('saving-accounts.show', compact('savingaccount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(SavingAccount $savingAccount)
    {
        return view('saving-accounts.edit', compact('savingaccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSavingAccountRequest $request, SavingAccount $savingAccount)
    {
        $savingAccount->update($request->validated());

        return redirect()
            ->route('saving-accounts.index')
            ->with('success', __('SavingAccount updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SavingAccount  $savingAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(SavingAccount $savingAccount)
    {
        try {
            $savingAccount->delete();

            return redirect()
                ->route('saving-accounts.index')
                ->with('success', __('SavingAccount deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('saving-accounts.index')
                ->with('error', __('The SavingAccount can`t be deleted because it is related to another table.'));
        }
    }
}
