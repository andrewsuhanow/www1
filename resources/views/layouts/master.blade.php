<!doctype html>
<html lang="ru">
<head>
    @include('layouts.head')
    @yield('styles')
    <style>

    </style>
</head>
<body>

    <div class="content">
        @yield('content')
    </div>


    @include('layouts.end_page_script')
    @yield('scripts')
</body>
</html>
