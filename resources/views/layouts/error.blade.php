<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel'). " - Error Page" }}</title>

    <link rel="shortcut icon" href="{{ asset('adminlte-favicon.png') }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    @auth()
        <x-admin-navbar/>
        <x-admin-sidebar/>
    @endauth
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-@yield('type')"> @yield('code')</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-@yield('type')"></i> @yield('message')</h3>
                    @auth()
                        <p>
                            Meanwhile, you may return to <a href="{{ route('dashboard') }}">dashboard</a>.
                        </p>
                    @endauth
                    @guest()
                        <p>
                            Meanwhile, you may return to <a href="{{ route('/') }}">homepage</a>.
                        </p>
                    @endguest

                </div>
                <!-- /.error-content -->
            </div>
            <!-- /.error-page -->
        </section>
    @auth()
        <x-admin-footer/>
    @endauth

</div>
<!-- ./wrapper -->
<script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>
