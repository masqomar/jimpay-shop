<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="merchant_code">{{ __('User') }}</label>
            <select class="form-select" name="merchant_code" id="merchant_code" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($merchant) && $merchant->merchant_code == $user->id ? 'selected' : (old('merchant_code') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}" required>{{ isset($merchant) ? $merchant->description : old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="created_by">{{ __('User') }}</label>
            <select class="form-select" name="created_by" id="created_by" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($merchant) && $merchant->created_by == $user->id ? 'selected' : (old('created_by') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>