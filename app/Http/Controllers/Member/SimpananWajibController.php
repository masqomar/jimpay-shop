<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserSaving;
use Illuminate\Http\Request;

class SimpananWajibController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view menu anggota')->only('index', 'show');
    // }

    public function index()
    {
        $anggotaID = auth()->user()->id;
        $simpananWajib = UserSaving::where('kop_product_id', 7)
            ->where('user_id', $anggotaID)
            ->sum('quantity');

        return view('member.sim-wajib.index', compact('anggotaID', 'simpananWajib'));
    }

    public function show($id)
    {
        $anggotaID = auth()->user()->id;
        $simpananWajib = UserSaving::where('kop_product_id', 7)
            ->where('user_id', $anggotaID)
            ->get();

        $totalSimpananWajib = UserSaving::where('kop_product_id', 7)
            ->where('user_id', $anggotaID)
            ->sum('quantity');

        // dd($simpananWajib);
        return view('member.sim-wajib.show', compact('simpananWajib', 'anggotaID', 'totalSimpananWajib'));
    }
}
