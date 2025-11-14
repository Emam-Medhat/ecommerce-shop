<x-navbar>
<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5">{{ __('messages.shopping_cart') }}</h2>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($cartItems->isEmpty())
                <div class="text-center py-5 empty-cart">
                    <i class="fas fa-shopping-cart fa-4x mb-3"></i>
                    <h4 class="text-muted">{{ __('messages.cart_empty') }}</h4>
                    <p class="text-muted">{{ __('messages.cart_empty_info') }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4">{{ __('messages.view_products') }}</a>
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
                                    <h5 class="fw-bold">{{ $item->product->name ?? __('messages.shopping_cart') }}</h5>
                                    <p class="text-muted mb-1">{{ __('messages.price') }}: <span class="price">${{ number_format($price, 2) }}</span></p>
                                </div>

                                <div class="col-md-3">
                                    <form action="{{ route('cart.update', $item->product_id) }}" method="POST">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="qty" value="{{ $qty }}" min="1"
                                                class="form-control text-center rounded-pill shadow-sm">
                                        </div>
                                        <button type="submit" class="btn btn-outline-primary btn-sm mt-2 w-100">{{ __('messages.update') }}</button>
                                    </form>
                                </div>

                                <div class="col-md-3 text-end">
                                    <h6 class="mb-2">{{ __('messages.total') }}: <span class="price">${{ number_format($subtotal, 2) }}</span></h6>
                                    <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow-sm"
                                            onclick="return confirm('{{ __('messages.confirm_delete', ['item' => $item->product->name ?? 'هذا المنتج']) }}')">
                                            {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="card card-total mt-4 p-4">
                    <div class="card-body text-end">
                        <h4 class="text-primary fw-bold mb-3">{{ __('messages.total_amount') }}: ${{ number_format($total, 2) }}</h4>
                        <div class="btn-group-cart">
                            <a href="{{ route('checkout') }}" class="btn btn-success btn-lg px-4">{{ __('messages.checkout_now') }}</a>
                            <a href="{{ route('products.index') }}" class="btn btn-secondary btn-lg px-4">{{ __('messages.continue_shopping') }}</a>
                            <form action="{{ route('cart.clear') }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-lg px-4"
                                    onclick="return confirm('{{ __('messages.confirm_clear_cart') }}')">
                                    {{ __('messages.clear_cart') }}
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
