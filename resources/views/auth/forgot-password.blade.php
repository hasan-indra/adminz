<x-guest-layout>
    <x-auth-card>
        <p class="login-box-msg">
            {{ __('Fill email form and we will send link to change your password') }}
        </p>
        <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" />
       </div>
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Send Reset Link') }}</button>
            </div>
        </div>
        </form>
    </x-auth-card>
</x-guest-layout>
