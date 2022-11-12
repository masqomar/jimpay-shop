@extends('layouts.app')

@section('title', trans('Detail of UserSavings'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('UserSavings') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of usersaving.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-savings.index') }}">{{ __('UserSavings') }}</a>
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
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userSaving->user ? $userSaving->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('KopProduct') }}</td>
                                        <td>{{ $userSaving->kop_product ? $userSaving->kop_product->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Quantity') }}</td>
                                        <td>{{ isset($userSaving->quantity) ? $userSaving->quantity : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Month') }}</td>
                                        <td>{{ isset($userSaving->month) ? $userSaving->month->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Year') }}</td>
                                        <td>{{ isset($userSaving->year) ? $userSaving->year : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Deposit Date') }}</td>
                                        <td>{{ isset($userSaving->deposit_date) ? $userSaving->deposit_date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userSaving->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userSaving->updated_at->format('d/m/Y H:i') }}</td>
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
