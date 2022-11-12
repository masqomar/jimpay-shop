@extends('layouts.app')

@section('title', trans('Detail of Paylaters'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Paylaters') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of paylater.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('paylaters.index') }}">{{ __('Paylaters') }}</a>
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
                                        <td>{{ isset($paylater->code) ? $paylater->code : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $paylater->user ? $paylater->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('PaylaterProvider') }}</td>
                                        <td>{{ $paylater->paylater_provider ? $paylater->paylater_provider->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Bank') }}</td>
                                        <td>{{ $paylater->bank ? $paylater->bank->code : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Bank Account Number') }}</td>
                                        <td>{{ isset($paylater->bank_account_number) ? $paylater->bank_account_number : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Bank Account Name') }}</td>
                                        <td>{{ isset($paylater->bank_account_name) ? $paylater->bank_account_name : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Start Date') }}</td>
                                        <td>{{ isset($paylater->start_date) ? $paylater->start_date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ isset($paylater->status) ? $paylater->status : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Amount') }}</td>
                                        <td>{{ isset($paylater->amount) ? $paylater->amount : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Duration') }}</td>
                                        <td>{{ isset($paylater->duration) ? $paylater->duration : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Finish Date') }}</td>
                                        <td>{{ isset($paylater->finish_date) ? $paylater->finish_date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Note') }}</td>
                                        <td>{{ isset($paylater->note) ? $paylater->note : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Image') }}</td>
                                        <td>
                                            @if ($paylater->image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/images/' . $paylater->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $paylater->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $paylater->updated_at->format('d/m/Y H:i') }}</td>
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
