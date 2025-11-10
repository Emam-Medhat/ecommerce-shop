<x-navbar title="{{ $category->name }}" />

<div class="container py-5">
    <h2 class="mb-4">منتجات قسم {{ $category->name }}</h2>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->price }} جنيه</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
