<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Khác nhau -->
    <title>
        @yield('title')
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">
    <script src="{{ asset('js/snippets.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>

    <style>
        .ui-datepicker {
            background-color: #d6b0dc;
            /* Màu nền */
        }
    </style>
</head>

<body>
    <!-- Header giống nhau -->
    @yield('header')
    <!-- Main Content khác nhau-->


    <div class="container-fluid p-0">
        @yield('main')
    </div>

    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

</body>

</html>
