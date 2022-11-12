<?php

namespace App\Http\Controllers;


use App\Models\UserTransaction;
use App\Http\Requests\{StoreUserTransactionRequest, UpdateUserTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class UserTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view usertransaction')->only('index', 'show');
        $this->middleware('permission:create usertransaction')->only('create', 'store');
        $this->middleware('permission:edit usertransaction')->only('edit', 'update');
        $this->middleware('permission:delete usertransaction')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userTransactions = UserTransaction::with('user:id,name');

            return DataTables::of($userTransactions)
                ->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'user-transactions.include.action')
                ->toJson();
        }


        return view('user-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTransactionRequest $request)
    {
        UserTransaction::create($request->validated());

        return redirect()
            ->route('user-transactions.index')
            ->with('success', __('UserTransaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransaction $userTransaction)
    {
        $userTransaction->load('user:id,name');

		return view('user-transactions.show', compact('usertransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransaction $userTransaction)
    {
        $userTransaction->load('user:id,name');

		return view('user-transactions.edit', compact('usertransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTransactionRequest $request, UserTransaction $userTransaction)
    {
        $userTransaction->update($request->validated());

        return redirect()
            ->route('user-transactions.index')
            ->with('success', __('UserTransaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTransaction  $userTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransaction $userTransaction)
    {
        try {
            $userTransaction->delete();

            return redirect()
                ->route('user-transactions.index')
                ->with('success', __('UserTransaction deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-transactions.index')
                ->with('error', __('The UserTransaction can`t be deleted because it is related to another table.'));
        }
    }
}
