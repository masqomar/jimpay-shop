@extends ('layouts.theme.front')

@section ('title')
Detail Transaksi
@endsection

@section ('content')
<div class="login-section mt-115">
    <div class="container">
        <div class="section-content">

            <div class="card">
                <div class="card-body">
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <th scope="col">No Anggota</th>
                                <td>{{ auth()->user()->no_anggota }}</td>
                            </tr>
                            <tr>
                                <th scope="col">Nama Anggota</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            @foreach ($detailtransaksi as $detail)
                            <tr>
                                <th scope="col">Tanggal</th>
                                <td> {{$detail->date}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Jenis</th>
                                <td> {{$detail->type}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Keterangan</th>
                                <td> {{$detail->note}}</td>
                            </tr>
                            <tr>
                                <th scope="col">Type</th>
                                <td>
                                    <span class="badge {{ ($detail->transaction_type == 'masuk') ? 'bg-success' : 'bg-danger' }} ">{{$detail->transaction_type}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="col">Nominal</th>
                                <td>
                                    <span class="badge {{ ($detail->transaction_type == 'masuk') ? 'bg-success' : 'bg-danger' }} ">@rupiah($detail->credit)</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <div class="text-center">
            <a class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center" href="{{route('member.transaksi.index')}}" role="button">Kembali</a>
        </div>
    </div>
</div>

@endsection

@stack('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">