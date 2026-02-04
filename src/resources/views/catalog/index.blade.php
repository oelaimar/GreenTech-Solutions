@extends('layouts.app')

@section('title', 'category')

@section('aside')
    <!-- Sidebar Navigation -->
@endsection
@section('content')
    <!-- PageHeading -->
<div class="px-4 md:px-10 lg:px-40 py-8">
    <div class="flex flex-wrap justify-between items-end gap-3 mb-8">
        <div class="flex min-w-72 flex-col gap-2">
            <p class="text-[#111811] dark:text-white text-5xl font-black leading-tight tracking-[-0.033em]">Public Plant Catalog</p>
            <p class="text-[#638863] dark:text-[#a3bba3] text-lg font-normal leading-normal max-w-2xl">Discover a curated collection of sustainably grown greenery for every corner of your life.</p>
        </div>

        <!-- Mobile Search (if not in header) -->
        <form method="GET" action="{{ route('catalog.index') }}" class="w-full md:w-auto">
            <div class="relative flex items-center">
                <span class="absolute left-3 material-symbols-outlined text-[#638863]">search</span>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search products..." class="pl-10 pr-4 py-2.5 w-full md:w-80 rounded-xl border border-[#e0e8e0] dark:border-[#223322] bg-white dark:bg-[#1a2e1a] text-[#111811] dark:text-white focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary placeholder-[#638863] dark:placeholder-[#a3bba3] transition-all">
            </div>
        </form>
    </div>
    <!-- Chips / Category Filters -->
    <div class="flex gap-3 mb-8 flex-wrap">
        <a href="{{ route('catalog.index') }}" class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-xl px-6 cursor-pointer shadow-sm transition-colors {{ !request('category') ? 'bg-primary text-white' : 'bg-white dark:bg-[#1a2e1a] border border-[#e0e8e0] dark:border-[#223322] text-[#111811] dark:text-white hover:border-primary' }}">
            @if(!request('category')) <span class="material-symbols-outlined text-lg">filter_alt</span> @endif
            <p class="text-sm {{ !request('category') ? 'font-semibold' : 'font-medium' }}">All Plants</p>
        </a>

        @foreach($categories as $category)
            @php $isActive = request('category') == $category->id; @endphp
            <a href="{{ route('catalog.index', ['category' => $category->id]) }}" class="flex h-10 shrink-0 items-center justify-center gap-x-2 rounded-xl px-6 cursor-pointer shadow-sm transition-colors {{ $isActive ? 'bg-primary text-white' : 'bg-white dark:bg-[#1a2e1a] border border-[#e0e8e0] dark:border-[#223322] text-[#111811] dark:text-white hover:border-primary' }}">
                @if($isActive) <span class="material-symbols-outlined text-lg">check</span> @endif
                <p class="text-sm {{ $isActive ? 'font-semibold' : 'font-medium' }}">{{ $category->name }}</p>
            </a>
        @endforeach
    </div>
    <!-- ImageGrid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @foreach($products as $product)
            <!-- Plant Card -->
            <div class="flex flex-col gap-4 bg-white dark:bg-[#1a2e1a] p-4 rounded-xl border border-[#e0e8e0] dark:border-[#223322] shadow-sm hover:shadow-md transition-shadow group duration-300">
                <div class="relative w-full overflow-hidden rounded-lg">
                    <div class="absolute top-3 left-3 bg-white/90 dark:bg-black/70 backdrop-blur px-3 py-1 rounded-full shadow-sm">
                        <span class="text-[10px] uppercase font-bold tracking-wider text-[#111811] dark:text-white">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                    </div>
                </div>
                <div class="flex flex-col flex-grow">
                    <div class="flex justify-between items-start mb-1">
                        <h3 class="text-[#111811] dark:text-white text-lg font-bold leading-tight line-clamp-1 hover:text-primary transition-colors">
                            <a href="{{ route('catalog.show', $product) }}">{{ $product->name }}</a>
                        </h3>
                        <p class="text-primary font-bold text-lg">${{ number_format($product->price, 2) }}</p>
                    </div>
                    <p class="text-[#638863] dark:text-[#a3bba3] text-sm font-normal mb-4 line-clamp-2">Sustainably sourced, perfect for your home.</p>

                    <div class="mt-auto">
                        <button class="w-full bg-primary text-[#112111] font-bold py-2.5 rounded-lg text-sm hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-lg">add_shopping_cart</span> Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-12">
        {{ $products->links() }}
    </div>
</div>

@endsection
