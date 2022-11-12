<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user_transaction_id">{{ __('UserTransaction') }}</label>
            <select class="form-select" name="user_transaction_id" id="user_transaction_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select usertransaction') }} --</option>
                
                @foreach ($userTransactions as $userTransaction)
                    <option value="{{ $userTransaction->id }}" {{ isset($userTransactionItem) && $userTransactionItem->user_transaction_id == $userTransaction->id ? 'selected' : (old('user_transaction_id') == $userTransaction->id ? 'selected' : '') }}>
                        {{ $userTransaction->credit }}
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
                    <option value="{{ $user->id }}" {{ isset($userTransactionItem) && $userTransactionItem->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">{{ __('Address') }}</label>
            <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('Address') }}" required>{{ isset($userTransactionItem) ? $userTransactionItem->address : old('address') }}</textarea>
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="buyer_note">{{ __('Buyer Note') }}</label>
            <textarea name="buyer_note" id="buyer_note" class="form-control @error('buyer_note') is-invalid @enderror" placeholder="{{ __('Buyer Note') }}" required>{{ isset($userTransactionItem) ? $userTransactionItem->buyer_note : old('buyer_note') }}</textarea>
            @error('buyer_note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="total_price">{{ __('Total Price') }}</label>
            <input type="number" name="total_price" id="total_price" class="form-control @error('total_price') is-invalid @enderror" value="{{ isset($userTransactionItem) ? $userTransactionItem->total_price : old('total_price') }}" placeholder="{{ __('Total Price') }}" required />
            @error('total_price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="shipping_fee">{{ __('Shipping Fee') }}</label>
            <input type="number" name="shipping_fee" id="shipping_fee" class="form-control @error('shipping_fee') is-invalid @enderror" value="{{ isset($userTransactionItem) ? $userTransactionItem->shipping_fee : old('shipping_fee') }}" placeholder="{{ __('Shipping Fee') }}" required />
            @error('shipping_fee')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction_fee">{{ __('Transaction Fee') }}</label>
            <input type="number" name="transaction_fee" id="transaction_fee" class="form-control @error('transaction_fee') is-invalid @enderror" value="{{ isset($userTransactionItem) ? $userTransactionItem->transaction_fee : old('transaction_fee') }}" placeholder="{{ __('Transaction Fee') }}" required />
            @error('transaction_fee')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="product_id">{{ __('Product') }}</label>
            <select class="form-select" name="product_id" id="product_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select product') }} --</option>
                
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ isset($userTransactionItem) && $userTransactionItem->product_id == $product->id ? 'selected' : (old('product_id') == $product->id ? 'selected' : '') }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quantity">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($userTransactionItem) ? $userTransactionItem->quantity : old('quantity') }}" placeholder="{{ __('Quantity') }}" required />
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="merchant_id">{{ __('User') }}</label>
            <select class="form-select" name="merchant_id" id="merchant_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($userTransactionItem) && $userTransactionItem->merchant_id == $user->id ? 'selected' : (old('merchant_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>