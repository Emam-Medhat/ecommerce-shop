<x-navbar>

<div class="container py-5">

    {{-- العنوان الرئيسي --}}
    <h2 class="text-center mb-5 text-primary fw-bold" style="font-size: 2.5rem;">
        💖 المنتجات المفضلة
    </h2>

    {{-- في حالة عدم وجود منتجات --}}
    @if($favorites->isEmpty())
        <div class="alert alert-info text-center py-4 fs-5 shadow-sm rounded-4">
            لا توجد منتجات مفضلة حالياً.
        </div>
    @else

        {{-- زر حذف جميع المفضلات --}}
        <div class="text-center mb-4">
            <form action="{{ route('favorites.clear') }}" method="POST"
                  onsubmit="return confirm('هل أنت متأكد أنك تريد حذف جميع المنتجات المفضلة؟');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-4 fw-semibold shadow-sm">
                    🗑️ حذف جميع المفضلة
                </button>
            </form>
        </div>

        {{-- عرض المنتجات --}}
        <div class="row g-4">
            @foreach($favorites as $favorite)
                @php $product = $favorite->product; @endphp

                @if($product)
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 border-0 rounded-4 overflow-hidden shadow-lg favorite-card position-relative">

                            {{-- صورة المنتج --}}
                            <div class="overflow-hidden">
                             <img src="{{ $product->image
            ? (Str::startsWith($product->image, ['http://','https://'])
                ? $product->image
                : asset('storage/' . $product->image))
            : asset('storage/default.png') }}"
     class="card-img-top product-image"
     alt="{{ $product->name }}">

                            </div>

                            {{-- بيانات المنتج --}}
                            <div class="card-body text-center p-4">
                                <h5 class="card-title text-dark fw-bold mb-2">{{ $product->name }}</h5>
                                <p class="card-text text-muted small mb-3">{{ Str::limit($product->description, 80) }}</p>
                                <p class="fw-bold text-success fs-5 mb-3">{{ number_format($product->price, 2) }} جنيه</p>

                                {{-- الأزرار --}}
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-outline-primary btn-hover">
                                        👁️ عرض المنتج
                                    </a>

                                    <form action="{{ route('favorites.remove', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-hover">
                                            ❤️ إزالة
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

</div>

{{-- ===== CSS مخصص للتصميم ===== --}}
<style>
/* صورة المنتج */
.product-image {
    height: 220px;
    object-fit: cover;
    transition: transform 0.3s ease, filter 0.3s ease;
}

.favorite-card:hover .product-image {
    transform: scale(1.08);
    filter: brightness(0.85);
}

/* تأثير الكارد */
.favorite-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.favorite-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.2);
}

/* أزرار */
.btn-hover {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.btn-hover:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

/* تحسين النصوص */
.card-title {
    font-size: 1.25rem;
}
.card-text {
    font-size: 0.95rem;
}

/* تنسيق الـ alert */
.alert {
    font-size: 1.1rem;
}

/* متجاوب */
@media (max-width: 768px) {
    .product-image {
        height: 200px;
    }
}
@media (max-width: 576px) {
    .product-image {
        height: 180px;
    }
}
</style>

</x-navbar>
