<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($kopProduct) ? $kopProduct->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($kopProduct)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($kopProduct->image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/images/' . $kopProduct->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_type_id">{{ __('ProductType') }}</label>
            <select class="form-select" name="product_type_id" id="product_type_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select producttype') }} --</option>
                
                @foreach ($productTypes as $productType)
                    <option value="{{ $productType->id }}" {{ isset($kopProduct) && $kopProduct->product_type_id == $productType->id ? 'selected' : (old('product_type_id') == $productType->id ? 'selected' : '') }}>
                        {{ $productType->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($kopProduct) ? $kopProduct->description : old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>