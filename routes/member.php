<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneratorController;



Route::prefix('member')->group(function () {
    Route::middleware(['auth', 'web'])->group(function () {
        Route::get('dashboard', [\App\Http\Controllers\Member\MemberDashboardController::class, 'index'])->name('member.dashboard');

        Route::get('produk-member', [\App\Http\Controllers\Member\ProdukMemberController::class, 'index'])->name('member.produk-member.index');

        Route::get('topup', [\App\Http\Controllers\Member\MemberTopupController::class, 'index'])->name('member.topup');
        Route::post('topup', [\App\Http\Controllers\Member\MemberTopupController::class, 'store'])->name('topup.store');
        Route::get('konfirmasi', [\App\Http\Controllers\Member\MemberTopupController::class, 'konfirmasi'])->name('member.topup.konfirmasi');
        Route::get('topup-sukarela', [\App\Http\Controllers\Member\MemberTopupSukarelaController::class, 'index'])->name('member.topup-sukarela');
        Route::post('topup-sukarela', [\App\Http\Controllers\Member\MemberTopupSukarelaController::class, 'store'])->name('topup-sukarela.store');

        Route::get('sim-wajib', [\App\Http\Controllers\Member\SimpananWajibController::class, 'index'])->name('member.sim-wajib');
        Route::get('sim-wajib/{id}', [\App\Http\Controllers\Member\SimpananWajibController::class, 'show'])->name('member.sim-wajib.show');

        Route::get('sim-sukarela', [\App\Http\Controllers\Member\SimpananSukarelaController::class, 'index'])->name('member.sim-sukarela.index');
        Route::get('sim-sukarela/{id}', [\App\Http\Controllers\Member\SimpananSukarelaController::class, 'show'])->name('member.sim-sukarela.show');
        Route::get('tarik', [\App\Http\Controllers\Member\SimpananSukarelaController::class, 'tarik'])->name('member.sim-sukarela.tarik');
        Route::post('sim-sukarela/tarikStore', [\App\Http\Controllers\Member\SimpananSukarelaController::class, 'tarikStore'])->name('member.sim-sukarela.tarikStore');
        Route::get('sim-sukarela/detail/{id}', [\App\Http\Controllers\Member\SimpananSukarelaController::class, 'detail'])->name('member.sim-sukarela.detail');

        Route::get('transaksi', [\App\Http\Controllers\Member\RiwayatTransaksiController::class, 'index'])->name('member.transaksi.index');
        Route::get('transaksi/{id}', [\App\Http\Controllers\Member\RiwayatTransaksiController::class, 'show'])->name('member.transaksi.show');
    });
});
