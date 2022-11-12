<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserTopup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MemberTopupController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view anggota')->only('index', 'show');
    //     $this->middleware('permission:create anggota')->only('create', 'store');
    // }

    public function index()
    {
        return view('member.topup.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'topup_amount' => 'required|numeric'
        ]);

        UserTopup::create([
            'topup_amount' => $request->topup_amount,
            'user_id' => auth()->user()->id,
            'date' => Carbon::now(),
            'note' => 'Topup Cash'
        ]);

        return redirect()
            ->route('member.topup.konfirmasi')
            ->with('success', __('Topup created successfully.'));
    }

    public function konfirmasi()
    {
        return view('member.topup.konfirmasi');
    }
}
