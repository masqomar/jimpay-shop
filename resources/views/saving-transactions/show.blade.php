@extends('layouts.app')

@section('title', trans('Detail of SavingTransactions'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('SavingTransactions') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of savingtransaction.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('saving-transactions.index') }}">{{ __('SavingTransactions') }}</a>
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
                                        <td>{{ $savingTransaction->user ? $savingTransaction->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('KopProduct') }}</td>
                                        <td>{{ $savingTransaction->kop_product ? $savingTransaction->kop_product->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Amount') }}</td>
                                        <td>{{ isset($savingTransaction->amount) ? $savingTransaction->amount : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($savingTransaction->date) ? $savingTransaction->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Description') }}</td>
                                        <td>{{ isset($savingTransaction->description) ? $savingTransaction->description : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ isset($savingTransaction->status) ? $savingTransaction->status : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Image') }}</td>
                                        <td>
                                            @if ($savingTransaction->image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/images/' . $savingTransaction->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $savingTransaction->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $savingTransaction->updated_at->format('d/m/Y H:i') }}</td>
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
