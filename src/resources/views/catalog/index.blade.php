<h1>GreenTech Catalog</h1>
<form method="GET" action="{{ route('catalog.index') }}">
    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search product...">
    <button type="submit">Search</button>
</form>
<hr>
<h2>Categories</h2>

<ul>
    <li>
        <a href="{{ route('catalog.index') }}">All</a>
    </li>
    @foreach($categories as $category)
        <li>
            <a href="{{ route('catalog.index', ['category' => $category->id]) }}">
                {{ $category->name }}
            </a>
        </li>
    @endforeach
</ul>

<hr>

@foreach($products as $product)
    <div style="margin-bottom: 10px;">
        <a href="{{ route('catalog.show', $product) }}">
            <strong>{{ $product->name }}</strong>
        </a><br>
        Category: {{ $product->category->name }}<br>
        Price: ${{ $product->price }}
    </div>
@endforeach

{{ $products->links() }}
