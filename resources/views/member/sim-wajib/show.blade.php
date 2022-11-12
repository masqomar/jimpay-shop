@extends ('layouts.theme.front')

@section ('title')
Detail Wajib
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
                        @forelse ($simpananWajib as $wajib)
                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <td>{{ $wajib->month}}</td>
                            <td>{{ $wajib->deposit_date}}</td>
                            <td>@rupiah ($wajib->quantity)</td>
                        </tr>
                        @endif
                        @empty
                        <td colspan="3">Belum ada simpanan</td>
                        @endforelse

                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <th colspan="2" class="text-center">Total Simpanan Wajib</th>
                            <td><strong>@rupiah($totalSimpananWajib)</strong></td>
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