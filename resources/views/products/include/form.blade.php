<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($product) ? $product->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="price">{{ __('Price') }}</label>
            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ isset($product) ? $product->price : old('price') }}" placeholder="{{ __('Price') }}" required />
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quantity">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($product) ? $product->quantity : old('quantity') }}" placeholder="{{ __('Quantity') }}" required />
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}" required>{{ isset($product) ? $product->description : old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($product)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($product->product_image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Product Image" class="rounded mb-2 mt-2" alt="Product Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/product_images/' . $product->product_image) }}" alt="Product Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="product_image">{{ __('Product Image') }}</label>
                        <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" id="product_image">

                        @error('product_image')
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
                <label for="product_image">{{ __('Product Image') }}</label>
                <input type="file" name="product_image" class="form-control @error('product_image') is-invalid @enderror" id="product_image" required>

                @error('product_image')
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
            <label for="category_id">{{ __('Category') }}</label>
            <select class="form-select" name="category_id" id="category_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select category') }} --</option>
                
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ isset($product) && $product->category_id == $category->id ? 'selected' : (old('category_id') == $category->id ? 'selected' : '') }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user_id">{{ __('User') }}</label>
            <select class="form-select" name="user_id" id="user_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($product) && $product->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-select" name="status" id="status" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select status') }} --</option>
                <option value="0" {{ isset($product) && $product->status == '0' ? 'selected' : (old('status') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($product) && $product->status == '1' ? 'selected' : (old('status') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
        </div>
    </div>
</div>