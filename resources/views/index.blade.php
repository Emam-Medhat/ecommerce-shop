@php
    $mainCategories = ['Electronics', 'Home Appliances', 'Books','Clothing', 'Games'];
@endphp

<x-navbar title="Home Page">

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Electro - Electronics Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        *, *::before, *::after {
            text-align: center;
        }
        .electro-products-grid {
            margin: 3rem auto;
            width: 85%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        .electro-product-item {
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0,0,0,0.08);
            transition: all 0.6s ease;
            position: relative;
            opacity: 0.75;
            transform: scale(0.96);
        }
        .electro-product-item:hover,
        .electro-product-item.active-slide {
            transform: translateY(-8px) scale(1);
            box-shadow: 0 10px 28px rgba(0,0,0,0.15);
            opacity: 1;
            z-index: 10;
        }
        /* IMAGE SECTION */
        .electro-product-image {
            position: relative;
            overflow: hidden;
            height: 250px;
            background: #f9fafc;
        }
        .electro-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }
        .electro-product-item:hover img,
        .electro-product-item.active-slide img {
            transform: scale(1.08);
        }
        /* Overlay buttons */
        .electro-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .electro-product-item:hover .electro-overlay,
        .electro-product-item.active-slide .electro-overlay {
            opacity: 1;
        }
        .overlay-btn {
            background: #fff;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            color: #f28b00;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            font-size: 18px;
        }
        .overlay-btn:hover {
            background: #f28b00;
            color: #fff;
            transform: scale(1.1);
        }
        /* PRODUCT INFO */
        .electro-product-info {
            padding: 15px 18px;
            text-align: center;
        }
        .product-category {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 5px;
        }
        .product-name {
            font-weight: 600;
            color: #222;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }
        .product-name:hover {
            color: #f28b00;
        }
        .product-price {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
        }
        .product-price del {
            color: #aaa;
            font-size: 0.9rem;
        }
        .product-price span {
            color: #f28b00;
            font-weight: 700;
            font-size: 1.1rem;
        }
        /* FOOTER BUTTON */
        .electro-product-footer {
            padding: 15px;
            text-align: center;
            border-top: 1px solid #eee;
        }
        .btn-view {
            display: inline-block;
            background: #f28b00;
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        .btn-view:hover {
            background: #e07a00;
            box-shadow: 0 4px 12px rgba(242, 139, 0, 0.4);
        }
        /* Responsive */
        @media (max-width: 768px) {
            .electro-products-grid {
                width: 95%;
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
                gap: 15px;
            }
            .electro-product-image {
                height: 200px;
            }
        }
        /* صفوف الفئات */
        .category-section {
            margin-bottom: 50px;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            max-width: 80%;
            margin-left: 10%;
        }
        .category-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 25px;
            text-align: center;
            font-weight: 600;
        }
        .products-row {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding: 10px 0;
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .products-row::-webkit-scrollbar {
            display: none;
        }
        .electro-product-item {
            flex: 0 0 280px;
            min-width: 280px;
            scroll-snap-align: start;
        }

        /* أنيميشن fade in للمنتج النشط */
        @keyframes fadeInScale {
            0% {
                opacity: 0.75;
                transform: scale(0.96);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .electro-product-item.active-slide {
            animation: fadeInScale 0.6s ease forwards;
        }

        @media (max-width: 768px) {
            .products-row { gap: 15px; }
            .electro-product-item { flex: 0 0 250px; min-width: 250px; }
        }
    </style>
</head>

<body>
    <!-- Carousel Start -->
 <div class="container-fluid carousel bg-light px-0">
    <div class="row g-0 justify-content-end">
        <div class="col-12 col-lg-7 col-xl-9">
            <div class="header-carousel owl-carousel bg-light py-5">

                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="img/carousel-1.png" class="img-fluid w-100" alt="Image">
                    </div>

                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">
                            {{ __('messages.save_up_to_400') }}
                        </h4>

                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">
                            {{ __('messages.selected_laptops_desktops') }}
                        </h1>

                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">
                            {{ __('messages.terms_conditions') }}
                        </p>

                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="#">
                            {{ __('messages.shop_now') }}
                        </a>
                    </div>
                </div>

                <div class="row g-0 header-carousel-item align-items-center">
                    <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                        <img src="img/carousel-2.png" class="img-fluid w-100" alt="Image">
                    </div>

                    <div class="col-xl-6 carousel-content p-4">
                        <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s" style="letter-spacing: 3px;">
                            {{ __('messages.save_up_to_200') }}
                        </h4>

                        <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">
                            {{ __('messages.selected_laptops_desktops') }}
                        </h1>

                        <p class="text-dark wow fadeInRight" data-wow-delay="0.5s">
                            {{ __('messages.terms_conditions') }}
                        </p>

                        <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s" href="#">
                            {{ __('messages.shop_now') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
            <div class="carousel-header-banner h-100">
                <img src="https://th.bing.com/th/id/OIP.1momwYbSfJFXOlqqkm7gMQHaF2?w=216&h=180&c=7&r=0&o=7&cb=ucfimg2&pid=1.7&rm=3&ucfimg=1 " class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">

                <div class="carousel-banner-offer">
                    <p class="bg-primary text-white rounded fs-5 py-2 px-4 mb-0 me-3">
                        {{ __('messages.save_48') }}
                    </p>

                    <p class="text-primary fs-5 fw-bold mb-0">
                        {{ __('messages.special_offer') }}
                    </p>
                </div>

                <div class="carousel-banner">
                    <div class="carousel-banner-content text-center p-4">
                        <a href="#" class="d-block mb-2">{{ __('messages.smartphone') }}</a>
                        <a href="#" class="d-block text-white fs-3">{{ __('messages.apple_ipad') }}</a>

                        <del class="me-2 text-white fs-5">$1,250.00</del>
                        <span class="text-primary fs-5">$1,050.00</span>
                    </div>

                    <a href="#" class="btn btn-primary rounded-pill py-2 px-4">
                        <i class="fas fa-shopping-cart me-2"></i> {{ __('messages.add_to_cart') }}
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- Services Start -->
<div class="container-fluid px-0">
    <div class="row g-0">

        <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
            <div class="p-4">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-sync-alt fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.free_return') }}</h6>
                        <p class="mb-0">{{ __('messages.money_back_30') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.free_shipping') }}</h6>
                        <p class="mb-0">{{ __('messages.free_shipping_all_orders') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-life-ring fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.support_24_7') }}</h6>
                        <p class="mb-0">{{ __('messages.support_online_24') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.receive_gift_card') }}</h6>
                        <p class="mb-0">{{ __('messages.receive_gift_over_50') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-lock fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.secure_payment') }}</h6>
                        <p class="mb-0">{{ __('messages.value_security') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
            <div class="p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-blog fa-2x text-primary"></i>
                    <div class="ms-4">
                        <h6 class="text-uppercase mb-2">{{ __('messages.online_service') }}</h6>
                        <p class="mb-0">{{ __('messages.free_return_30_days') }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

    <!-- Services End -->

    <!-- Products Offer Start -->
   <div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                    <div>
                        <p class="text-muted mb-3">{{ __('messages.find_best_camera') }}</p>
                        <h3 class="text-primary">{{ __('messages.smart_camera') }}</h3>
                        <h1 class="display-3 text-secondary mb-0">40% <span class="text-primary fw-normal">{{ __('messages.off') }}</span></h1>
                    </div>
                    <img src="img/product-1.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                    <div>
                        <p class="text-muted mb-3">{{ __('messages.find_best_watch') }}</p>
                        <h3 class="text-primary">{{ __('messages.smart_watch') }}</h3>
                        <h1 class="display-3 text-secondary mb-0">20% <span class="text-primary fw-normal">{{ __('messages.off') }}</span></h1>
                    </div>
                    <img src="img/product-2.png" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                <a href="#">
                    <div class="bg-primary rounded position-relative">
                        <img src="img/product-banner.jpg" class="img-fluid w-100 rounded" alt="">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(255, 255, 255, 0.5);">
                            <h3 class="display-5 text-primary">{{ __('messages.eos_rebel') }}</h3>
                            <p class="fs-4 text-muted">{{ __('messages.product_price_899') }}</p>
                            <a href="#" class="btn btn-primary rounded-pill align-self-start py-2 px-4">{{ __('messages.shop_now') }}</a>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                <a href="#">
                    <div class="text-center bg-primary rounded position-relative">
                        <img src="img/product-banner-2.jpg" class="img-fluid w-100" alt="">
                        <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4" style="background: rgba(242, 139, 0, 0.5);">
                            <h2 class="display-2 text-secondary">{{ __('messages.sale') }}</h2>
                            <h4 class="display-5 text-white mb-4">{{ __('messages.get_up_to_50_off') }}</h4>
                            <a href="#" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">{{ __('messages.shop_now') }}</a>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<div class="electro-wrapper electro-overflow-hidden">
    <div class="electro-container electro-py-5">
        <div class="electro-products-title electro-mb-5">
            <h4 class="electro-primary electro-uppercase electro-animate-up" style="animation-delay: 0.1s;">{{ __('messages.products') }}</h4>
            <h1 class="electro-text-3xl electro-animate-up" style="animation-delay: 0.3s;">{{ __('messages.all_product_items') }}</h1>
        </div>

        @foreach($categories as $category)
            <div class="category-section">
                <h2 class="category-title">{{ $category->name }} ({{ $category->products->count() }} )</h2>

                @if($category->products->count() > 0)
                    <div class="products-row" data-category-id="{{ $category->id }}">
                        @foreach($category->products as $product)
                            <div class="electro-product-item" data-product-id="{{ $product->id }}">
                                <div class="electro-product-image">
                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) ? $product->image : asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                                    <div class="electro-overlay">
                                        <a href="{{ route('products.show', $product->id) }}" class="overlay-btn">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="#" class="overlay-btn favorite-btn" data-id="{{ $product->id }}">
                                            <i class="fas fa-heart {{ auth()->check() && auth()->user()->favorites()->where('product_id', $product->id)->exists() ? 'text-danger' : '' }}"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="electro-product-info">
                                    <p class="product-category">{{ optional($product->category)->name ?? $category->name }}</p>
                                    <h5 class="product-name">{{ Str::limit($product->name, 40) }}</h5>
                                    <div class="product-price">
                                        @if($product->discount_price)
                                            <del>{{ number_format($product->price, 2) }} EGP</del>
                                            <span>{{ number_format($product->discount_price, 2) }} EGP</span>
                                        @else
                                            <span>{{ number_format($product->price, 2) }} EGP</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="electro-product-footer">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn-view">{{ __('messages.show_product') }}</a>
                                </div>

                            </div>
                        @endforeach
                    </div>
                        {{-- الينك الصحيح  --}}

                 <a href="{{ route('shop' )}} " class="btn btn-secondary mt-3">
    {{ __('messages.load_more') }}
</a>


                   

                @else
                    <p class="text-center text-muted">{{ __('messages.no_products_in_category') }}</p>
                @endif
            </div>

        @endforeach

    </div>
</div>

<div class="container-fluid py-6 bg-light">
    <div class="container text-center">
        <div class="electro-products-title electro-mb-5">
            <h4 class="electro-primary electro-uppercase electro-animate-up" style="animation-delay: 0.1s;">
                {{ __('messages.testimonials') }}
            </h4>
            <h1 class="electro-text-3xl electro-animate-up" style="animation-delay: 0.3s;">
                {{ __('messages.what_customers_say') }}
            </h1>
        </div>

        <div class="row g-4">

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white rounded p-4 shadow h-100">
                    <div class="d-flex mb-3">
                        <i class="fas fa-quote-left fa-2x text-primary me-3"></i>
                        <div>
                            <div class="electro-product-rating mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <small class="text-muted">{{ __('messages.review_1_name') }}</small>
                        </div>
                    </div>
                    <p class="text-muted">{{ __('messages.review_1_text') }}</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded p-4 shadow h-100">
                    <div class="d-flex mb-3">
                        <i class="fas fa-quote-left fa-2x text-primary me-3"></i>
                        <div>
                            <div class="electro-product-rating mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                            </div>
                            <small class="text-muted">{{ __('messages.review_2_name') }}</small>
                        </div>
                    </div>
                    <p class="text-muted">{{ __('messages.review_2_text') }}</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="bg-white rounded p-4 shadow h-100">
                    <div class="d-flex mb-3">
                        <i class="fas fa-quote-left fa-2x text-primary me-3"></i>
                        <div>
                            <div class="electro-product-rating mb-1">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            </div>
                            <small class="text-muted">{{ __('messages.review_3_name') }}</small>
                        </div>
                    </div>
                    <p class="text-muted">{{ __('messages.review_3_text') }}</p>
                </div>
            </div>

        </div>
    </div>
</div>

    <!-- Testimonials End -->

    @include('components.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Favorites functionality
            document.querySelectorAll('.favorite-btn').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    const id = this.dataset.id;
                    const icon = this.querySelector('i');
                    const isFavorited = icon.classList.contains('text-danger');
                    const method = isFavorited ? 'DELETE' : 'POST';
                    const url = `/favorites/${id}`;

                    fetch(url, {
                        method: method,
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'added') {
                            icon.classList.add('text-danger');
                        } else if (data.status === 'removed') {
                            icon.classList.remove('text-danger');
                        }
                        const badge = document.querySelector('#favBadge');
                        if (badge) {
                            badge.textContent = data.count;
                            if (data.count == 0) badge.remove();
                        } else if (data.count > 0) {
                            const newBadge = document.createElement('span');
                            newBadge.id = 'favBadge';
                            newBadge.className = 'badge bg-danger position-absolute top-0 start-100 translate-middle';
                            newBadge.textContent = data.count;
                            document.querySelector('#favDropdown .rounded-circle').appendChild(newBadge);
                        }
                    })
                    .catch(err => console.error('Error:', err));
                });
            });

            // الأنيميشن التلقائي - منتج واحد فقط كل 5 ثواني
            const productsRows = document.querySelectorAll(".products-row");

            productsRows.forEach(row => {
                const products = Array.from(row.querySelectorAll(".electro-product-item"));
                if (products.length === 0) return;

                let currentIndex = 0;
                let intervalId = null;
                let isHovering = false;

                // دالة لتفعيل منتج معين
                function activateProduct(index) {
                    // إزالة الكلاس من جميع المنتجات
                    products.forEach(p => p.classList.remove('active-slide'));

                    // تفعيل المنتج الحالي
                    products[index].classList.add('active-slide');

                    // التمرير التلقائي للصف
                    const productLeft = products[index].offsetLeft;
                    const productWidth = products[index].offsetWidth;
                    const rowWidth = row.offsetWidth;
                    const scrollPosition = productLeft - (rowWidth / 2) + (productWidth / 2);

                    row.scrollTo({
                        left: scrollPosition,
                        behavior: 'smooth'
                    });
                }

                // بدء الدورة التلقائية
                function startAutoCycle() {
                    if (intervalId) clearInterval(intervalId);

                    intervalId = setInterval(() => {
                        if (!isHovering) {
                            currentIndex = (currentIndex + 1) % products.length;
                            activateProduct(currentIndex);
                        }
                    }, 3000); // كل 5 ثواني
                }

                // عند hover على أي منتج
                products.forEach((product, index) => {
                    product.addEventListener('mouseenter', () => {
                        isHovering = true;
                        currentIndex = index;
                        activateProduct(index);
                    });

                    product.addEventListener('mouseleave', () => {
                        isHovering = false;
                    });
                });

                // تفعيل المنتج الأول وبدء الدورة
                activateProduct(0);
                startAutoCycle();
            });
        });
    </script>

</body>

</html>

</x-navbar>
