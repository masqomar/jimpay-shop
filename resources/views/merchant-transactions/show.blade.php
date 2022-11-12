@extends('layouts.app')

@section('title', trans('Detail of MerchantTransactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('MerchantTransactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of merchanttransaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('merchant-transactions.index') }}">{{ __('MerchantTransactions') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Detail') }}
                    </li>
                </x-breadcrumb>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <td class="fw-bold">{{ __('Credit') }}</td>
                                        <td>{{ isset($merchantTransaction->credit) ? $merchantTransaction->credit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Debit') }}</td>
                                        <td>{{ isset($merchantTransaction->debit) ? $merchantTransaction->debit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Type') }}</td>
                                        <td>{{ isset($merchantTransaction->type) ? $merchantTransaction->type : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Transaction Type') }}</td>
                                        <td>{{ isset($merchantTransaction->transaction_type) ? $merchantTransaction->transaction_type : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($merchantTransaction->date) ? $merchantTransaction->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $merchantTransaction->user ? $merchantTransaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $merchantTransaction->user ? $merchantTransaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Method') }}</td>
                                        <td>{{ isset($merchantTransaction->method) ? $merchantTransaction->method : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Note') }}</td>
                                        <td>{{ isset($merchantTransaction->note) ? $merchantTransaction->note : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $merchantTransaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $merchantTransaction->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                </table>
                            </div>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
