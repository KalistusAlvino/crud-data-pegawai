<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-7.1.0-web/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
</head>

<body>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    <div class="wrapper">
        <aside id="sidebar" class="bg-primary">
            @include('dashboard.asset.sidebar')
        </aside>
        <div class="main p-3">
            @yield('content')
        </div>
    </div>

    @include('sweetalert2::index')
    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>

</html>
