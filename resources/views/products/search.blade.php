<x-navbar>
<div class="container py-5">
    <h3>نتائج البحث عن: <strong>{{ $query }}</strong></h3>

    <div class="row mt-4">
        @forelse($results as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">

                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">{{ $product->price }} EGP</p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">عرض المنتج</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-danger">لا توجد منتجات مطابقة لبحثك.</p>
        @endforelse
    </div>
</div>

</x-navbar>
