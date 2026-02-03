<div class="max-w-2xl mx-auto">
    <!-- Page Heading -->
    <div class="mb-8">
        <h2 class="text-3xl font-black tracking-tight">Edit Product</h2>
        <p class="text-[#638863] dark:text-[#a3b8a3] mt-1 font-medium">Update details for {{ $product->name }}.</p>
    </div>
    <!-- Form Card -->
    <div class="bg-white dark:bg-[#1a2e1a] rounded-xl border border-[#dce5dc] dark:border-white/10 shadow-sm overflow-hidden p-8">
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="space-y-2">
                <label class="text-sm font-bold text-[#111811] dark:text-white">Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white placeholder-[#638863]">
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-[#111811] dark:text-white">Description</label>
                <textarea name="description" rows="4" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white placeholder-[#638863]">{{ $product->description }}</textarea>
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-[#111811] dark:text-white">Price ($)</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white">
                </div>
                
                <div class="space-y-2">
                    <label class="text-sm font-bold text-[#111811] dark:text-white">Stock Level</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white">
                </div>
            </div>
            <div class="space-y-2">
                <label class="text-sm font-bold text-[#111811] dark:text-white">Category</label>
                <select name="category_id" class="w-full bg-[#f0f4f0] dark:bg-white/5 border-none rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-primary/50 text-[#111811] dark:text-white">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pt-4 flex items-center justify-end gap-4">
                <a href="{{ route('products.index') }}" class="text-[#638863] dark:text-[#a3b8a3] font-bold text-sm hover:text-[#111811] dark:hover:text-white transition-colors">Cancel</a>
                <button type="submit" class="bg-primary hover:bg-primary/90 text-background-dark px-8 py-3 rounded-xl font-bold text-sm shadow-lg shadow-primary/20 transition-all">
                    Update Product
                </button>
            </div>
        </form>
    </div>
</div>
