<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="credit">{{ __('Credit') }}</label>
            <input type="number" name="credit" id="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ isset($merchantTransaction) ? $merchantTransaction->credit : old('credit') }}" placeholder="{{ __('Credit') }}" required />
            @error('credit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="debit">{{ __('Debit') }}</label>
            <input type="number" name="debit" id="debit" class="form-control @error('debit') is-invalid @enderror" value="{{ isset($merchantTransaction) ? $merchantTransaction->debit : old('debit') }}" placeholder="{{ __('Debit') }}" required />
            @error('debit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">{{ __('Type') }}</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ isset($merchantTransaction) ? $merchantTransaction->type : old('type') }}" placeholder="{{ __('Type') }}" required />
            @error('type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction_type">{{ __('Transaction Type') }}</label>
            <select class="form-select" name="transaction_type" id="transaction_type" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select transaction type') }} --</option>
                <option value="masuk" {{ isset($merchantTransaction) && $merchantTransaction->transaction_type == 'masuk' ? 'selected' : (old('transaction_type') == 'masuk' ? 'selected' : '') }}>masuk</option>
		<option value="keluar" {{ isset($merchantTransaction) && $merchantTransaction->transaction_type == 'keluar' ? 'selected' : (old('transaction_type') == 'keluar' ? 'selected' : '') }}>keluar</option>			
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($merchantTransaction) && $merchantTransaction->date ? $merchantTransaction->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="user_id">{{ __('User') }}</label>
            <select class="form-select" name="user_id" id="user_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select user') }} --</option>
                
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ isset($merchantTransaction) && $merchantTransaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
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
                    <option value="{{ $user->id }}" {{ isset($merchantTransaction) && $merchantTransaction->merchant_id == $user->id ? 'selected' : (old('merchant_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="method">{{ __('Method') }}</label>
            <input type="text" name="method" id="method" class="form-control @error('method') is-invalid @enderror" value="{{ isset($merchantTransaction) ? $merchantTransaction->method : old('method') }}" placeholder="{{ __('Method') }}" required />
            @error('method')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <input type="text" name="note" id="note" class="form-control @error('note') is-invalid @enderror" value="{{ isset($merchantTransaction) ? $merchantTransaction->note : old('note') }}" placeholder="{{ __('Note') }}" required />
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>