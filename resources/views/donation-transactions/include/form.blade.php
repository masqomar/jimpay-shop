<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($donationTransaction) && $donationTransaction->date ? $donationTransaction->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="donation_id">{{ __('Donation') }}</label>
            <select class="form-select" name="donation_id" id="donation_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select donation') }} --</option>
                
                @foreach ($donations as $donation)
                    <option value="{{ $donation->id }}" {{ isset($donationTransaction) && $donationTransaction->donation_id == $donation->id ? 'selected' : (old('donation_id') == $donation->id ? 'selected' : '') }}>
                        {{ $donation->name }}
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
                    <option value="{{ $user->id }}" {{ isset($donationTransaction) && $donationTransaction->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($donationTransaction) ? $donationTransaction->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="private">{{ __('Private') }}</label>
            <select class="form-select" name="private" id="private" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select private') }} --</option>
                <option value="0" {{ isset($donationTransaction) && $donationTransaction->private == '0' ? 'selected' : (old('private') == '0' ? 'selected' : '') }}>{{ __('True') }}</option>
				<option value="1" {{ isset($donationTransaction) && $donationTransaction->private == '1' ? 'selected' : (old('private') == '1' ? 'selected' : '') }}>{{ __('False') }}</option>
            </select>
        </div>
    </div>
</div>