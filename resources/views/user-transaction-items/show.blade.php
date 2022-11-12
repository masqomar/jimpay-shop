@extends('layouts.app')

@section('title', trans('Detail of UserTransactionItems'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('UserTransactionItems') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of usertransactionitem.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-transaction-items.index') }}">{{ __('UserTransactionItems') }}</a>
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
                                        <td class="fw-bold">{{ __('UserTransaction') }}</td>
                                        <td>{{ $userTransactionItem->user_transaction ? $userTransactionItem->user_transaction->credit : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userTransactionItem->user ? $userTransactionItem->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Address') }}</td>
                                        <td>{{ isset($userTransactionItem->address) ? $userTransactionItem->address : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Buyer Note') }}</td>
                                        <td>{{ isset($userTransactionItem->buyer_note) ? $userTransactionItem->buyer_note : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Total Price') }}</td>
                                        <td>{{ isset($userTransactionItem->total_price) ? $userTransactionItem->total_price : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Shipping Fee') }}</td>
                                        <td>{{ isset($userTransactionItem->shipping_fee) ? $userTransactionItem->shipping_fee : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Transaction Fee') }}</td>
                                        <td>{{ isset($userTransactionItem->transaction_fee) ? $userTransactionItem->transaction_fee : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Product') }}</td>
                                        <td>{{ $userTransactionItem->product ? $userTransactionItem->product->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Quantity') }}</td>
                                        <td>{{ isset($userTransactionItem->quantity) ? $userTransactionItem->quantity : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userTransactionItem->user ? $userTransactionItem->user->name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userTransactionItem->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userTransactionItem->updated_at->format('d/m/Y H:i') }}</td>
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
