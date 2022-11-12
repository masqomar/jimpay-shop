<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_id">{{ __('Product') }}</label>
            <select class="form-select" name="product_id" id="product_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select product') }} --</option>
                
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ isset($detailProduct) && $detailProduct->product_id == $product->id ? 'selected' : (old('product_id') == $product->id ? 'selected' : '') }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="variant">{{ __('Variant') }}</label>
            <input type="text" name="variant" id="variant" class="form-control @error('variant') is-invalid @enderror" value="{{ isset($detailProduct) ? $detailProduct->variant : old('variant') }}" placeholder="{{ __('Variant') }}" required />
            @error('variant')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="discount">{{ __('Discount') }}</label>
            <input type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" value="{{ isset($detailProduct) ? $detailProduct->discount : old('discount') }}" placeholder="{{ __('Discount') }}" required />
            @error('discount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>