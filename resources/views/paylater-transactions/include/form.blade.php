<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="paylater_id">{{ __('Paylater') }}</label>
            <select class="form-select" name="paylater_id" id="paylater_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select paylater') }} --</option>
                
                @foreach ($paylaters as $paylater)
                    <option value="{{ $paylater->id }}" {{ isset($paylaterTransaction) && $paylaterTransaction->paylater_id == $paylater->id ? 'selected' : (old('paylater_id') == $paylater->id ? 'selected' : '') }}>
                        {{ $paylater->code }}
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
                    <option value="{{ $user->id }}" {{ isset($paylaterTransaction) && $paylaterTransaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($paylaterTransaction) ? $paylaterTransaction->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}" required>{{ isset($paylaterTransaction) ? $paylaterTransaction->note : old('note') }}</textarea>
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($paylaterTransaction) && $paylaterTransaction->date ? $paylaterTransaction->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>