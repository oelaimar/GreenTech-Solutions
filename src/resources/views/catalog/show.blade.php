@extends('layouts.app')

@section('title', $product->name . ' - GreenTech')

@section('aside')
@endsection

@section('content')
    <div class="max-w-[1200px] mx-auto p-6 lg:p-10">
        
        <!-- Breadcrumbs -->
        <a href="{{ route('catalog.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-[#638863] hover:text-emerald-600 mb-8 group">
            <box-icon name='arrow-back' size="xs" color="currentColor" class="group-hover:-translate-x-1 transition-transform"></box-icon>
            Back to Catalog
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20">
            <!-- Left: Image Gallery -->
            <div class="flex flex-col gap-6">
                <div class="aspect-[4/5] rounded-[2.5rem] bg-[#f0f4f0] dark:bg-emerald-900/20 flex items-center justify-center border border-[#eff3ef] dark:border-white/5 relative overflow-hidden group">
                    <box-icon name='leaf' color="#a3b8a3" size="lg" class="scale-150 opacity-50"></box-icon>
                    
                    <!-- New Arrival Badge -->
                    <div class="absolute top-6 left-6 bg-[#111811] text-white text-xs font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg">
                        Premium Choice
                    </div>
                </div>
            </div>

            <!-- Right: Product Details -->
            <div class="flex flex-col justify-center">
                <div class="mb-6">
                    <span class="text-emerald-600 font-bold uppercase tracking-widest text-xs mb-2 block">{{ $product->category->name }}</span>
                    <h1 class="text-4xl lg:text-5xl font-black text-[#111811] dark:text-white leading-tight mb-4">{{ $product->name }}</h1>
                    <div class="flex items-center gap-4">
                        <span class="text-3xl font-black text-[#111811] dark:text-white">${{ number_format($product->price, 2) }}</span>
                        @if($product->stock > 0)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-400 text-xs font-bold">
                                <span class="size-2 rounded-full bg-emerald-500"></span> In Stock
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-100 dark:bg-red-900/30 text-red-700 dark:text-red-400 text-xs font-bold">
                                <span class="size-2 rounded-full bg-red-500"></span> Out of Stock
                            </span>
                        @endif
                    </div>
                </div>

                <div class="prose prose-emerald dark:prose-invert max-w-none text-[#638863] dark:text-[#a3b8a3] font-medium leading-relaxed mb-10">
                    <p>{{ $product->description }}</p>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="flex-1 bg-[#111811] dark:bg-white text-white dark:text-[#111811] h-14 rounded-2xl font-bold text-sm tracking-wide flex items-center justify-center gap-3 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <box-icon name='cart-add' type='solid' color="currentColor"></box-icon>
                        Add to Cart
                    </button>
                    
                    <form action="{{ route('favorite.toggle', $product->id) }}" method="POST" class="sm:flex-none">
                        @csrf
                        <button type="submit" class="w-full sm:w-16 h-14 rounded-2xl border-2 border-[#eff3ef] dark:border-white/10 flex items-center justify-center hover:border-red-200 hover:bg-red-50 transition-colors group">
                            @if(auth()->check() && auth()->user()->favorite->contains($product->id))
                                <box-icon name='heart' type='solid' color="#ef4444"></box-icon>
                            @else
                                <box-icon name='heart' color="#638863" class="group-hover:text-red-500 transition-colors"></box-icon>
                            @endif
                        </button>
                    </form>
                </div>

                <!-- Guarantees -->
                <div class="grid grid-cols-2 gap-4 mt-10 p-6 rounded-2xl bg-[#f8faf8] dark:bg-white/5 border border-[#eff3ef] dark:border-white/5">
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-700 dark:text-emerald-400">
                            <box-icon name='check-shield' type='solid' color="currentColor"></box-icon>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-[#111811] dark:text-white">Quality Guarantee</span>
                            <span class="text-[10px] uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3]">7 Day Return</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="size-10 rounded-full bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-700 dark:text-emerald-400">
                            <box-icon name='package' type='solid' color="currentColor"></box-icon>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-[#111811] dark:text-white">Secure Shipping</span>
                            <span class="text-[10px] uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3]">Eco Packaging</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
