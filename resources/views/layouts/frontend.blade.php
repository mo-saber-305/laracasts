<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

<!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html, body {
            text-transform: capitalize;
        }
    </style>
    @notifyCss
    @yield('style')
</head>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    @include('includes.navbar')

    @include('notify::components.notify')

    @yield('content')

    @include('includes.footer')
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('script')
@notifyJs
</body>
</html>
