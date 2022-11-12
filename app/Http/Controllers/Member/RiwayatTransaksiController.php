<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTransaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RiwayatTransaksiController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view menu anggota')->only('index', 'show');
    // }

    public function index()
    {
        // $anggota = Auth::user()->id;
        $riwayatTransaksiAll = UserTransaction::where('user_id', auth()->user()->id)
            ->orderBy('id', 'DESC')
            ->paginate(5);

        return view('member.transaksi.index', compact('riwayatTransaksiAll'));
    }

    public function show($id)
    {
        $detailtransaksi = UserTransaction::where('id', $id)->get();

        // dd($detailtransaksi);

        return view('member.transaksi.show', compact('detailtransaksi'));
    }
}
