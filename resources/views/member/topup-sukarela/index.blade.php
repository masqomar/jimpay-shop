@extends ('layouts.theme.front')

@section ('title')
Topup JimPay
@endsection

@section ('content')
<!-- ...:::Start Login Section:::... -->
<div class="login-section mt-115">
    <div class="container">
        <!-- Start User Event Area -->
        <div class="login-wrapper">
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-success" role="alert">
                    {{ session('error') }}
                </div>
                @endif

            </div>
            <form action="{{ route('topup-sukarela.store') }}" class="default-form-wrapper" method="POST">
                @csrf
                @method('POST')

                <ul class="default-form-list">
                    <li class="single-form-item">
                        <label for="topup_amount" class="visually-hidden">Nominal Topup</label>
                        <input type="number" id="topup_amount" name="topup_amount" placeholder="Masukkan nominal topup">
                        <span class="icon"><i class="fa-solid fa-rupiah-sign"></i></span>
                    </li>
                    @error('topup_amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </ul>
                <br>
                <div class="section-content">
                    <h1 class="title">Saldo Sukarela @rupiah($sisaSimSukarela)</h1>
                    <p>Bisa juga topup melalui koperasi di<strong> New Building</strong>
                        Berlaku di jam 07.00 - 17.00 WIB</p>
                </div>
                <div class="page-progress-wrapper">
                    <button type="submit" class="btn btn--block btn--radius btn--size-xlarge btn--color-red btn--bg-maya-blue text-center register-space-top">Top Up Sekarang</button>
                </div>
            </form>

        </div>

        <div class="section-content">
            <p>Mau Topup secara cash?. <a href="{{route('member.topup')}}" class="btn--color-radical-red">Klik aku ya...</a></p>
        </div>
    </div>
</div>
<!-- ...:::End User Event Section:::... -->
@endsection