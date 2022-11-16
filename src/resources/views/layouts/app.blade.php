<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        @include('components.partials.header')

        <!-- Fonts -->
        <link rel="stylesheet">
        @vite(['resources/css/app.css'])

        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        <script src="https://kit.fontawesome.com/03c1dbd5d5.js" crossorigin="anonymous"></script>
        <script src="node_modules/flowbite/dist/flowbite.js"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <!-- main -->
            <main class="bg-gray-50">
                <main class="flex overflow-hidden bg-white pt-16">
                    <!-- sidebar -->
                    @include('layouts.sidebar')
                    <!-- end sidebar -->

                    <!-- body -->
                    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
                        <!-- breadcrumb -->
                        @if (isset($header))
                            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5">
                                <x-breadcrumb :viewName="$header">
                                </x-breadcrumb>
                            </div>
                        @endif
                        <!-- end breadcrumb -->

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
