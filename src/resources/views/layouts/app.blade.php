<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#19e619",
                        "eco-green": "#12a112",
                        "background-light": "#f6f8f6",
                        "background-dark": "#112111",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        .organic-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body class="bg-background-light font-display min-h-screen text-[#111811] dark:text-white">
    @hasSection('aside')
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar Navigation -->
        <aside class="w-64 flex-shrink-0 border-r border-[#dce5dc] dark:border-[#2a3a2a] bg-white dark:bg-[#1a2a1a] flex flex-col h-full">
            <div class="p-6">
                <div class="flex items-center gap-3">
                    <div class="text-primary">
                        <box-icon name='leaf' type='solid' color="currentColor" class="text-primary"></box-icon>
                    </div>
                    <div>
                        <h1 class="text-[#111811] dark:text-white text-lg font-bold leading-tight">GreenTech</h1>
                        <p class="text-[#638863] text-xs font-medium">@auth {{ auth()->user()->role === 'admin' ? 'Admin Dashboard' : 'User Dashboard' }} @else Guest View @endauth</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 px-4 space-y-1">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <!-- Dashboard Link -->
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('dashboard') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('dashboard') }}">
                            <box-icon name='dashboard' type='solid' color="currentColor" class="{{ request()->routeIs('dashboard') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                            <span class="text-sm">Dashboard</span>
                        </a>

                        <!-- Product Management Link -->
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('products.index') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('products.index') }}">
                            <box-icon type='solid' name='book-content' color="currentColor" class="{{ request()->routeIs('products.index') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                            <span class="text-sm">Product Management</span>
                        </a>
                    @else
                        <!-- Client Catalog Link -->
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('catalog.index') && !request()->query('favorites') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('catalog.index') }}">
                            <box-icon name='store' type='solid' color="currentColor" class="{{ request()->routeIs('catalog.index') && !request()->query('favorites') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                            <span class="text-sm">Catalog</span>
                        </a>

                        <!-- Favorites Link (Client Only) -->
                        <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('catalog.index') && request()->query('favorites') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('catalog.index', ['favorites' => 1]) }}">
                            <box-icon name='heart' type='solid' color="currentColor" class="{{ request()->routeIs('catalog.index') && request()->query('favorites') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                            <span class="text-sm">My Favorites</span>
                        </a>
                    @endif

                    <!-- Profile Link -->
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('profile*') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('profile.edit') }}">
                        <box-icon name='user-circle' type='solid' color="currentColor" class="{{ request()->routeIs('profile*') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                        <span class="text-sm">Profile</span>
                    </a>
                @else
                    <!-- Guest Links -->
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('catalog.index') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('catalog.index') }}">
                        <box-icon name='store' type='solid' color="currentColor" class="{{ request()->routeIs('catalog.index') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                        <span class="text-sm">Catalog</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('login') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('login') }}">
                        <box-icon name='log-in' type='solid' color="currentColor" class="{{ request()->routeIs('login') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                        <span class="text-sm">Login</span>
                    </a>
                    <a class="flex items-center gap-3 px-3 py-2 rounded-lg font-medium transition-colors border-l-4 {{ request()->routeIs('register') ? 'bg-emerald-50 text-emerald-600 border-emerald-500' : 'text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 border-transparent' }}" href="{{ route('register') }}">
                        <box-icon name='user-plus' type='solid' color="currentColor" class="{{ request()->routeIs('register') ? 'text-emerald-600' : 'text-primary' }}"></box-icon>
                        <span class="text-sm">Register</span>
                    </a>
                @endauth
            </nav>
            <div class="p-4 border-t border-[#dce5dc] dark:border-[#2a3a2a] flex items-center justify-center flex-col">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('products.create') }}" class="w-full flex items-center justify-center gap-2 bg-primary text-[#112111] py-2.5 rounded-lg font-bold text-sm shadow-sm hover:opacity-90 transition-opacity">
                            <box-icon name='plus' color="currentColor"></box-icon>
                            New Product
                        </a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="mt-4 flex items-center gap-3 px-3 py-2 text-[#638863] cursor-pointer hover:text-red-500 transition-colors">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 bg-red-200 text-[#112111] py-2.5 rounded-lg font-bold text-xs shadow-sm hover:opacity-90 transition-opacity">
                            <span class="text-sm font-medium px-4">Logout</span>
                        </button>
                    </form>
                @endauth
            </div>
        </aside>
        <main class="flex-1 w-full overflow-y-auto">
            @yield('content')
        </main>
    </div>
    @else
        <div class="min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
            @yield('content')
        </div>
    @endif
    @yield('scripts')
</body>
</html>
