<h1>Edit Product</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ $product->name }}">
    </div>

    <div>
        <label>Description:</label>
        <textarea name="description">{{ $product->description }}</textarea>
    </div>

    <div>
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ $product->price }}">
    </div>

    <div>
        <label>Stock:</label>
        <input type="number" name="stock" value="{{ $product->stock }}">
    </div>

    <div>
        <label>Category:</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit">Update Product</button>
</form>
