<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') . " - ".Admin::pageName()}}</title>
        <link rel="shortcut icon" href="{{ asset('adminlte-favicon.png') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/css/adminlte.min.css">
    </head>
    <body class="hold-transition login-page">
        {{ $slot }}
        <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/jquery/jquery.min.js"></script>
        <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset(env('APP_PATH_ADMINLTE')) }}/dist/js/adminlte.min.js"></script>
    </body>
</html>
