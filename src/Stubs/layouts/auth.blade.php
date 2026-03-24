<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    {{-- Google Fonts --}}
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- Font Awesome --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    {{-- AdminLTE 4 (BS5 edition) --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/css/adminlte.min.css">

    @stack('styles')
</head>
<body class="hold-transition login-page">

    @yield('content')

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- AdminLTE 4 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta3/dist/js/adminlte.min.js"></script>

    @stack('scripts')
</body>
</html>