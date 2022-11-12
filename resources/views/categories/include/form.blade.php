<div class="row mb-2">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ isset($category) ? $category->name : old('name') }}" placeholder="{{ __('Name') }}" required />
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    @isset($category)
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if ($category->icon == null)
                        <img src="https://via.placeholder.com/350?text=No+Image+Avaiable" alt="Icon" class="rounded mb-2 mt-2" alt="Icon" width="200" height="150" style="object-fit: cover">
                    @else
                        <img src="{{ asset('storage/uploads/icons/' . $category->icon) }}" alt="Icon" class="rounded mb-2 mt-2" width="200" height="150" style="object-fit: cover">
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="form-group ms-3">
                        <label for="icon">{{ __('Icon') }}</label>
                        <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon">

                        @error('icon')
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
                <label for="icon">{{ __('Icon') }}</label>
                <input type="file" name="icon" class="form-control @error('icon') is-invalid @enderror" id="icon" required>

                @error('icon')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    @endisset
</div>