@extends('layouts.app')

@section('title', trans('Detail of Products'))

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-8 order-md-1 order-last">
                    <h3>{{ __('Products') }}</h3>
                    <p class="text-subtitle text-muted">
                        {{ __('Detail of product.') }}
                    </p>
                </div>

                <x-breadcrumb>
                    <li class="breadcrumb-item">
                        <a href="/">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('products.index') }}">{{ __('Products') }}</a>
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
                                        <td>{{ isset($product->name) ? $product->name : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Price') }}</td>
                                        <td>{{ isset($product->price) ? $product->price : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Quantity') }}</td>
                                        <td>{{ isset($product->quantity) ? $product->quantity : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Description') }}</td>
                                        <td>{{ isset($product->description) ? $product->description : '-' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Product Image') }}</td>
                                        <td>
                                            @if ($product->product_image == null)
                                            <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Product Image"  class="rounded" width="200" height="150" style="object-fit: cover">
                                            @else
                                                <img src="{{ asset('storage/uploads/product_images/' . $product->product_image) }}" alt="Product Image" class="rounded" width="200" height="150" style="object-fit: cover">
                                            @endif
                                        </td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Category') }}</td>
                                        <td>{{ $product->category ? $product->category->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('User') }}</td>
                                        <td>{{ $product->user ? $product->user->name : '' }}</td>
                                    </tr>
									<tr>
                                        <td class="fw-bold">{{ __('Status') }}</td>
                                        <td>{{ $product->status == 1 ? 'True' : 'False' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Created at') }}</td>
                                        <td>{{ $product->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">{{ __('Updated at') }}</td>
                                        <td>{{ $product->updated_at->format('d/m/Y H:i') }}</td>
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
