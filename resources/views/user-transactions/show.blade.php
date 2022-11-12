@extends('layouts.app')

@section('title', trans('Detail of UserTransactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('UserTransactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of usertransaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-transactions.index') }}">{{ __('UserTransactions') }}</a>
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
                                        <td>{{ isset($userTransaction->credit) ? $userTransaction->credit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Debit') }}</td>
                                        <td>{{ isset($userTransaction->debit) ? $userTransaction->debit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Type') }}</td>
                                        <td>{{ isset($userTransaction->type) ? $userTransaction->type : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Transaction Type') }}</td>
                                        <td>{{ isset($userTransaction->transaction_type) ? $userTransaction->transaction_type : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($userTransaction->date) ? $userTransaction->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userTransaction->user ? $userTransaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Methode') }}</td>
                                        <td>{{ isset($userTransaction->methode) ? $userTransaction->methode : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Note') }}</td>
                                        <td>{{ isset($userTransaction->note) ? $userTransaction->note : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userTransaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userTransaction->updated_at->format('d/m/Y H:i') }}</td>
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
