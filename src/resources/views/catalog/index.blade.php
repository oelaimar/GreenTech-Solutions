@extends('layouts.app')

@section('title', 'Public Catalog')

@section('aside')
    <!-- Sidebar Navigation -->
@endsection

@section('content')
    <div class="max-w-[1600px] mx-auto p-6 lg:p-10 space-y-10">
        
        <!-- Hero / Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 relative z-10">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-black text-[#111811] dark:text-white tracking-tight leading-tight mb-4">
                    Find Your Perfect <span class="text-emerald-600">Green Companion</span>
                </h2>
                <p class="text-[#638863] dark:text-[#a3b8a3] text-lg font-medium leading-relaxed">
                    Explore our curated collection of sustainably grown plants. Each one is cared for with love and ready to brighten your space.
                </p>
            </div>
            
            <!-- Search Bar -->
            <form method="GET" action="{{ route('catalog.index') }}" class="w-full md:w-auto relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <box-icon name='search' color="#638863"></box-icon>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search specifically..." 
                    class="w-full md:w-80 pl-12 pr-4 py-4 rounded-2xl border border-[#eff3ef] dark:border-white/10 bg-white dark:bg-[#1a2e1a] text-[#111811] dark:text-white font-medium shadow-sm focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 transition-all placeholder-[#a3b8a3]">
            </form>
        </div>

        <!-- Filter Chips -->
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('catalog.index') }}" 
               class="px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 {{ !request('category') ? 'bg-[#111811] text-white shadow-lg shadow-emerald-900/20' : 'bg-white dark:bg-[#1a2e1a] text-[#638863] dark:text-[#a3b8a3] border border-[#eff3ef] dark:border-white/10 hover:border-emerald-500 hover:text-emerald-600' }}">
                All Plants
            </a>
            @foreach($categories as $category)
                @php $isActive = request('category') == $category->id; @endphp
                <a href="{{ route('catalog.index', ['category' => $category->id]) }}" 
                   class="px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 flex items-center gap-2 {{ $isActive ? 'bg-[#111811] text-white shadow-lg shadow-emerald-900/20' : 'bg-white dark:bg-[#1a2e1a] text-[#638863] dark:text-[#a3b8a3] border border-[#eff3ef] dark:border-white/10 hover:border-emerald-500 hover:text-emerald-600' }}">
                   @if($isActive) <box-icon name='check' size="xs" color="currentColor"></box-icon> @endif
                   {{ $category->name }}
                </a>
            @endforeach
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="group bg-white dark:bg-[#1a2e1a] rounded-[2rem] border border-[#eff3ef] dark:border-white/5 p-4 flex flex-col gap-4 hover:shadow-xl hover:shadow-emerald-900/5 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden">
                    
                    <!-- Image Placeholder -->
                    <div class="aspect-square rounded-[1.5rem] bg-[#f0f4f0] dark:bg-emerald-900/20 flex items-center justify-center relative overflow-hidden group-hover:bg-[#e6ebe6] transition-colors">
                        <box-icon name='leaf' color="#a3b8a3" size="lg" class="opacity-50 group-hover:scale-110 transition-transform duration-500"></box-icon>
                        
                        <!-- Floating Action Button -->
                        <div class="absolute top-4 right-4 translate-x-12 group-hover:translate-x-0 transition-transform duration-300 delay-75">
                            <form action="{{ route('favorite.toggle', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="size-10 bg-white dark:bg-[#111811] rounded-full flex items-center justify-center shadow-md hover:scale-110 transition-transform text-red-500">
                                    @if(auth()->check() && auth()->user()->favorite->contains($product->id))
                                        <box-icon name='heart' type='solid' color="currentColor"></box-icon>
                                    @else
                                        <box-icon name='heart' color="currentColor"></box-icon>
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col flex-1 px-2 pb-2">
                        <div class="flex justify-between items-start mb-2">
                            <div>
                                <p class="text-xs font-bold text-emerald-600 uppercase tracking-wider mb-1">{{ $product->category->name ?? 'Plant' }}</p>
                                <a href="{{ route('catalog.show', $product) }}" class="block">
                                    <h3 class="text-xl font-black text-[#111811] dark:text-white leading-tight group-hover:text-emerald-700 transition-colors">
                                        {{ $product->name }}
                                    </h3>
                                </a>
                            </div>
                            <span class="text-lg font-black text-[#111811] dark:text-white">${{ number_format($product->price, 0) }}</span>
                        </div>
                        
                        <p class="text-sm text-[#638863] dark:text-[#a3b8a3] font-medium line-clamp-2 mb-6">
                            {{ $product->description }}
                        </p>

                        <div class="mt-auto pt-4 border-t border-[#eff3ef] dark:border-white/5">
                            <a href="{{ route('catalog.show', $product) }}" class="w-full flex items-center justify-between group/btn">
                                <span class="text-sm font-bold text-[#111811] dark:text-white">View Details</span>
                                <div class="size-8 rounded-full bg-[#111811] dark:bg-white text-white dark:text-[#111811] flex items-center justify-center group-hover/btn:scale-110 transition-transform">
                                    <box-icon name='right-arrow-alt' color="currentColor"></box-icon>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <div class="size-24 bg-[#f0f4f0] dark:bg-white/5 rounded-full flex items-center justify-center mx-auto mb-6">
                        <box-icon name='search-alt' color="#a3b8a3" size="lg"></box-icon>
                    </div>
                    <h3 class="text-2xl font-black text-[#111811] dark:text-white mb-2">No plants found</h3>
                    <p class="text-[#638863]">Try adjusting your search or filters to find what you're looking for.</p>
                    <a href="{{ route('catalog.index') }}" class="inline-block mt-6 font-bold text-emerald-600 hover:text-emerald-700">Clear all filters</a>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
@endsection
