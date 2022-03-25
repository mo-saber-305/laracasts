<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">


<style>
    html, body {
        text-transform: capitalize;
    }
</style>
@yield('style')

<body style="font-family: Open Sans, sans-serif">
<section class="">
    @include('includes.navbar')

    @yield('content')

    @include('includes.footer')
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@yield('script')
</body>
