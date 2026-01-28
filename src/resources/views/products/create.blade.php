<h1>Add Product</h1>

<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div>
        <label>Name:</label>
        <input type="text" name="name">
    </div>

    <div>
        <label>Description:</label>
        <textarea name="description"></textarea>
    </div>

    <div>
        <label>Price:</label>
        <input type="number" step="0.01" name="price">
    </div>

    <div>
        <label>Stock:</label>
        <input type="number" name="stock">
    </div>

    <div>
        <label>Category:</label>
        <select name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Add Product</button>
</form>
