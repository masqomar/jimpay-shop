<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="topup_amount">{{ __('Topup Amount') }}</label>
            <input type="number" name="topup_amount" id="topup_amount" class="form-control @error('topup_amount') is-invalid @enderror" value="{{ isset($userTopup) ? $userTopup->topup_amount : old('topup_amount') }}" placeholder="{{ __('Topup Amount') }}" required />
            @error('topup_amount')
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
                    <option value="{{ $user->id }}" {{ isset($userTopup) && $userTopup->user_id == $user->id ? 'selected' : (old('user_id') == $user->id ? 'selected' : '') }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="date">{{ __('Date') }}</label>
            <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ isset($userTopup) && $userTopup->date ? $userTopup->date->format('Y-m-d') : old('date') }}" placeholder="{{ __('Date') }}" required />
            @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="note">{{ __('Note') }}</label>
            <input type="text" name="note" id="note" class="form-control @error('note') is-invalid @enderror" value="{{ isset($userTopup) ? $userTopup->note : old('note') }}" placeholder="{{ __('Note') }}" required />
            @error('note')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>