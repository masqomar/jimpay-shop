@extends('layouts.app')

@section('title', trans('Detail of DonationDisbursements'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('DonationDisbursements') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of donationdisbursement.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('donation-disbursements.index') }}">{{ __('DonationDisbursements') }}</a>
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
                                        <td class="fw-bold">{{ __('Donation') }}</td>
                                        <td>{{ $donationDisbursement->donation ? $donationDisbursement->donation->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $donationDisbursement->user ? $donationDisbursement->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Date') }}</td>
                                        <td>{{ isset($donationDisbursement->date) ? $donationDisbursement->date->format('d/m/Y') : '-'  }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Amount') }}</td>
                                        <td>{{ isset($donationDisbursement->amount) ? $donationDisbursement->amount : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Recipient') }}</td>
                                        <td>{{ isset($donationDisbursement->recipient) ? $donationDisbursement->recipient : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Image') }}</td>
                                        <td>
                                            @if ($donationDisbursement->image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/images/' . $donationDisbursement->image) }}" alt="Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $donationDisbursement->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $donationDisbursement->updated_at->format('d/m/Y H:i') }}</td>
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
