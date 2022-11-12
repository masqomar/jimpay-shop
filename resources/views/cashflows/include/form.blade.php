<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="debit">{{ __('Debit') }}</label>
            <input type="number" name="debit" id="debit" class="form-control @error('debit') is-invalid @enderror" value="{{ isset($cashflow) ? $cashflow->debit : old('debit') }}" placeholder="{{ __('Debit') }}" required />
            @error('debit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="credit">{{ __('Credit') }}</label>
            <input type="number" name="credit" id="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ isset($cashflow) ? $cashflow->credit : old('credit') }}" placeholder="{{ __('Credit') }}" required />
            @error('credit')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">{{ __('Type') }}</label>
            <select class="form-select" name="type" id="type" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select type') }} --</option>
                <option value="masuk" {{ isset($cashflow) && $cashflow->type == 'masuk' ? 'selected' : (old('type') == 'masuk' ? 'selected' : '') }}>masuk</option>
		<option value="keluar" {{ isset($cashflow) && $cashflow->type == 'keluar' ? 'selected' : (old('type') == 'keluar' ? 'selected' : '') }}>keluar</option>			
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="saving_account_id">{{ __('SavingAccount') }}</label>
            <select class="form-select" name="saving_account_id" id="saving_account_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select savingaccount') }} --</option>
                
                @foreach ($savingAccounts as $savingAccount)
                    <option value="{{ $savingAccount->id }}" {{ isset($cashflow) && $cashflow->saving_account_id == $savingAccount->id ? 'selected' : (old('saving_account_id') == $savingAccount->id ? 'selected' : '') }}>
                        {{ $savingAccount->code }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="description">{{ __('Description') }}</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Description') }}">{{ isset($cashflow) ? $cashflow->description : old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($cashflow) && $cashflow->date ? $cashflow->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>