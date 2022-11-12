<?php

namespace App\Http\Controllers;


use App\Models\UserTransactionItem;
use App\Http\Requests\{StoreUserTransactionItemRequest, UpdateUserTransactionItemRequest};
use Yajra\DataTables\Facades\DataTables;

class UserTransactionItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view usertransactionitem')->only('index', 'show');
        $this->middleware('permission:create usertransactionitem')->only('create', 'store');
        $this->middleware('permission:edit usertransactionitem')->only('edit', 'update');
        $this->middleware('permission:delete usertransactionitem')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $userTransactionItems = UserTransactionItem::with('user_transaction:id,credit', 'user:id,name', 'product:id,name', 'merchant');

            return DataTables::of($userTransactionItems)
                ->addColumn('address', function ($row) {
                    return str($row->address)->limit(200);
                })
                ->addColumn('buyer_note', function ($row) {
                    return str($row->buyer_note)->limit(200);
                })
                ->addColumn('user_transaction', function ($row) {
                    return $row->user_transaction ? $row->user_transaction->credit : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('product', function ($row) {
                    return $row->product ? $row->product->name : '-';
                })->addColumn('merchant', function ($row) {
                    return $row->merchant ? $row->merchant->name : '-';
                })->addColumn('action', 'user-transaction-items.include.action')
                ->toJson();
        }


        return view('user-transaction-items.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-transaction-items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTransactionItemRequest $request)
    {
        UserTransactionItem::create($request->validated());

        return redirect()
            ->route('user-transaction-items.index')
            ->with('success', __('UserTransactionItem created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserTransactionItem  $userTransactionItem
     * @return \Illuminate\Http\Response
     */
    public function show(UserTransactionItem $userTransactionItem)
    {
        $userTransactionItem->load('user_transaction:id,credit', 'user:id,name', 'product:id,name', 'user:id,name');

        return view('user-transaction-items.show', compact('usertransactionitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserTransactionItem  $userTransactionItem
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTransactionItem $userTransactionItem)
    {
        $userTransactionItem->load('user_transaction:id,credit', 'user:id,name', 'product:id,name', 'user:id,name');

        return view('user-transaction-items.edit', compact('usertransactionitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserTransactionItem  $userTransactionItem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserTransactionItemRequest $request, UserTransactionItem $userTransactionItem)
    {
        $userTransactionItem->update($request->validated());

        return redirect()
            ->route('user-transaction-items.index')
            ->with('success', __('UserTransactionItem updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserTransactionItem  $userTransactionItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserTransactionItem $userTransactionItem)
    {
        try {
            $userTransactionItem->delete();

            return redirect()
                ->route('user-transaction-items.index')
                ->with('success', __('UserTransactionItem deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('user-transaction-items.index')
                ->with('error', __('The UserTransactionItem can`t be deleted because it is related to another table.'));
        }
    }
}
