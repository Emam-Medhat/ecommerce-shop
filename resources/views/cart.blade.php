<x-navbar title="page cart">

<style>
/* ===== القواعد الأساسية ===== */
body {
    background: linear-gradient(135deg, #f3f4f7, #ffffff);
    font-family: "Cairo", sans-serif;
    color: #333;
}

h2 {
    font-weight: 700;
    color: #222;
    text-align: center;
    position: relative;
}

h2::after {
    content: "";
    display: block;
    width: 80px;
    height: 4px;
    background: #007bff;
    margin: 10px auto 0;
    border-radius: 2px;
    animation: expandLine 1s ease forwards;
}

@keyframes expandLine {
    from { width: 0; opacity: 0; }
    to { width: 80px; opacity: 1; }
}

/* ===== كروت المنتجات ===== */
.card {
    border: none;
    border-radius: 18px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
    transform: scale(1);
    transition: all 0.35s ease;
    animation: fadeIn 0.6s ease forwards;
}

.card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== صور المنتجات ===== */
.card-body img {
    border-radius: 15px;
    transition: transform 0.4s ease;
}
.card-body img:hover {
    transform: scale(1.08);
}

/* ===== الأزرار ===== */
.btn {
    border-radius: 30px;
    font-weight: 600;
    padding: 10px 20px;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: scale(1.08);
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.25);
}

/* ===== أزرار مجموعة الإجراءات ===== */
.btn-group-cart {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 25px;
}

/* ===== إجمالي السلة ===== */
.card-total {
    border-radius: 18px;
    background: linear-gradient(135deg, #e8f0fe, #ffffff);
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
    transition: 0.3s ease;
}
.card-total:hover {
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

/* ===== السعر ===== */
.price {
    color: #007bff;
    font-size: 1.1rem;
    font-weight: 600;
}

/* ===== السلة الفارغة ===== */
.empty-cart i {
    color: #bbb;
    animation: pulse 1.2s infinite alternate ease-in-out;
}

@keyframes pulse {
    from { transform: scale(1); opacity: 0.7; }
    to { transform: scale(1.15); opacity: 1; }
}
</style>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5">🛍️ سلة التسوق</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($cartItems->isEmpty())
                <div class="text-center py-5 empty-cart">
                    <i class="fas fa-shopping-cart fa-4x mb-3"></i>
                    <h4 class="text-muted">السلة فارغة</h4>
                    <p class="text-muted">ابدأ التسوق الآن وأضف منتجاتك المفضلة.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4">عرض المنتجات</a>
                </div>
            @else
                @php $total = 0; @endphp
                @foreach($cartItems as $item)
                    @php
                        $price = $item->price;
                        $qty = $item->quantity;
                        $subtotal = $price * $qty;
                        $total += $subtotal;
                    @endphp

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2 text-center">
                                   <img src="{{ $item->product->image 
            ? (Str::startsWith($item->product->image, ['http://','https://']) 
                ? $item->product->image 
                : asset('storage/' . $item->product->image)) 
            : asset('storage/default.png') }}" 
     alt="{{ $item->product->name ?? 'Product' }}" 
     class="img-fluid shadow-sm" 
     style="height: 80px; object-fit: cover;">

                                </div>

                                <div class="col-md-4">
                                    <h5 class="fw-bold">{{ $item->product->name ?? 'اسم المنتج' }}</h5>
                                    <p class="text-muted mb-1">السعر: <span class="price">${{ number_format($price, 2) }}</span></p>
                                </div>

                                <div class="col-md-3">
                                    <form action="{{ route('cart.update', $item->product_id) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="qty" value="{{ $qty }}" min="1"
                                                class="form-control text-center rounded-pill shadow-sm">
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-sm mt-2 w-100">تحديث</button>
                                    </form>
                                </div>

                                <div class="col-md-3 text-end">
                                    <h6 class="mb-2">الإجمالي: <span class="price">${{ number_format($subtotal, 2) }}</span></h6>
                                    <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('هل تريد حذف {{ $item->product->name ?? 'هذا المنتج' }}؟')">
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="card card-total mt-4 p-4">
                    <div class="card-body text-end">
                        <h4 class="text-primary fw-bold mb-3">الإجمالي الكلي: ${{ number_format($total, 2) }}</h4>
                        <div class="btn-group-cart">
                            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg px-4">الدفع الآن</a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg px-4">متابعة التسوق</a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-lg px-4"
                                    onclick="return confirm('هل تريد تفريغ السلة بالكامل؟')">
                                    تفريغ السلة
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

</x-navbar>
