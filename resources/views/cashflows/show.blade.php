@extends('layouts.app')

@section('title', trans('Detail of Cashflows'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Cashflows') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of cashflow.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('cashflows.index') }}">{{ __('Cashflows') }}</a>
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
                                        <td class="fw-bold">{{ __('Debit') }}</td>
                                        <td>{{ isset($cashflow->debit) ? $cashflow->debit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Credit') }}</td>
                                        <td>{{ isset($cashflow->credit) ? $cashflow->credit : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Type') }}</td>
                                        <td>{{ isset($cashflow->type) ? $cashflow->type : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('SavingAccount') }}</td>
                                        <td>{{ $cashflow->saving_account ? $cashflow->saving_account->code : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Description') }}</td>
                                        <td>{{ isset($cashflow->description) ? $cashflow->description : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($cashflow->date) ? $cashflow->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $cashflow->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $cashflow->updated_at->format('d/m/Y H:i') }}</td>
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
