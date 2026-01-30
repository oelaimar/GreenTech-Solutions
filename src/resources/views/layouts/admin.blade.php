<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <style>
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .active-fill { font-variation-settings: 'FILL' 1; }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-[#111811] dark:text-white min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        <aside class="w-64 bg-white dark:bg-[#1a2e1a] border-r border-[#dce5dc] dark:border-white/10 flex flex-col hidden lg:flex">
            <div class="p-6 flex items-center gap-3">
                <div class="size-8 bg-primary rounded-lg flex items-center justify-center text-white">
                    <span class="material-symbols-outlined">eco</span>
                </div>
                <div>
                    <h1 class="text-[#111811] dark:text-white text-lg font-bold leading-tight">GreenTech</h1>
                    <p class="text-[#638863] dark:text-[#a3b8a3] text-xs font-medium">Sustainable Admin</p>
                </div>
            </div>
            <nav class="flex-1 px-4 space-y-2 mt-4">
                <a class="flex items-center gap-3 px-3 py-2 bg-[#f0f4f0] dark:bg-white/5 text-[#111811] dark:text-white rounded-lg transition-colors" href="{{ route('dashboard') }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-semibold">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[#638863] dark:text-[#a3b8a3] hover:bg-[#f0f4f0] dark:hover:bg-white/5 rounded-lg transition-colors" href="{{ route('products.index') }}">
                    <span class="material-symbols-outlined">inventory_2</span>
                    <span class="text-sm font-semibold">Products</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[#638863] dark:text-[#a3b8a3] hover:bg-[#f0f4f0] dark:hover:bg-white/5 rounded-lg transition-colors" href="{{ route('catalog.index') }}">
                    <span class="material-symbols-outlined">storefront</span>
                    <span class="text-sm font-semibold">Public Catalog</span>
                </a>
                <!-- Placeholder links for now -->
                <a class="flex items-center gap-3 px-3 py-2 text-[#638863] dark:text-[#a3b8a3] hover:bg-[#f0f4f0] dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined">shopping_cart</span>
                    <span class="text-sm font-semibold">Orders</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 text-[#638863] dark:text-[#a3b8a3] hover:bg-[#f0f4f0] dark:hover:bg-white/5 rounded-lg transition-colors" href="#">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-semibold">Customers</span>
                </a>
            </nav>
            <div class="p-4 border-t border-[#dce5dc] dark:border-white/10">
                <div class="flex items-center gap-3 p-2 bg-[#f0f4f0] dark:bg-white/5 rounded-xl">
                    <div class="size-10 rounded-full bg-center bg-cover bg-gray-200 flex items-center justify-center">
                        <span class="material-symbols-outlined text-gray-500">person</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold truncate">{{ Auth::user()->name ?? 'User' }}</p>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-xs text-[#638863] dark:text-[#a3b8a3] hover:text-red-500 truncate">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 flex flex-col overflow-y-auto">
            <!-- Top Navigation Bar -->
            <header class="h-16 bg-white dark:bg-[#1a2e1a] border-b border-[#dce5dc] dark:border-white/10 px-8 flex items-center justify-between sticky top-0 z-10">
                <div class="flex items-center flex-1 max-w-md">
                    <div class="relative w-full">
                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#638863] dark:text-[#a3b8a3] text-lg">search</span>
                        <input class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-primary/50 placeholder-[#638863] dark:placeholder-[#a3b8a3]" placeholder="Search..." type="text"/>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <button class="size-10 flex items-center justify-center rounded-xl bg-[#f0f4f0] dark:bg-white/5 text-[#111811] dark:text-white relative hover:bg-black/10 transition">
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="absolute top-2 right-2 size-2 bg-red-500 rounded-full border-2 border-white dark:border-[#1a2e1a]"></span>
                    </button>
                    <!-- Mobile Menu Button -->
                     <div class="-me-2 flex items-center lg:hidden">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </header>
            
            <div class="p-8 space-y-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>
</html>
