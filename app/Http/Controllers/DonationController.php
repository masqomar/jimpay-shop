<?php

namespace App\Http\Controllers;


use App\Models\Donation;
use App\Http\Requests\{StoreDonationRequest, UpdateDonationRequest};
use Yajra\DataTables\Facades\DataTables;

class DonationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view donation')->only('index', 'show');
        $this->middleware('permission:create donation')->only('create', 'store');
        $this->middleware('permission:edit donation')->only('edit', 'update');
        $this->middleware('permission:delete donation')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $donations = Donation::with('user:id,name');

            return DataTables::of($donations)
                ->addColumn('description', function($row){
                    return str($row->description)->limit(200);
                })
				->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })->addColumn('action', 'donations.include.action')
                ->toJson();
        }


        return view('donations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonationRequest $request)
    {
        Donation::create($request->validated());

        return redirect()
            ->route('donations.index')
            ->with('success', __('Donation created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        $donation->load('user:id,name');

		return view('donations.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
    {
        $donation->load('user:id,name');

		return view('donations.edit', compact('donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $donation->update($request->validated());

        return redirect()
            ->route('donations.index')
            ->with('success', __('Donation updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        try {
            $donation->delete();

            return redirect()
                ->route('donations.index')
                ->with('success', __('Donation deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('donations.index')
                ->with('error', __('The Donation can`t be deleted because it is related to another table.'));
        }
    }
}
