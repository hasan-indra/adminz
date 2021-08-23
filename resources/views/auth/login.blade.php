<x-guest-layout>
    <x-auth-card>
        <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>
        @if (Session::has('info'))
            <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-info"></i> Alert!</h5>
                {!! Session::get('info') !!}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <x-label for="username" :value="__('Username')" />
            <x-input id="username" class="form-control" type="text" name="username" :value="old('username')" placeholder="Username" />
        </div>


        <!-- Password -->
        <div class="form-group">
            <x-label for="email" :value="__('Password')" />
            <x-input id="password" class="form-control" type="password" name="password" autocomplete="current-password" placeholder="Password" />
        </div>

        <!-- Remember Me -->
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input id="remember" type="checkbox" name="remember">
                    <label for="remember">
                        Remember Me
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Sign In') }}</button>
            </div>
            <!-- /.col -->
        </div>
        <p class="mb-1">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
            @endif
        </p>
        </form>
    </x-auth-card>
</x-guest-layout>
