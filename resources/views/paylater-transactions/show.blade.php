@extends('layouts.app')

@section('title', trans('Detail of PaylaterTransactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('PaylaterTransactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of paylatertransaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('paylater-transactions.index') }}">{{ __('PaylaterTransactions') }}</a>
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
                                        <td class="fw-bold">{{ __('Paylater') }}</td>
                                        <td>{{ $paylaterTransaction->paylater ? $paylaterTransaction->paylater->code : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $paylaterTransaction->user ? $paylaterTransaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Amount') }}</td>
                                        <td>{{ isset($paylaterTransaction->amount) ? $paylaterTransaction->amount : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Note') }}</td>
                                        <td>{{ isset($paylaterTransaction->note) ? $paylaterTransaction->note : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($paylaterTransaction->date) ? $paylaterTransaction->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $paylaterTransaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $paylaterTransaction->updated_at->format('d/m/Y H:i') }}</td>
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
