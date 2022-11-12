<?php

namespace App\Http\Controllers;


use App\Models\DonationDisbursement;
use App\Http\Requests\{StoreDonationDisbursementRequest, UpdateDonationDisbursementRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class DonationDisbursementController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view donationdisbursement')->only('index', 'show');
        $this->middleware('permission:create donationdisbursement')->only('create', 'store');
        $this->middleware('permission:edit donationdisbursement')->only('edit', 'update');
        $this->middleware('permission:delete donationdisbursement')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $donationDisbursements = DonationDisbursement::with('donation:id,name', 'user:id,name');

            return Datatables::of($donationDisbursements)
                ->addColumn('donation', function ($row) {
                    return $row->donation ? $row->donation->name : '-';
                })->addColumn('user', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })
                ->addColumn('image', function ($row) {
                    if ($row->image == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/images/' . $row->image);
                })

                ->addColumn('action', 'donation-disbursements.include.action')
                ->toJson();
        }

        return view('donation-disbursements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('donation-disbursements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDonationDisbursementRequest $request)
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

        DonationDisbursement::create($attr);

        return redirect()
            ->route('donation-disbursements.index')
            ->with('success', __('DonationDisbursement created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DonationDisbursement $donationDisbursement
     * @return \Illuminate\Http\Response
     */
    public function show(DonationDisbursement $donationDisbursement)
    {
        $donationDisbursement->load('donation:id,name', 'user:id,name');

		return view('donation-disbursements.show', compact('donationDisbursement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DonationDisbursement $donationDisbursement
     * @return \Illuminate\Http\Response
     */
    public function edit(DonationDisbursement $donationDisbursement)
    {
        $donationDisbursement->load('donation:id,name', 'user:id,name');

		return view('donation-disbursements.edit', compact('donationDisbursement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DonationDisbursement $donationDisbursement
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationDisbursementRequest $request, DonationDisbursement $donationDisbursement)
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
            if ($donationDisbursement->image != null && file_exists($path . $donationDisbursement->image)) {
                unlink($path . $donationDisbursement->image);
            }

            $attr['image'] = $filename;
        }

        $donationDisbursement->update($attr);

        return redirect()
            ->route('donation-disbursements.index')
            ->with('success', __('DonationDisbursement updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DonationDisbursement $donationDisbursement
     * @return \Illuminate\Http\Response
     */
    public function destroy(DonationDisbursement $donationDisbursement)
    {
        try {
            $path = storage_path('app/public/uploads/images/');

            if ($donationDisbursement->image != null && file_exists($path . $donationDisbursement->image)) {
                unlink($path . $donationDisbursement->image);
            }

            $donationDisbursement->delete();

            return redirect()
                ->route('donation-disbursements.index')
                ->with('success', __('DonationDisbursement deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('donation-disbursements.index')
                ->with('error', __('The DonationDisbursement can`t be deleted because it is related to another table.'));
        }
    }
}
