@extends('layouts.app')

@section('title', 'Product Management')

@section('aside')
    <!-- Sidebar Navigation -->
@endsection

@section('content')
    <div class="max-w-[1600px] mx-auto p-6 lg:p-10 space-y-8">
        
        <!-- Header & Actions -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
            <div>
                <h2 class="text-4xl font-black text-[#111811] dark:text-white tracking-tight leading-tight">Inventory</h2>
                <p class="text-[#638863] dark:text-[#a3b8a3] text-lg font-medium mt-2">Manage your sustainable plant collection.</p>
            </div>
            
            <a href="{{ route('products.create') }}" class="group relative overflow-hidden bg-[#111811] dark:bg-white text-white dark:text-[#111811] px-8 py-4 rounded-2xl font-bold text-sm flex items-center gap-3 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-1">
                <box-icon name='plus-circle' type='solid' color="currentColor"></box-icon>
                <span class="tracking-wide">Add New Plant</span>
                <div class="absolute inset-0 bg-white/20 translate-y-full group-hover:translate-y-0 transition-transform duration-300"></div>
            </a>
        </div>

        <!-- Product Table Container -->
        <div class="bg-white dark:bg-[#1a2e1a] rounded-[2.5rem] border border-[#eff3ef] dark:border-white/5 shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#f8faf8] dark:bg-white/5 border-b border-[#eff3ef] dark:border-white/5">
                            <th class="px-8 py-6 text-xs font-bold uppercase tracking-widest text-[#638863] dark:text-[#a3b8a3]">Plant Name</th>
                            <th class="px-8 py-6 text-xs font-bold uppercase tracking-widest text-[#638863] dark:text-[#a3b8a3]">Category</th>
                            <th class="px-8 py-6 text-xs font-bold uppercase tracking-widest text-[#638863] dark:text-[#a3b8a3]">Status</th>
                            <th class="px-8 py-6 text-xs font-bold uppercase tracking-widest text-[#638863] dark:text-[#a3b8a3]">Price</th>
                            <th class="px-8 py-6 text-xs font-bold uppercase tracking-widest text-[#638863] dark:text-[#a3b8a3] text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#eff3ef] dark:divide-white/5">
                        @forelse($products as $product)
                            <tr class="group hover:bg-[#f8faf8] dark:hover:bg-white/5 transition-colors duration-200">
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="size-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                                            <box-icon name='leaf' type='solid' color="currentColor"></box-icon>
                                        </div>
                                        <div>
                                            <span class="text-base font-bold text-[#111811] dark:text-white block group-hover:text-primary transition-colors">{{ $product->name }}</span>
                                            <span class="text-xs text-[#638863] dark:text-[#a3b8a3]">ID: #{{ $product->id }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-8 py-5">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg text-xs font-bold bg-gray-100 dark:bg-white/10 text-[#638863] dark:text-[#a3b8a3]">
                                        <box-icon name='purchase-tag' type='solid' size="xs" color="currentColor" class="opacity-60"></box-icon>
                                        {{ $product->category ? $product->category->name : 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="px-8 py-5">
                                    @if($product->stock > 10)
                                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 dark:text-emerald-400">
                                            <span class="size-2 rounded-full bg-emerald-500"></span> In Stock ({{ $product->stock }})
                                        </span>
                                    @elseif($product->stock > 0)
                                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-amber-600 dark:text-amber-400">
                                            <span class="size-2 rounded-full bg-amber-500 animate-pulse"></span> Low Stock ({{ $product->stock }})
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-xs font-bold text-red-600 dark:text-red-400">
                                            <span class="size-2 rounded-full bg-red-500"></span> Out of Stock
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-5">
                                    <p class="text-base font-black text-[#111811] dark:text-white">${{ number_format($product->price, 2) }}</p>
                                </td>
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <a href="{{ route('products.edit', $product) }}" class="size-10 flex items-center justify-center rounded-xl bg-white dark:bg-white/5 border border-[#dce5dc] dark:border-white/10 text-[#638863] dark:text-[#a3b8a3] hover:text-primary hover:border-primary hover:bg-primary/5 transition-all shadow-sm" title="Edit">
                                            <box-icon name='edit-alt' type='solid' color="currentColor" size="sm"></box-icon>
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="size-10 flex items-center justify-center rounded-xl bg-white dark:bg-white/5 border border-[#dce5dc] dark:border-white/10 text-[#638863] dark:text-[#a3b8a3] hover:text-red-500 hover:border-red-200 hover:bg-red-50 transition-all shadow-sm" title="Delete">
                                                <box-icon name='trash' type='solid' color="currentColor" size="sm"></box-icon>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="size-20 bg-[#f8faf8] dark:bg-white/5 rounded-full flex items-center justify-center mb-4">
                                            <box-icon name='leaf' color="#9ca3af" size="lg"></box-icon>
                                        </div>
                                        <h3 class="text-lg font-bold text-[#111811] dark:text-white">No plants found</h3>
                                        <p class="text-[#638863] dark:text-[#a3b8a3] mt-1 max-w-sm">Your inventory is currently empty. Add your first plant to get started.</p>
                                        <a href="{{ route('products.create') }}" class="mt-6 text-sm font-bold text-primary hover:underline">Add New Plant</a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-8 py-6 border-t border-[#eff3ef] dark:border-white/5 bg-[#fcfdfc] dark:bg-white/5">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
