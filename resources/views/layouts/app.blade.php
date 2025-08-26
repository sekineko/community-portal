<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>公式|{{ config('organization.name', '組織名') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" />
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/css/styles.css', 'resources/js/app.js'])
    </head>
    <body  data-theme="dark-orange" class="font-sans antialiased">
        <div class="min-h-screen bg-background">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include('layouts.footer')
        </div>
        
        <!-- PDF.js Library for PDF thumbnails -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
        <script>
            // Make sure pdfjsLib is defined
            if (typeof pdfjsLib === 'undefined') {
                window.pdfjsLib = window['pdfjs-dist/build/pdf'];
            }
        </script>
        <script src="{{ asset('js/pdf-thumbnail.js') }}"></script>
    </body>
</html>
