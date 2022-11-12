@extends ('layouts.theme.front')

@section ('title')
Detail Pencairan
@endsection

@section ('content')

<div class="login-section mt-115">
    <div class="container">
        <div class="page-progress-wrapper">
            <div class="section-content">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Nominal</th>
                            <th>Status</th>
                            <th>Bukti Pencairan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($detailPenarikanSukarela as $penarikanSukarela)
                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <td>{{ $penarikanSukarela->date}}</td>
                            <td>@rupiah ($penarikanSukarela->amount)</td>
                            <td>{{ $penarikanSukarela->status}}</td>
                            <td>
                                <img src="" class="rounded" style="width: 50px">
                            </td>
                        </tr>
                        @endif
                        @empty
                        <td colspan="3">Belum ada penarikan</td>
                        @endforelse

                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <th colspan="2" class="text-center">Total Penarikan Simpanan Sukarela</th>
                            <td><strong>@rupiah($totalPenarikanSukarela)</strong></td>
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