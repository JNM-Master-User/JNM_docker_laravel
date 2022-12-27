<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet">

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/03c1dbd5d5.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-800">
    <!-- main -->
    <main class="bg-gray-50">
        <main class="flex overflow-hidden bg-white dark:text-white dark:bg-gray-700">

            <!-- body -->
            <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto dark:bg-gray-800">
                <!-- content -->
                {{ $slot }}
                <!-- end content -->
            </div>
            <!-- end body -->
        </main>
    </main>
    <!-- end main -->
</div>
</body>
</html>
