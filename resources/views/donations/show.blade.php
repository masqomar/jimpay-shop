@extends('layouts.app')

@section('title', trans('Detail of Donations'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Donations') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of donation.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('donations.index') }}">{{ __('Donations') }}</a>
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
                                        <td class="fw-bold">{{ __('Name') }}</td>
                                        <td>{{ isset($donation->name) ? $donation->name : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Description') }}</td>
                                        <td>{{ isset($donation->description) ? $donation->description : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $donation->user ? $donation->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Target') }}</td>
                                        <td>{{ isset($donation->target) ? $donation->target : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Collect') }}</td>
                                        <td>{{ isset($donation->collect) ? $donation->collect : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ $donation->status == 1 ? 'True' : 'False' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $donation->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $donation->updated_at->format('d/m/Y H:i') }}</td>
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
