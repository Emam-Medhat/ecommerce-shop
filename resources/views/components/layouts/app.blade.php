
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Chat App' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- المحتوى من صفحات Livewire -->
    {{ $slot }}
<x-chat />


@vite('resources/css/app.css')
@vite('resources/js/app.js')
</body>
</html>
