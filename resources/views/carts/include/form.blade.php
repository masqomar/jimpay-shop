<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_id">{{ __('Product') }}</label>
            <select class="form-select" name="product_id" id="product_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select product') }} --</option>
                
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ isset($cart) && $cart->product_id == $product->id ? 'selected' : (old('product_id') == $product->id ? 'selected' : '') }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="merchant_id">{{ __('User') }}</label>
            <select class="form-select" name="merchant_id" id="merchant_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($cart) && $cart->merchant_id == $user->id ? 'selected' : (old('merchant_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
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
                    <option value="{{ $user->id }}" {{ isset($cart) && $cart->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quantity">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($cart) ? $cart->quantity : old('quantity') }}" placeholder="{{ __('Quantity') }}" required />
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>