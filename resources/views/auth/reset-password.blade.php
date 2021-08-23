<x-guest-layout>
    <x-auth-card>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="form-group">
                <x-label for="email" :value="__('Email')" />
                <x-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" placeholder="Email" />
            </div>


            <!-- Password -->
            <div class="form-group">
                <x-label for="password" :value="__('Password')" />
                <x-input id="password" class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" />
            </div>

            <div class="row">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
                </div>
           </div>
        </form>
    </x-auth-card>
</x-guest-layout>
