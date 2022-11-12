<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="credit">{{ __('Credit') }}</label>
            <input type="number" name="credit" id="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ isset($userTransaction) ? $userTransaction->credit : old('credit') }}" placeholder="{{ __('Credit') }}" required />
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
            <input type="number" name="debit" id="debit" class="form-control @error('debit') is-invalid @enderror" value="{{ isset($userTransaction) ? $userTransaction->debit : old('debit') }}" placeholder="{{ __('Debit') }}" required />
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
            <select class="form-select" name="type" id="type" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select type') }} --</option>
                <option value="masuk" {{ isset($userTransaction) && $userTransaction->type == 'masuk' ? 'selected' : (old('type') == 'masuk' ? 'selected' : '') }}>masuk</option>
		<option value="keluar" {{ isset($userTransaction) && $userTransaction->type == 'keluar' ? 'selected' : (old('type') == 'keluar' ? 'selected' : '') }}>keluar</option>			
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="transaction_type">{{ __('Transaction Type') }}</label>
            <input type="text" name="transaction_type" id="transaction_type" class="form-control @error('transaction_type') is-invalid @enderror" value="{{ isset($userTransaction) ? $userTransaction->transaction_type : old('transaction_type') }}" placeholder="{{ __('Transaction Type') }}" required />
            @error('transaction_type')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($userTransaction) && $userTransaction->date ? $userTransaction->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
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
                    <option value="{{ $user->id }}" {{ isset($userTransaction) && $userTransaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="methode">{{ __('Methode') }}</label>
            <input type="text" name="methode" id="methode" class="form-control @error('methode') is-invalid @enderror" value="{{ isset($userTransaction) ? $userTransaction->methode : old('methode') }}" placeholder="{{ __('Methode') }}" required />
            @error('methode')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <input type="text" name="note" id="note" class="form-control @error('note') is-invalid @enderror" value="{{ isset($userTransaction) ? $userTransaction->note : old('note') }}" placeholder="{{ __('Note') }}" required />
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>