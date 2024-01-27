<section>
    <div class="card">
        <div class="card-header">
            <h2 class="card-title h5">{{ __('Profile Information') }}</h2>
            <p class="card-text text-muted">{{ __("Update your account's profile information and email address.") }}</p>
        </div>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="card-body">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-muted">{{ __('Your email address is unverified.') }}</p>
                        <button form="send-verification" class="btn btn-link p-0 text-decoration-none">{{ __('Click here to re-send the verification email.') }}</button>

                        @if (session('status') === 'verification-link-sent')
                            <p class="text-success">{{ __('A new verification link has been sent to your email address.') }}</p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-4">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'profile-updated')
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
