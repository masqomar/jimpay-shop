@extends ('layouts.theme.front')

@section ('title')
Cairkan Sukarela
@endsection

@section ('content')
<div class="login-section mt-115">
    <div class="container">
        <div class="login-wrapper">

            <form action="{{ route('member.sim-sukarela.tarikStore') }}" class="default-form-wrapper" method="POST">
                @csrf
                @method('POST')

                <ul class="default-form-list">
                    <li class="single-form-item">
                        <label for="amount" class="visually-hidden">Nominal Pencairan</label>
                        <input type="number" id="amount" name="amount" placeholder="Masukkan nominal pencairan">
                        <span class="icon"><i class="fa-solid fa-rupiah-sign"></i></span>
                    </li>
                    @error('amount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </ul>
                <div>
                    <label>Keperluan?</label>
                    <textarea rows="3" class="form-control" name="description" placeholder="Isi keterangan keperluan kamyu" required></textarea>
                </div>
                <br>
                <div class="section-content">
                    <h1 class="title">Saldo Sukarela @rupiah($saldoSukarela)</h1>
                </div>
                <div class="page-progress-wrapper">
                    <button type="submit" class="btn btn--block btn--radius btn--size-xlarge btn--color-red btn--bg-maya-blue text-center register-space-top">Cairkan</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection