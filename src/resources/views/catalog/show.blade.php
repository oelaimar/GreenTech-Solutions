<h1>{{ $product->name }}</h1>

<p><strong>Category:</strong> {{ $product->category->name }}</p>
<p><strong>Price:</strong> ${{ $product->price }}</p>
<p><strong>Stock:</strong> {{ $product->stock }}</p>

<hr>

<p>{{ $product->description }}</p>

<a href="{{ route('catalog.index') }}">← Back to catalog</a>
