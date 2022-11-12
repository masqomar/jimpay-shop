<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="code">{{ __('Code') }}</label>
            <input type="text" name="code" id="code" class="form-control @error('code') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->code : old('code') }}" placeholder="{{ __('Code') }}" required />
            @error('code')
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
                    <option value="{{ $user->id }}" {{ isset($paylater) && $paylater->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="paylater_provider_id">{{ __('PaylaterProvider') }}</label>
            <select class="form-select" name="paylater_provider_id" id="paylater_provider_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select paylaterprovider') }} --</option>
                
                @foreach ($paylaterProviders as $paylaterProvider)
                    <option value="{{ $paylaterProvider->id }}" {{ isset($paylater) && $paylater->paylater_provider_id == $paylaterProvider->id ? 'selected' : (old('paylater_provider_id') == $paylaterProvider->id ? 'selected' : '') }}>
                        {{ $paylaterProvider->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank_id">{{ __('Bank') }}</label>
            <select class="form-select" name="bank_id" id="bank_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select bank') }} --</option>
                
                @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}" {{ isset($paylater) && $paylater->bank_id == $bank->id ? 'selected' : (old('bank_id') == $bank->id ? 'selected' : '') }}>
                        {{ $bank->code }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank_account_number">{{ __('Bank Account Number') }}</label>
            <input type="number" name="bank_account_number" id="bank_account_number" class="form-control @error('bank_account_number') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->bank_account_number : old('bank_account_number') }}" placeholder="{{ __('Bank Account Number') }}" required />
            @error('bank_account_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="bank_account_name">{{ __('Bank Account Name') }}</label>
            <input type="text" name="bank_account_name" id="bank_account_name" class="form-control @error('bank_account_name') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->bank_account_name : old('bank_account_name') }}" placeholder="{{ __('Bank Account Name') }}" required />
            @error('bank_account_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start_date">{{ __('Start Date') }}</label>
            <input type="date" name="start_date" id="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ isset($paylater) && $paylater->start_date ? $paylater->start_date->format('Y-m-d') : old('start_date') }}" placeholder="{{ __('Start Date') }}" required />
            @error('start_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->status : old('status') }}" placeholder="{{ __('Status') }}" required />
            @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="duration">{{ __('Duration') }}</label>
            <input type="number" name="duration" id="duration" class="form-control @error('duration') is-invalid @enderror" value="{{ isset($paylater) ? $paylater->duration : old('duration') }}" placeholder="{{ __('Duration') }}" required />
            @error('duration')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="finish_date">{{ __('Finish Date') }}</label>
            <input type="date" name="finish_date" id="finish_date" class="form-control @error('finish_date') is-invalid @enderror" value="{{ isset($paylater) && $paylater->finish_date ? $paylater->finish_date->format('Y-m-d') : old('finish_date') }}" placeholder="{{ __('Finish Date') }}" required />
            @error('finish_date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <textarea name="note" id="note" class="form-control @error('note') is-invalid @enderror" placeholder="{{ __('Note') }}" required>{{ isset($paylater) ? $paylater->note : old('note') }}</textarea>
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($paylater)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($paylater->image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/images/' . $paylater->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">

                @error('image')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>