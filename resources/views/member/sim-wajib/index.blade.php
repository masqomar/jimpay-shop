@extends ('layouts.theme.front')

@section ('title')
Simpanan Wajib
@endsection

@section ('content')
<!-- ...:::Start Login Section:::... -->
<div class="login-section mt-115">
    <div class="container">
        <!-- Start User Event Area -->
        <div class="page-progress-wrapper">
            <div class="section-content">
                <table class="styled-table">
                    <tbody>
                        <tr>
                            <td>No Anggota</td>
                            <td>{{ Auth::user()->no_anggota }}</td>
                        </tr>
                        <tr>
                            <td>Nama Anggota</td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <td>Produk Simpanan</td>
                            <td>Simpanan Wajib</td>
                        </tr>
                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <td>Total Simpanan</td>
                            <td>@rupiah($simpananWajib)</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <a href="{{ route('member.sim-wajib.show', $anggotaID) }}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center">Detail</a>
                <br>
                <a href="{{route('member.dashboard')}}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection

@stack('css')
<link rel="stylesheet" href="{{asset('assets')}}/css/tabel.css">