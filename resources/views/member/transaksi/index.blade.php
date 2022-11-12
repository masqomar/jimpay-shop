@extends ('layouts.theme.front')

@section ('title')
Riwayat
@endsection

@section ('content')
<div class="login-section mt-115">
    <div class="container">
        <div class="section-content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis</th>
                                <th>Keterangan</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($riwayatTransaksiAll as $riwayatTransaksi)
                            @if($riwayatTransaksi->user->id == Auth::user()->id)
                            <tr>
                                <td>{{ $riwayatTransaksi->date}}</td>
                                <td><span class="badge {{ ($riwayatTransaksi->transaction_type == 'masuk') ? 'bg-success' : 'bg-danger' }} ">{{$riwayatTransaksi->transaction_type}}</span></td>
                                <td>{{ $riwayatTransaksi->note}}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('member.transaksi.show', $riwayatTransaksi->id) }}" role="button">Detail</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('member.dashboard')}}" class="btn btn--block btn--radius btn--size-small btn--color-white btn--bg-maya-blue text-center">Kembali</a>
                </div>
            </div>
            Halaman : {{ $riwayatTransaksiAll->currentPage() }} <br />
            Jumlah Data : {{ $riwayatTransaksiAll->total() }} <br />
            Data Per Halaman : {{ $riwayatTransaksiAll->perPage() }} <br />


            {{ $riwayatTransaksiAll->links() }}
        </div>
    </div>
</div>
@endsection

@stack('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">