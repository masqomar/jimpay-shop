@extends ('layouts.theme.front')

@section ('title')
Topup JimPay
@endsection

@section ('content')
<div class="login-section mt-115">
    <div class="container">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="row">
            <form action="{{ route('topup.store') }}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" name="topup_amount" min="10000" placeholder="Masukan Nominal Topup" required>
                </div>
        </div>
        <div class="alert alert-warning">
            <div class="media">
                <div class="icon icon-40 bg-white text-success mr-2 rounded-circle"></div>
                <div class="media-inner">
                    <h6 class="mb-0 font-weight-normal">
                        <small>Bisa juga topup manual (cash) melalui koperasi di New Building</small><br>
                        <small>Berlaku di jam <b>07.00 - 17.00 WIB</b></small>
                        <br><br>
                        <small>atau topup otomatis menggunakan saldo Simpanan Sukarela <a href="{{route('member.topup-sukarela')}}">Klik aku disini ya...</a> </small><br>
                        <small>Transaksi <b>24 jam Non-Stop</b></small>
                    </h6>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn--bg-maya-blue w-100 d-flex align-items-center justify-content-center" type="submit">Top Up Sekarang
        </button>
        <br>
        <a href="{{route('member.dashboard')}}" class="btn btn-sm btn--bg-pink-swan w-100 d-flex align-items-center justify-content-center">Batal</a>
    </div>
</div>
@endsection

@stack('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">