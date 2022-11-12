<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\SavingTransaction;
use App\Models\UserSaving;
use App\Models\UserTopup;
use App\Models\UserTransaction;
use Illuminate\Http\Request;

class SimpananSukarelaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view menu anggota')->only('index', 'show');
    // }

    public function index()
    {
        $anggotaID = auth()->user()->id;
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 1)->where('user_id', $anggotaID)->sum('quantity');
        $totalTransaksiTarik = UserTransaction::where('user_id', $anggotaID)->where('type', 'tarik')->sum('credit');
        $totalTopUpSukarela = UserTopup::where('user_id', $anggotaID)->where('note', 'Saldo Sukarela')->sum('topup_amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        return view('member.sim-sukarela.index', compact('anggotaID', 'saldoSukarela'));
    }

    public function show($id)
    {
        $anggotaID = auth()->user()->id;
        $simpananSukarela = UserSaving::where('kop_product_id', 1)
            ->where('user_id', $id)->get();

        $totalSimpananSukarela = UserSaving::where('kop_product_id', 1)->where('user_id', $id)->sum('quantity');
        $totalTransaksiTarik = UserTransaction::where('user_id', $id)->where('type', 'tarik')->sum('credit');
        $totalTopUpSukarela = UserTopup::where('user_id', $id)->where('note', 'Saldo Sukarela')->sum('topup_amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        // dd($detailPenarikanDana);
        return view('member.sim-sukarela.show', compact('anggotaID', 'simpananSukarela', 'totalSimpananSukarela', 'totalTransaksiTarik', 'totalTopUpSukarela', 'saldoSukarela'));
    }

    public function tarik()
    {
        $anggotaID = auth()->user()->id;
        $totalSimpananSukarela = UserSaving::where('kop_product_id', 1)->where('user_id', $anggotaID)->sum('quantity');
        $totalTransaksiTarik = UserTransaction::where('user_id', $anggotaID)->where('type', 'tarik')->sum('credit');
        $totalTopUpSukarela = UserTopup::where('user_id', $anggotaID)->where('note', 'Saldo Sukarela')->sum('topup_amount');

        $saldoSukarela = $totalSimpananSukarela - $totalTransaksiTarik - $totalTopUpSukarela;

        return view('member.sim-sukarela.tarik', compact('saldoSukarela'));
    }

    public function cairkan()
    {
        return view('member.sim-sukarela.cairkan');
    }

    public function tarikStore(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        SavingTransaction::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'date' => now(),
            'user_id' => auth()->user()->id,
            'kop_product_id' => 1,
            'status' => 'Diproses'
        ]);

        return redirect()->route('member.sim-sukarela.index')
            ->with('success', 'Pengajuan pencairan terkirim');
    }

    public function detail($id)
    {
        $anggotaID = auth()->user()->id;
        $detailPenarikanSukarela = SavingTransaction::where('user_id', $id)->where('kop_product_id', 1)->get();
        $totalPenarikanSukarela = SavingTransaction::where('user_id', $id)
            ->where('kop_product_id', 1)
            ->where('status', 'Sukses')
            ->sum('amount');

        return view('member.sim-sukarela.detail', compact('anggotaID', 'detailPenarikanSukarela', 'totalPenarikanSukarela'));
    }
}
