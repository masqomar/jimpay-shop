@extends ('layouts.theme.front')

@section ('title')
Sim Sukarela
@endsection

@section ('content')
<!-- ...:::Start Login Section:::... -->
<div class="login-section mt-115">
    <div class="container">
        <!-- Start User Event Area -->
        <div class="page-progress-wrapper">
            <div class="section-content">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif
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
                            <td>Simpanan Sukarela</td>
                        </tr>
                        @if($anggotaID == Auth::user()->id)
                        <tr>
                            <td>Total Simpanan</td>
                            <td>@rupiah($saldoSukarela)</td>
                        </tr>
                        @endif
                        <a href="{{ route('member.sim-sukarela.show', $anggotaID) }}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center">Detail</a>
                    </tbody>
                </table>
                <a href="{{route('member.sim-sukarela.tarik')}}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-dodger-blue text-center">Cairkan</a>

            </div>
        </div>
    </div>
</div>
@endsection

@stack('css')
<link rel="stylesheet" href="{{asset('assets')}}/css/tabel.css">