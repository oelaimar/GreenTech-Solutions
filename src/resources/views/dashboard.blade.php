@extends('layouts.app')

@section('title', 'Dashboard')

@section('aside')
@endsection

@section('content')
    <div class="max-w-[1600px] mx-auto p-6 lg:p-10 space-y-8">
        <!-- Hero Section -->
        <div class="relative overflow-hidden bg-gradient-to-br from-[#0f280f] via-[#163e16] to-[#12a112] text-white rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-green-900/30 isolate group">
            <div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-8">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="bg-white/10 border border-white/10 text-emerald-50 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-widest backdrop-blur-md shadow-sm">Admin Portal</span>
                    </div>
                    <!-- Auth user name -->
                    <h2 class="text-5xl md:text-6xl font-black tracking-tight mb-6 leading-tight">
                        Hello, <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 to-white">{{ Auth::user()->name }}</span>!
                    </h2>
                    <p class="text-emerald-50/80 text-lg md:text-xl font-medium leading-relaxed mb-8">
                        Welcome back to <span class="text-white font-semibold">GreenTech</span>. Your store is growing beautifully.
                        You have <span class="font-bold text-white border-b-2 border-emerald-400/50">{{ $lowStockCount }} items</span> that need your attention today.
                    </p>
                    
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('products.create') }}" class="group/btn relative overflow-hidden bg-white text-[#0f280f] px-8 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 shadow-xl hover:shadow-2xl hover:bg-emerald-50 transition-all duration-300 hover:-translate-y-1">
                            <div class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/50 to-transparent -translate-x-full group-hover/btn:animate-[shimmer_1.5s_infinite]"></div>
                            <box-icon name='plus-circle' type='solid' color="currentColor"></box-icon>
                            <span class="tracking-wide">Add New Plant</span>
                        </a>
                        <a href="{{ route('products.index') }}" class="px-8 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 text-white border border-white/20 bg-white/5 hover:bg-white/10 backdrop-blur-md transition-all duration-300">
                            <box-icon name='package' color="currentColor"></box-icon>
                            <span>Manage Inventory</span>
                        </a>
                    </div>
                </div>
                <!-- Decorative Icon -->
                <div class="hidden xl:block relative">
                    <div class="absolute inset-0 bg-emerald-500/30 blur-[100px] rounded-full"></div>
                    <box-icon name='leaf' type='solid' color="rgba(255,255,255,0.1)" class="w-80 h-80 rotate-12 transform group-hover:rotate-[15deg] group-hover:scale-105 transition-all duration-700 ease-out"></box-icon>
                </div>
            </div>
            
            <!-- Background Pattern -->
            <div class="absolute top-0 right-0 -mt-32 -mr-32 w-[30rem] h-[30rem] bg-emerald-400/10 rounded-full blur-3xl mix-blend-overlay"></div>
            <div class="absolute bottom-0 left-0 -mb-32 -ml-32 w-[25rem] h-[25rem] bg-emerald-900/50 rounded-full blur-3xl mix-blend-multiply"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 brightness-100 contrast-150 mix-blend-overlay"></div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white dark:bg-[#1a2e1a] p-8 rounded-[2rem] border border-[#eff3ef] dark:border-white/5 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(16,185,129,0.1)] transition-all duration-300 group hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="size-14 bg-emerald-50 dark:bg-emerald-900/20 rounded-2xl flex items-center justify-center text-emerald-600 dark:text-emerald-400 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <box-icon name='flower' color="currentColor" class="text-3xl"></box-icon>
                    </div>
                    <div class="px-3 py-1 rounded-lg bg-emerald-50/50 dark:bg-emerald-900/10 text-emerald-600 dark:text-emerald-400 text-xs font-bold uppercase tracking-wider">
                        Inventory
                    </div>
                </div>
                <div>
                    <p class="text-4xl font-black text-[#111811] dark:text-white mb-2">{{ $totalPlants }}</p>
                    <p class="text-[#638863] dark:text-[#a3b8a3] font-medium text-sm flex items-center gap-2">
                        <span class="size-2 rounded-full bg-emerald-500"></span>
                        Total Plants Active
                    </p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white dark:bg-[#1a2e1a] p-8 rounded-[2rem] border border-[#eff3ef] dark:border-white/5 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(245,158,11,0.1)] transition-all duration-300 group hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="size-14 bg-amber-50 dark:bg-amber-900/20 rounded-2xl flex items-center justify-center text-amber-500 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <box-icon name='bell' type='solid' color="currentColor" class="text-3xl"></box-icon>
                    </div>
                    <div class="px-3 py-1 rounded-lg bg-amber-50/50 dark:bg-amber-900/10 text-amber-600 dark:text-amber-500 text-xs font-bold uppercase tracking-wider">
                        Attention
                    </div>
                </div>
                <div>
                    <p class="text-4xl font-black text-[#111811] dark:text-white mb-2">{{ $lowStockCount }}</p>
                    <p class="text-[#638863] dark:text-[#a3b8a3] font-medium text-sm flex items-center gap-2">
                        <span class="size-2 rounded-full bg-amber-500 animate-pulse"></span>
                        Items Low Stock
                    </p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white dark:bg-[#1a2e1a] p-8 rounded-[2rem] border border-[#eff3ef] dark:border-white/5 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(59,130,246,0.1)] transition-all duration-300 group hover:-translate-y-1">
                <div class="flex items-start justify-between mb-6">
                    <div class="size-14 bg-blue-50 dark:bg-blue-900/20 rounded-2xl flex items-center justify-center text-blue-500 group-hover:scale-110 group-hover:rotate-3 transition-transform duration-300">
                        <box-icon name='category' type='solid' color="currentColor" class="text-3xl"></box-icon>
                    </div>
                    <div class="px-3 py-1 rounded-lg bg-blue-50/50 dark:bg-blue-900/10 text-blue-600 dark:text-blue-400 text-xs font-bold uppercase tracking-wider">
                        Structure
                    </div>
                </div>
                <div>
                    <p class="text-4xl font-black text-[#111811] dark:text-white mb-2">{{ $categoriesCount }}</p>
                    <p class="text-[#638863] dark:text-[#a3b8a3] font-medium text-sm flex items-center gap-2">
                        <span class="size-2 rounded-full bg-blue-500"></span>
                        Total Categories
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Content Split -->
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            <!-- Left Column: Recent Activity -->
            <div class="xl:col-span-2 bg-white dark:bg-[#1a2e1a] p-6 lg:p-10 rounded-[2.5rem] border border-[#eff3ef] dark:border-white/5 shadow-sm h-full">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="text-2xl font-black text-[#111811] dark:text-white tracking-tight">Recent Additions</h3>
                        <p class="text-[#638863] dark:text-[#a3b8a3] font-medium mt-1">Freshly added to your catalog.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="group flex items-center gap-2 text-sm font-bold text-primary hover:text-green-700 transition-colors bg-primary/5 px-4 py-2 rounded-xl">
                        View Full Catalog <box-icon name='right-arrow-alt' color="currentColor" class="group-hover:translate-x-1 transition-transform"></box-icon>
                    </a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse($recentProducts as $product)
                        <div class="group flex flex-col p-5 rounded-3xl bg-[#f8faf8] dark:bg-white/5 border border-transparent hover:border-emerald-100 dark:hover:border-white/10 hover:bg-white dark:hover:bg-white/10 shadow-sm hover:shadow-md transition-all duration-300 h-full">
                            <div class="flex items-start justify-between w-full mb-4">
                                <div class="size-14 bg-white dark:bg-white/10 rounded-2xl flex shrink-0 items-center justify-center shadow-sm border border-black/5">
                                    <box-icon name='leaf' type='solid' color="#10b981" class="text-3xl"></box-icon>
                                </div>
                                <span class="bg-gray-100 dark:bg-white/10 px-2 py-1 rounded-lg text-[10px] font-bold text-[#638863] dark:text-[#a3bba3] uppercase tracking-wide">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                            </div>
                            
                            <div class="flex-grow min-w-0 mb-4">
                                <h4 class="text-lg font-bold text-[#111811] dark:text-white truncate group-hover:text-primary transition-colors">{{ $product->name }}</h4>
                                <div class="flex items-center gap-2 text-xs font-medium text-[#638863] dark:text-[#a3bba3] mt-2">
                                    <box-icon name='calendar' type='solid' color="#9ca3af" size="xs"></box-icon> {{ $product->created_at->format('M d, Y') }}
                                </div>
                            </div>
                            
                            <div class="mt-auto pt-4 border-t border-[#dce5dc] dark:border-white/5 flex items-center justify-between">
                                <p class="text-xl font-black text-[#111811] dark:text-white tracking-tight">${{ number_format($product->price, 2) }}</p>
                                <a href="{{ route('products.edit', $product) }}" class="inline-flex items-center gap-1 text-xs font-bold text-white bg-primary hover:bg-emerald-600 px-3 py-2 rounded-lg transition-colors shadow-sm">
                                    Edit <box-icon name='edit-alt' type='solid' color="currentColor" size="xs"></box-icon>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-16">
                            <div class="size-20 bg-gray-50 dark:bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                                <box-icon name='package' color="#9ca3af" class="text-4xl"></box-icon>
                            </div>
                            <h4 class="text-lg font-bold mb-2">No products found</h4>
                            <p class="text-gray-500 mb-6">Add your first product to get started.</p>
                            <a href="{{ route('products.create') }}" class="inline-flex items-center gap-2 bg-primary text-white px-6 py-2 rounded-xl font-bold">
                                <box-icon name='plus' color="currentColor"></box-icon> Add Product
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Right Column: Actions & Tips -->
            <div class="xl:col-span-1 flex flex-col gap-6">
                <!-- Actions Board -->
                <div class="bg-[#111811] dark:bg-[#1a2e1a] p-8 rounded-[2.5rem] text-white shadow-xl relative overflow-hidden group">
                     <div class="absolute top-0 right-0 p-8 opacity-10 group-hover:opacity-20 transition-opacity">
                        <box-icon name='rocket' type='solid' color="white" class="text-9xl rotate-45"></box-icon>
                    </div>
                    
                    <h3 class="text-2xl font-black mb-6 relative z-10">Rapid Actions</h3>
                    
                    <div class="flex flex-col gap-3 relative z-10">
                        <a href="{{ route('products.create') }}" class="flex items-center gap-4 p-4 bg-white/10 hover:bg-white/20 rounded-2xl border border-white/5 backdrop-blur-md transition-all group/item">
                            <div class="size-12 bg-white/10 rounded-xl flex items-center justify-center text-emerald-400 group-hover/item:bg-emerald-400 group-hover/item:text-[#111811] transition-colors">
                                <box-icon name='plus' color="currentColor"></box-icon>
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-sm truncate">Create Product</p>
                                <p class="text-xs text-white/60 truncate">Add to catalog</p>
                            </div>
                        </a>

                        <a href="{{ route('products.index') }}" class="flex items-center gap-4 p-4 bg-white/10 hover:bg-white/20 rounded-2xl border border-white/5 backdrop-blur-md transition-all group/item">
                            <div class="size-12 bg-white/10 rounded-xl flex items-center justify-center text-blue-400 group-hover/item:bg-blue-400 group-hover/item:text-[#111811] transition-colors">
                                <box-icon name='list-ul' color="currentColor"></box-icon>
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-sm truncate">View Catalog</p>
                                <p class="text-xs text-white/60 truncate">Manage items</p>
                            </div>
                        </a>
                        
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-4 p-4 bg-white/10 hover:bg-white/20 rounded-2xl border border-white/5 backdrop-blur-md transition-all group/item">
                            <div class="size-12 bg-white/10 rounded-xl flex items-center justify-center text-purple-400 group-hover/item:bg-purple-400 group-hover/item:text-[#111811] transition-colors">
                                <box-icon name='cog' type='solid' color="currentColor"></box-icon>
                            </div>
                            <div class="overflow-hidden">
                                <p class="font-bold text-sm truncate">Settings</p>
                                <p class="text-xs text-white/60 truncate">Profile & Admin</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Pro Tip -->
                <div class="bg-[#FFF8E7] dark:bg-amber-900/20 p-8 rounded-[2.5rem] border border-[#fde68a]/50 dark:border-amber-900/30 relative overflow-hidden flex-grow">
                    <div class="flex flex-col gap-4 relative z-10">
                        <div class="size-12 bg-amber-100 dark:bg-amber-900/40 rounded-2xl flex items-center justify-center text-amber-600 dark:text-amber-400">
                            <box-icon name='bulb' type='solid' color="currentColor" class="text-2xl"></box-icon>
                        </div>
                        <div>
                            <p class="text-xs font-bold text-amber-600 dark:text-amber-400 mb-1 tracking-wider uppercase">Pro Tip</p>
                            <p class="text-sm text-[#453712] dark:text-amber-100/80 font-medium leading-relaxed mb-4">
                                Check the public catalog to see how your products appear to customers.
                            </p>
                            <a href="{{ route('catalog.index') }}" class="text-sm font-bold text-[#111811] dark:text-white flex items-center gap-2 hover:gap-3 transition-all">
                                View Public Store <box-icon name='right-arrow-alt' size="xs" color="currentColor"></box-icon>
                            </a>
                        </div>
                    </div>
                     <!-- Decorative blob -->
                     <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-amber-200/50 dark:bg-amber-600/20 rounded-full blur-3xl"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
