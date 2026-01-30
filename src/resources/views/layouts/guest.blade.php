<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            emerald: {
                                50: '#ecfdf5',
                                100: '#d1fae5',
                                200: '#a7f3d0',
                                300: '#6ee7b7',
                                400: '#34d399',
                                500: '#10b981',
                                600: '#059669',
                                700: '#047857',
                                800: '#065f46',
                                900: '#064e3b',
                            }
                        }
                    }
                }
            }
        </script>
    </head>
    <body class="font-sans text-slate-900 antialiased bg-slate-50">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[url('https://images.unsplash.com/photo-1542601906990-24d4c16419d0?q=80&w=2940&auto=format&fit=crop')] bg-cover bg-center">
            <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm z-0"></div>
            
            <div class="relative z-10 flex flex-col items-center">
                <a href="/">
                    <div class="p-4 bg-white/90 rounded-full shadow-2xl mb-6">
                         <i class="fa-solid fa-leaf text-4xl text-emerald-600"></i>
                    </div>
                </a>

                <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/90 dark:bg-slate-800/90 backdrop-blur-md shadow-2xl overflow-hidden sm:rounded-2xl border border-white/20">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>

