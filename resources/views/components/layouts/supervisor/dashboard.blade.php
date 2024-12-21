<!doctype html>
<html lang="en">

<head>
    <title>Supervisor Dashboard</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style/css/main.css') }}">

</head>

<body>

    @include('components.layouts.supervisor.supervisor-style.navbar')

    @include('components.layouts.supervisor.supervisor-style.main')


    {{ $slot }}



    <script src="{{ asset('style/js/popper.min.js') }}"></script>

    <script src="{{ asset('style/js/bootstrap.min.js') }}"></script>
</body>

</html>