@extends ('layouts.theme.front')

@section ('title')
Detail Sukarela
@endsection

@section ('content')
<div class="login-section mt-115">
    <div class="container">
        <div class="page-progress-wrapper">
            <div class="section-content">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Periode Bulan</th>
                            <th>Tanggal Setor</th>
                            <th>Nominal Simpanan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($simpananSukarela as $sukarela)
                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <td>{{ $sukarela->month}}</td>
                            <td>{{ $sukarela->deposit_date}}</td>
                            <td>@rupiah ($sukarela->quantity)</td>
                        </tr>
                        @endif
                        @endforeach

                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <th colspan="2" class="text-center">Total Simpanan Sukarela</th>
                            <td><strong>@rupiah($totalSimpananSukarela)</strong></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Total TopUp JIMPay</th>
                            <td><strong>@rupiah($totalTopUpSukarela)</strong></td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Total Penarikan Simpanan</th>
                            <td>
                                <strong>@rupiah($totalTransaksiTarik)</strong>
                            </td>
                            <td>
                                <a href="{{ route('member.sim-sukarela.detail', $anggotaID) }}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center">Detail</a>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Saldo Simpanan Sukarela</th>
                            <td><strong>@rupiah($saldoSukarela)</strong></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <a href="{{route('member.dashboard')}}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-red-orange text-center">Homepage</a>
            </div>
        </div>
    </div>
</div>
@endsection

@stack('css')
<link rel="stylesheet" href="{{asset('assets')}}/css/tabel.css">