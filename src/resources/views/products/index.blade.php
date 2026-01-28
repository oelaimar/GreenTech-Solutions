<h1>Products</h1>

@foreach($products as $product)
    <div>
        <strong>{{ $product->name }}</strong> -
        Category: {{ $product->category->name }} -
        Price: ${{ $product->price }}

        <a href="{{ route('products.edit', $product->id) }}">
            Edit
        </a>
        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

{{ $products->links() }} {{-- Pagination links --}}
