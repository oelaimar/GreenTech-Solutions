    <!-- Page Heading -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-black tracking-tight">Products</h2>
            <p class="text-[#638863] dark:text-[#a3b8a3] mt-1 font-medium">Manage your sustainable inventory.</p>
        </div>
        <a href="{{ route('products.create') }}" class="bg-primary hover:bg-primary/90 text-background-dark px-6 py-3 rounded-xl font-bold text-sm flex items-center justify-center gap-2 shadow-lg shadow-primary/20 transition-all">
            <span class="material-symbols-outlined">add_circle</span>
            Add New Plant
        </a>
    </div>

    <!-- Product Table Container -->
    <div class="bg-white dark:bg-[#1a2e1a] rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm overflow-hidden">
        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-[#f0f4f0]/50 dark:bg-white/5">
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3]">Plant Name</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3]">Category</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3]">Price</th>
                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#638863] dark:text-[#a3b8a3] text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#dce5dc] dark:divide-white/10">
                    @foreach($products as $product)
                        <tr class="hover:bg-[#f0f4f0]/30 dark:hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-sm font-bold block">{{ $product->name }}</span>
                            </td>
                            <td class="px-6 py-4">
                                    {{ $product->category ? $product->category->name : 'Uncategorized' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-sm font-bold">${{ number_format($product->price, 2) }}</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('products.edit', $product) }}" class="size-8 flex items-center justify-center text-[#638863] dark:text-[#a3b8a3] hover:text-primary hover:bg-primary/10 rounded-lg transition-colors">
                                        <span class="material-symbols-outlined text-lg">edit</span>
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="size-8 flex items-center justify-center text-[#638863] dark:text-[#a3b8a3] hover:text-red-500 hover:bg-red-500/10 rounded-lg transition-colors">
                                            <span class="material-symbols-outlined text-lg">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-[#dce5dc] dark:border-white/10">
            {{ $products->links() }}
        </div>
    </div>
