<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_id">{{ __('Product') }}</label>
            <select class="form-select" name="product_id" id="product_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select product') }} --</option>
                
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ isset($productImage) && $productImage->product_id == $product->id ? 'selected' : (old('product_id') == $product->id ? 'selected' : '') }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    @isset($productImage)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($productImage->image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/images/' . $productImage->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="image">{{ __('Image') }}</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

                        @error('image')
                            <div class="invalid-feedback">
                                <i class="bx bx-radio-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-6">
            <div class="form-group">
                <label for="image">{{ __('Image') }}</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" required>

                @error('image')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>