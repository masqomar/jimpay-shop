@extends('layouts.app')

@section('title', trans('Detail of UserTopups'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('UserTopups') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of usertopup.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('user-topups.index') }}">{{ __('UserTopups') }}</a>
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
                                        <td class="fw-bold">{{ __('Topup Amount') }}</td>
                                        <td>{{ isset($userTopup->topup_amount) ? $userTopup->topup_amount : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $userTopup->user ? $userTopup->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($userTopup->date) ? $userTopup->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Note') }}</td>
                                        <td>{{ isset($userTopup->note) ? $userTopup->note : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $userTopup->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $userTopup->updated_at->format('d/m/Y H:i') }}</td>
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
