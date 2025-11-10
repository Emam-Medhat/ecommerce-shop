<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'لوحة التحكم')</title>
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('admin.sidebar') <!-- ملف Sidebar هنعمله بعدين -->

    <div class="content-wrapper">
        <section class="content-header">
            @yield('content_header')
        </section>

        <section class="content">
            @yield('content')
        </section>
    </div>
</div>

<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
@yield('js')
</body>
</html>
