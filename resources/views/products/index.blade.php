<x-navbar title="المنتجات">

<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">قائمة المنتجات</h2>

    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                        <p class="text-muted">حالة المنتج: <strong>{{ $product->condition }}</strong></p>

                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">

                    <div class="card-body text-center">
                        <h5 class="fw-bold">{{ $product->name }}</h5>
                        <p class="text-muted">{{ $product->category }}</p>

                        <p>
                            <del>${{ $product->price }}</del>
                            <span class="text-danger fw-bold">${{ $product->discount_price }}</span>
                        </p>

                        <ul class="list-unstyled">
                            @foreach ($product->attributes as $attr)
                                <li><strong>{{ $attr->name }}:</strong> {{ $attr->value }}</li>
                            @endforeach
                        </ul>

                        <button class="btn btn-primary w-100">🛒 أضف إلى السلة</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</x-navbar>
