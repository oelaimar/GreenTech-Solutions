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
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .organic-shape {
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body class="bg-background-light font-display min-h-screen flex items-center justify-center p-6 relative overflow-hidden">
<div class="absolute top-[-10%] left-[-5%] w-96 h-96 bg-primary/5 organic-shape -z-10"></div>
<div class="absolute bottom-[-10%] right-[-5%] w-[500px] h-[500px] bg-primary/10 organic-shape -z-10"></div>
    @hasSection('aside')
        <!-- Sidebar Navigation -->
        <aside class="w-64 flex-shrink-0 border-r border-[#dce5dc] dark:border-[#2a3a2a] bg-white dark:bg-[#1a2a1a] flex flex-col h-full">
            <div class="p-6">
                <div class="flex items-center gap-3">
                    <div class="text-primary">
                        <span class="material-symbols-outlined text-4xl">eco</span>
                    </div>
                    <div>
                        <h1 class="text-[#111811] dark:text-white text-lg font-bold leading-tight">EcoShop</h1>
                        <p class="text-[#638863] text-xs font-medium">Admin Dashboard</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 px-4 space-y-1">
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg bg-primary/10 text-primary font-medium" href="#">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm">Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 transition-colors" href="#">
                    <span class="material-symbols-outlined">potted_plant</span>
                    <span class="text-sm">Product Catalog</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 transition-colors" href="#">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <span class="text-sm">Order Management</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 transition-colors" href="#">
                    <span class="material-symbols-outlined">monitoring</span>
                    <span class="text-sm">Sustainability</span>
                </a>
                <div class="pt-4 pb-2 px-3 text-[10px] uppercase tracking-wider text-[#638863]/60 font-bold">Preferences</div>
                <a class="flex items-center gap-3 px-3 py-2 rounded-lg text-[#638863] hover:bg-background-light dark:hover:bg-background-dark/50 transition-colors" href="#">
                    <span class="material-symbols-outlined">settings</span>
                    <span class="text-sm">Settings</span>
                </a>
            </nav>
            <div class="p-4 border-t border-[#dce5dc] dark:border-[#2a3a2a]">
                <button class="w-full flex items-center justify-center gap-2 bg-primary text-[#112111] py-2.5 rounded-lg font-bold text-sm shadow-sm hover:opacity-90 transition-opacity">
                    <span class="material-symbols-outlined text-lg">add</span>
                    New Product
                </button>
                <div class="mt-4 flex items-center gap-3 px-3 py-2 text-[#638863] cursor-pointer hover:text-red-500 transition-colors">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="text-sm font-medium">Logout</span>
                </div>
            </div>
        </aside>
    @endif
    <div>
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
