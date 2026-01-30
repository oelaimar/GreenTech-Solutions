<x-admin-layout>
    <!-- Page Heading -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-3xl font-black tracking-tight">Dashboard</h2>
            <p class="text-[#638863] dark:text-[#a3b8a3] mt-1 font-medium">Welcome back, {{ Auth::user()->name }}!</p>
        </div>
        <button class="bg-primary hover:bg-primary/90 text-background-dark px-6 py-3 rounded-xl font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-primary/20 transition-all">
            <span class="material-symbols-outlined">add_circle</span>
            Quick Action
        </button>
    </div>

    <!-- Stats Summary -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white dark:bg-[#1a2e1a] p-6 rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm flex items-center gap-5">
            <div class="size-12 bg-primary/10 rounded-xl flex items-center justify-center text-primary">
                <span class="material-symbols-outlined text-3xl">inventory_2</span>
            </div>
            <div>
                <p class="text-sm font-medium text-[#638863] dark:text-[#a3b8a3]">Total Plants</p>
                <p class="text-2xl font-black">{{ $totalPlants }}</p>
                <span class="text-xs font-bold text-emerald-600">Active products</span>
            </div>
        </div>
        <div class="bg-white dark:bg-[#1a2e1a] p-6 rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm flex items-center gap-5">
            <div class="size-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500">
                <span class="material-symbols-outlined text-3xl">warning</span>
            </div>
            <div>
                <p class="text-sm font-medium text-[#638863] dark:text-[#a3b8a3]">Low Stock Items</p>
                <p class="text-2xl font-black">{{ $lowStockCount }}</p>
                <span class="text-xs font-bold text-amber-600">Requires attention</span>
            </div>
        </div>
        <div class="bg-white dark:bg-[#1a2e1a] p-6 rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm flex items-center gap-5">
            <div class="size-12 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-500">
                <span class="material-symbols-outlined text-3xl">category</span>
            </div>
            <div>
                <p class="text-sm font-medium text-[#638863] dark:text-[#a3b8a3]">Categories</p>
                <p class="text-2xl font-black">{{ $categoriesCount }}</p>
                <span class="text-xs font-bold text-blue-600">Active categories</span>
            </div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div class="bg-white dark:bg-[#1a2e1a] p-6 rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm">
        <h3 class="text-lg font-bold mb-4">Recent Products Added</h3>
        <div class="space-y-3">
            @forelse($recentProducts as $product)
                <div class="flex items-center gap-3 p-3 rounded-lg hover:bg-[#f0f4f0] dark:hover:bg-white/5 transition-colors">
                    <div class="size-10 bg-gray-100 dark:bg-gray-800 rounded-lg flex items-center justify-center">
                         <span class="material-symbols-outlined text-gray-400">image</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-[#111811] dark:text-white">{{ $product->name }}</p>
                        <p class="text-xs text-[#638863] dark:text-[#a3bba3]">Added on {{ $product->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="ml-auto">
                        <span class="text-xs font-bold text-primary">${{ $product->price }}</span>
                    </div>
                </div>
            @empty
                <p class="text-[#638863] dark:text-[#a3bba3] text-sm">No recent activity.</p>
            @endforelse
        </div>
    </div>
</x-admin-layout>
