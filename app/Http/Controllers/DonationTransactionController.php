<?php

namespace App\Http\Controllers;


use App\Models\DonationTransaction;
use App\Http\Requests\{StoreDonationTransactionRequest, UpdateDonationTransactionRequest};
use Yajra\DataTables\Facades\DataTables;

class DonationTransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view donationtransaction')->only('index', 'show');
        $this->middleware('permission:create donationtransaction')->only('create', 'store');
        $this->middleware('permission:edit donationtransaction')->only('edit', 'update');
        $this->middleware('permission:delete donationtransaction')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $donationTransactions = DonationTransaction::with('donation:id,name', 'user:id,name');

            return DataTables::of($donationTransactions)
                ->addColumn('donation', function ($row) {
                    return $row->donation ? $row->donation->name : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'donation-transactions.include.action')
                ->toJson();
        }


        return view('donation-transactions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donation-transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonationTransactionRequest $request)
    {
        DonationTransaction::create($request->validated());

        return redirect()
            ->route('donation-transactions.index')
            ->with('success', __('DonationTransaction created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonationTransaction  $donationTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(DonationTransaction $donationTransaction)
    {
        $donationTransaction->load(
            'donation:id,name',

            'user:id,name'
        );

        return view('donation-transactions.show', compact('donationtransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonationTransaction  $donationTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationTransaction $donationTransaction)
    {
        $donationTransaction->load(
            'donation:id,name',

            'user:id,name'
        );

        return view('donation-transactions.edit', compact('donationtransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonationTransaction  $donationTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationTransactionRequest $request, DonationTransaction $donationTransaction)
    {
        $donationTransaction->update($request->validated());

        return redirect()
            ->route('donation-transactions.index')
            ->with('success', __('DonationTransaction updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonationTransaction  $donationTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationTransaction $donationTransaction)
    {
        try {
            $donationTransaction->delete();

            return redirect()
                ->route('donation-transactions.index')
                ->with('success', __('DonationTransaction deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('donation-transactions.index')
                ->with('error', __('The DonationTransaction can`t be deleted because it is related to another table.'));
        }
    }
}
