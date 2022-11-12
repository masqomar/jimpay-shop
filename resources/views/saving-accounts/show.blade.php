@extends('layouts.app')

@section('title', trans('Detail of SavingAccounts'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('SavingAccounts') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of savingaccount.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('saving-accounts.index') }}">{{ __('SavingAccounts') }}</a>
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
                                        <td class="fw-bold">{{ __('Code') }}</td>
                                        <td>{{ isset($savingAccount->code) ? $savingAccount->code : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Name') }}</td>
                                        <td>{{ isset($savingAccount->name) ? $savingAccount->name : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Description') }}</td>
                                        <td>{{ isset($savingAccount->description) ? $savingAccount->description : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $savingAccount->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $savingAccount->updated_at->format('d/m/Y H:i') }}</td>
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
