<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserSaving;
use App\Models\UserTopup;
use App\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberTopupSukarelaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:view menu anggota')->only('index', 'show');
    //     $this->middleware('permission:create menu anggota')->only('create', 'store');
    // }

    public function index()
    {
        $saldoSukarela = UserSaving::where('user_id', auth()->user()->id)->where('kop_product_id', 1)->sum('quantity');
        $topUpJimpay = UserTopup::where('user_id', auth()->user()->id)->where('note', 'Saldo Sukarela')->sum('topup_amount');
        $totalTransaksiTarik = UserTransaction::where('user_id', auth()->user()->id)->where('type', 'tarik')->sum('credit');

        $sisaSimSukarela = $saldoSukarela - $topUpJimpay - $totalTransaksiTarik;

        return view('member.topup-sukarela.index', compact('sisaSimSukarela'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'topup_amount' => 'required|numeric'
        ]);

        // UserTopup::create([
        //     'topup_amount' => $request->topup_amount,
        //     'user_id' => auth()->user()->id,
        //     'date' => Carbon::now(),
        //     'note' => 'Saldo Sukarela'
        // ]);

        $nominalTopup = $request->topup_amount;
        $namaAnggota = auth()->user()->nama;
        $noAnggota = auth()->user()->no_anggota;
        $saldoAkhir = auth()->user()->balance + $nominalTopup;

        $saldoSukarela = UserSaving::where('user_id', auth()->user()->id)->where('kop_product_id', 1)->sum('quantity');
        $topUpJimpay = UserTopup::where('user_id', auth()->user()->id)->where('note', 'Saldo Sukarela')->sum('topup_amount');
        $totalTransaksiTarik = UserTransaction::where('user_id', auth()->user()->id)->where('type', 'tarik')->sum('credit');

        $sisaSimSukarela = $saldoSukarela - $topUpJimpay - $totalTransaksiTarik;
        if ($nominalTopup < $sisaSimSukarela) {
            DB::transaction(
                function () use ($request, $saldoAkhir, $nominalTopup) {
                    User::where('id', auth()->user()->id)
                        ->update([
                            'balance' => $saldoAkhir
                        ]);
                    UserTopup::create([
                        'topup_amount' => $request->topup_amount,
                        'user_id' => auth()->user()->id,
                        'date' => Carbon::now(),
                        'note' => 'Saldo Sukarela'
                    ]);

                    UserTransaction::create([
                        'credit' => 0,
                        'debit' => $nominalTopup,
                        'tipe' => 'topup',
                        'transaction_type' => 'masuk',
                        'date' => Carbon::now(),
                        'user_id' => auth()->user()->id,
                        'methode' => 'otomatis',
                        'note' => 'topup JIMPay saldo simpanan sukarela'
                    ]);
                }
            );
            // $text = "<b>Topup JIMPay Baru</b>\n\n"
            // . "<b>Metode: </b>"
            // . "<b>Ambil Simpanan Sukarela</b>\n"
            // . "<b>Nama: </b>"
            // . "$namaAnggota\n"
            // . "<b>No Anggota: </b>"
            // . "$noAnggota\n"
            // . "<b>Nominal TopUp: </b>"
            // . "$nominalTopup\n"
            // . "<b>Sisa Simpanan Sukarela: </b>"
            // . "$sisaSimSukarela\n\n";

            // Telegram::sendMessage([
            //     'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
            //     'parse_mode' => 'HTML',
            //     'text' => $text
            // ]);

            return redirect()->route('member.topup-sukarela')
                ->with('success', __('Topup saldo JIMPay berhasil.'));
        }
        return redirect()->back()->with('error', 'Simpanan g cukup');
    }
}
