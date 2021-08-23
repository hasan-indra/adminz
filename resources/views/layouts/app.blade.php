<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel'). " - ".Admin::pageName() }}</title>

    <link rel="shortcut icon" href="{{ asset('adminlte-favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <x-admin-navbar />
        <x-admin-sidebar />
        <x-admin-content>
            {{ $slot }}
        </x-admin-content>
        <x-admin-footer />
    </div>
    <!-- ./wrapper -->
    <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/toastr/toastr.min.js"></script>
    <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/js/adminlte.min.js"></script>
    @livewireScripts
    @stack('scripts')
</body>
</html>
