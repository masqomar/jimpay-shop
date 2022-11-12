<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="user_id">{{ __('User') }}</label>
            <select class="form-select" name="user_id" id="user_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($userSaving) && $userSaving->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kop_product_id">{{ __('KopProduct') }}</label>
            <select class="form-select" name="kop_product_id" id="kop_product_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select kopproduct') }} --</option>
                
                @foreach ($kopProducts as $kopProduct)
                    <option value="{{ $kopProduct->id }}" {{ isset($userSaving) && $userSaving->kop_product_id == $kopProduct->id ? 'selected' : (old('kop_product_id') == $kopProduct->id ? 'selected' : '') }}>
                        {{ $kopProduct->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="quantity">{{ __('Quantity') }}</label>
            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ isset($userSaving) ? $userSaving->quantity : old('quantity') }}" placeholder="{{ __('Quantity') }}" required />
            @error('quantity')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="month">{{ __('Month') }}</label>
            <input type="date" name="month" id="month" class="form-control @error('month') is-invalid @enderror" value="{{ isset($userSaving) && $userSaving->month ? $userSaving->month->format('Y-m-d') : old('month') }}" placeholder="{{ __('Month') }}" required />
            @error('month')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="year">{{ __('Year') }}</label>
            <select class="form-select" name="year" id="year" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select year') }} --</option>
                
                @foreach (range(1900, strftime("%Y", time())) as $year)
                    <option value="{{ $year }}" {{ isset($userSaving) && $userSaving->year == $year ? 'selected' : (old('year') == $year ? 'selected' : '') }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="deposit_date">{{ __('Deposit Date') }}</label>
            <input type="date" name="deposit_date" id="deposit_date" class="form-control @error('deposit_date') is-invalid @enderror" value="{{ isset($userSaving) && $userSaving->deposit_date ? $userSaving->deposit_date->format('Y-m-d') : old('deposit_date') }}" placeholder="{{ __('Deposit Date') }}" required />
            @error('deposit_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>