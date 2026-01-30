<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GreenTech Solutions</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Fallback for immediate preview if build is not running -->
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
<body class="antialiased bg-slate-50 text-slate-900 font-sans selection:bg-emerald-500 selection:text-white">
    <div class="relative min-h-screen flex flex-col">
        <!-- Decoration -->
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-br from-emerald-50 to-teal-50 -z-10 rounded-b-[4rem]"></div>

        <nav class="container mx-auto px-6 py-6 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-leaf text-2xl text-emerald-600"></i>
                <span class="text-xl font-bold tracking-tight text-slate-800">GreenTech<span class="text-emerald-600">Solutions</span></span>
            </div>
            <div class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-slate-600 hover:text-emerald-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-slate-600 hover:text-emerald-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full bg-emerald-600 text-white font-medium hover:bg-emerald-700 transition shadow-lg shadow-emerald-600/20">Get Started</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <main class="flex-grow container mx-auto px-6 pt-16 pb-24">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-sm font-medium">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        Leading the Sustainable Revolution
                    </div>
                    <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight text-slate-900">
                        Innovative Tech for a <span class="bg-gradient-to-r from-emerald-600 to-teal-500 bg-clip-text text-transparent">Greener Future</span>
                    </h1>
                    <p class="text-xl text-slate-600 leading-relaxed max-w-lg">
                        We build sustainable digital solutions that empower businesses to reduce their carbon footprint while maximizing efficiency.
                    </p>
                    <div class="flex items-center gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-4 rounded-full bg-slate-900 text-white font-semibold hover:bg-slate-800 transition shadow-xl hover:shadow-2xl hover:-translate-y-1">Start your journey</a>
                        <a href="#features" class="px-8 py-4 rounded-full bg-white text-slate-700 border border-slate-200 font-semibold hover:bg-slate-50 transition">Learn more</a>
                    </div>
                    <div class="pt-8 flex items-center gap-8 text-slate-400">
                        <div class="flex items-center gap-2"><i class="fa-solid fa-check-circle text-emerald-500"></i> Eco-Friendly</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-bolt text-yellow-500"></i> High Performance</div>
                        <div class="flex items-center gap-2"><i class="fa-solid fa-shield-halved text-slate-500"></i> Secure</div>
                    </div>
                </div>
                <div class="relative hidden lg:block">
                    <!-- Abstract Visual -->
                    <div class="absolute inset-0 bg-emerald-200 blur-3xl opacity-20 rounded-full"></div>
                    <div class="relative bg-white/50 backdrop-blur-xl border border-white/60 p-8 rounded-3xl shadow-2xl skew-y-1 transform hover:skew-y-0 transition duration-500">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="bg-white p-6 rounded-2xl shadow-sm">
                                <div class="h-10 w-10 bg-emerald-100 rounded-lg flex items-center justify-center mb-4 text-emerald-600">
                                    <i class="fa-solid fa-cloud"></i>
                                </div>
                                <h3 class="font-bold text-lg text-slate-800">Cloud Carbon</h3>
                                <p class="text-sm text-slate-500 mt-2">Monitor emissions in real-time.</p>
                            </div>
                            <div class="bg-slate-900 p-6 rounded-2xl shadow-sm text-white">
                                <div class="h-10 w-10 bg-white/10 rounded-lg flex items-center justify-center mb-4">
                                    <i class="fa-solid fa-chart-line"></i>
                                </div>
                                <h3 class="font-bold text-lg">Efficiency</h3>
                                <p class="text-sm text-slate-400 mt-2 text-balance">+45% optimization rate.</p>
                            </div>
                            <div class="bg-gradient-to-br from-emerald-500 to-teal-500 p-6 rounded-2xl shadow-sm text-white col-span-2">
                                <h3 class="font-bold text-lg">Smart Analytics</h3>
                                <p class="text-sm text-emerald-50 mt-2">AI-driven insights for sustainable growth.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="bg-slate-50 border-t border-slate-200 py-12">
            <div class="container mx-auto px-6 text-center text-slate-500 text-sm">
                &copy; {{ date('Y') }} GreenTech Solutions. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>

