<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="donation_id">{{ __('Donation') }}</label>
            <select class="form-select" name="donation_id" id="donation_id" class="form-control" required>
                <option value="" selected disabled>-- {{ __('Select donation') }} --</option>
                
                @foreach ($donations as $donation)
                    <option value="{{ $donation->id }}" {{ isset($donationDisbursement) && $donationDisbursement->donation_id == $donation->id ? 'selected' : (old('donation_id') == $donation->id ? 'selected' : '') }}>
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
                    <option value="{{ $user->id }}" {{ isset($donationDisbursement) && $donationDisbursement->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($donationDisbursement) && $donationDisbursement->date ? $donationDisbursement->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="amount">{{ __('Amount') }}</label>
            <input type="number" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" value="{{ isset($donationDisbursement) ? $donationDisbursement->amount : old('amount') }}" placeholder="{{ __('Amount') }}" required />
            @error('amount')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="recipient">{{ __('Recipient') }}</label>
            <input type="text" name="recipient" id="recipient" class="form-control @error('recipient') is-invalid @enderror" value="{{ isset($donationDisbursement) ? $donationDisbursement->recipient : old('recipient') }}" placeholder="{{ __('Recipient') }}" required />
            @error('recipient')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($donationDisbursement)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($donationDisbursement->image == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Image" class="rounded mb-2 mt-2" alt="Image" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/images/' . $donationDisbursement->image) }}" alt="Image" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
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