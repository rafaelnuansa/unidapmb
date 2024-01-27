<section>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title h5">{{ __('Update Password') }}</h2>
            <p class="card-text text-muted">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        </div>

        <form method="post" action="{{ route('password.update') }}" class="card-body">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                <input id="current_password" name="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" autocomplete="current-password">
                @error('current_password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('New Password') }}</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" autocomplete="new-password">
                @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'password-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-success"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</section>
