<x-navbar title="details contact">

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
        /* ======================== */
        /* BADGE STYLING */
        /* ======================== */
        .product-card {
            position: relative;
        }

        .badge-condition {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 10;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 0.75rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        /* ======================== */
        /* PADDING OVERRIDES */
        /* ======================== */
        .py-3 {
            padding-top: 1rem !important;
            padding-bottom: 0px !important;
        }

        /* ======================== */
        /* PRODUCT CATEGORIES */
        /* ======================== */
        .product-categories {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .product-categories h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .categories-item {
            padding: 10px 0;
            transition: all 0.3s ease;
        }

        .categories-item a {
            text-decoration: none;
            color: #333;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .categories-item a:hover {
            color: #f28b00;
            margin-left: 5px;
        }

        .toggle-btn {
            color: #f28b00;
            transition: all 0.3s ease;
        }

        .toggle-btn:hover {
            background: rgba(242, 139, 0, 0.1) !important;
        }

        .subcategories {
            transition: all 0.3s ease;
        }

        /* ======================== */
        /* PRICE FILTER */
        /* ======================== */
        .price {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .price h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .form-range {
            height: 6px;
            border-radius: 3px;
        }

        .form-range::-webkit-slider-thumb {
            width: 20px;
            height: 20px;
            background: #f28b00;
            border: 2px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        .form-range::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #f28b00;
            border: 2px solid white;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        }

        output {
            font-weight: 700;
            color: #f28b00;
            margin-left: 10px;
        }

        /* ======================== */
        /* PRODUCT COLOR */
        /* ======================== */
        .product-color {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .product-color h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .product-color-item {
            padding: 8px 0;
            transition: all 0.3s ease;
        }

        .product-color-item:hover {
            margin-left: 5px;
        }

        .product-color-item a {
            text-decoration: none;
            color: #333;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .product-color-item a:hover {
            color: #f28b00;
        }

        /* ======================== */
        /* ADDITIONAL PRODUCTS */
        /* ======================== */
        .additional-product {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .additional-product h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .additional-product-item {
            padding: 10px 0;
            transition: all 0.3s ease;
        }

        .additional-product-item label {
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .additional-product-item:hover label {
            color: #f28b00;
            margin-left: 5px;
        }

        /* ======================== */
        /* FEATURED PRODUCT */
        /* ======================== */
        .featured-product {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .featured-product h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .featured-product-item {
            display: flex;
            margin-bottom: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .featured-product-item:last-child {
            border-bottom: none;
        }

        .featured-product-item:hover {
            transform: translateX(-5px);
        }

        .featured-product-item h6 {
            font-weight: 700;
            color: #333;
            font-size: 0.95rem;
        }

        /* ======================== */
        /* PRODUCT TAGS */
        /* ======================== */
        .product-tags {
            background: transparent;
        }

        .product-tags h4 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f28b00;
        }

        .product-tags-items a {
            display: inline-block;
            background: white;
            color: #333;
            text-decoration: none;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 20px;
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
            font-size: 0.85rem;
        }

        .product-tags-items a:hover {
            background: #f28b00;
            color: white;
            border-color: #f28b00;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(242, 139, 0, 0.3);
        }

        /* ======================== */
        /* PRODUCT ITEM */
        /* ======================== */
        .product-item {
            transition: all 0.3s ease;
        }

        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .product-item-inner {
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .product-item-inner-item {
            position: relative;
            overflow: hidden;
        }

        .product-item-inner-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .product-item:hover .product-item-inner-item img {
            transform: scale(1.05);
        }

        .product-details {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .product-item:hover .product-details {
            opacity: 1;
        }

        .product-details a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: #f28b00;
            color: white;
            border-radius: 50%;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .product-details a:hover {
            background: #764ba2;
            transform: scale(1.1);
        }

        /* ======================== */
        /* SORT & SEARCH */
        /* ======================== */
        .input-group {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .input-group input {
            border: 1px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #f28b00;
            box-shadow: 0 0 0 3px rgba(242, 139, 0, 0.1);
        }

        .bg-light.ps-3 {
            background: #f9f9f9 !important;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        #categorySelect {
            background: transparent;
            border: none;
            color: #333;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #categorySelect:focus {
            outline: none;
            color: #f28b00;
        }

        /* ======================== */
        /* PRODUCTS MINI */
        /* ======================== */
        .products-mini-item {
            transition: all 0.3s ease;
            background: white;
        }

        .products-mini-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .products-mini-item img {
            height: 150px;
            object-fit: cover;
            transition: all 0.3s ease;
        }

        .products-mini-item:hover img {
            transform: scale(1.05);
        }

        .products-mini-content h6 {
            font-weight: 700;
            color: #333;
            margin-bottom: 8px;
        }

        /* ======================== */
        /* BUTTONS */
        /* ======================== */
        .btn-primary {
            background: #f28b00 !important;
            border-color: #f28b00 !important;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: #ff7f00 !important;
            border-color: #ff7f00 !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(242, 139, 0, 0.3);
        }

        /* ======================== */
        /* PAGINATION */
        /* ======================== */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-top: 30px;
        }

        .pagination .page-item {
            list-style: none;
        }

        .pagination .page-link {
            color: #333;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .pagination .page-link:hover {
            background-color: #f28b00;
            color: #fff;
            border-color: #f28b00;
            transform: translateY(-2px);
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #999;
            background-color: #f9f9f9;
            border-color: #e0e0e0;
            cursor: not-allowed;
        }

        .pagination .page-item.disabled .page-link:hover {
            transform: none;
            background-color: #f9f9f9;
        }

        /* ======================== */
        /* RESPONSIVE */
        /* ======================== */
        @media (max-width: 768px) {
            .product-categories,
            .price,
            .product-color,
            .additional-product,
            .featured-product {
                margin-bottom: 20px;
            }

            .product-item-inner-item img {
                height: 150px;
            }

            .products-mini-item img {
                height: 120px;
            }
        }

        @media (max-width: 480px) {
            .product-categories h4,
            .price h4,
            .product-color h4,
            .additional-product h4,
            .product-tags h4 {
                font-size: 1rem;
            }

            .products-mini-item {
                margin-bottom: 15px;
            }
        }

        .g-4, .gy-4 {
            display: flex !important;
            justify-content: space-between;
        }

        @media (min-width: 1400px) {
            .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
                max-width: 100% !important;
            }
        }

        @media (min-width: 992px) {
            .col-lg-3 {
                width: 17% !important;
            }

            .col-lg-4 {
                flex: 0 0 auto;
                width: 20% !important;
            }
        }

        .btn.btn-primary {
            position: relative;
            top: -25px;
        }
    </style>
    <style>
        .align-items-center {
    align-items: center !important;
    justify-content: space-between;
}
    </style>
          <style>
                .pagination {
    display: flex !important;
    justify-content: center;
    margin-top: 40px;
    flex-wrap: wrap;
    gap: 8px;
}

.pagination a {
    display: inline-block;
    padding: 8px 12px;
    text-decoration: none;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: background 0.3s, color 0.3s;
}

.pagination a:hover {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}

.pagination a.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
    pointer-events: none;
}

              </style>

</head>

<body>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Shop Page</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Services Start -->
    <div class="container-fluid px-0">
        <div class="row g-0">
            <div class="col-6 col-md-4 col-lg-2 border-start border-end wow fadeInUp" data-wow-delay="0.1s">
                <div class="p-4">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa fa-sync-alt fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Return</h6>
                            <p class="mb-0">30 days money back guarantee!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.2s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fab fa-telegram-plane fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Free Shipping</h6>
                            <p class="mb-0">Free shipping on all order</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.3s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-life-ring fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Support 24/7</h6>
                            <p class="mb-0">We support online 24 hrs a day</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.4s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-credit-card fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Receive Gift Card</h6>
                            <p class="mb-0">Recieve gift all over oder $50</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.5s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-lock fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Secure Payment</h6>
                            <p class="mb-0">We Value Your Security</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-4 col-lg-2 border-end wow fadeInUp" data-wow-delay="0.6s">
                <div class="p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-blog fa-2x text-primary"></i>
                        <div class="ms-4">
                            <h6 class="text-uppercase mb-2">Online Service</h6>
                            <p class="mb-0">Free return products in 30 days</p>
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
                            <p class="text-muted mb-3">Find The Best Camera for You!</p>
                            <h3 class="text-primary">Smart Camera</h3>
                            <h1 class="display-3 text-secondary mb-0">40% <span class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-1.png" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Whatches for You!</p>
                            <h3 class="text-primary">Smart Whatch</h3>
                            <h1 class="display-3 text-secondary mb-0">20% <span class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="img/product-2.png" class="img-fluid" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Products Offer End -->

    <!-- Shop Page Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            @foreach ($categories as $category)
                                <li>
                                    <div class="categories-item d-flex justify-content-between align-items-center">
                                        <a href="#" class="text-dark">
                                            <i class="fas fa-folder text-secondary me-2"></i>
                                            {{ $category->name }}
                                        </a>
                                        @if($category->children->count() > 0)
                                            <button class="toggle-btn btn btn-sm btn-link p-0">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        @endif
                                    </div>

                                    <ul class="list-unstyled ms-3 subcategories" style="display: none;">
                                        @foreach($category->children as $child)
                                            <li>
                                                <div class="categories-item d-flex justify-content-between">
                                                    <a href="#" class="text-dark">
                                                        <i class="fas fa-circle text-secondary me-2" style="font-size: 8px;"></i>
                                                        {{ $child->name }}
                                                    </a>
                                                    <span>({{ $child->products_count }})</span>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="price mb-4">
                        <h4 class="mb-2">Price</h4>
                        <form id="priceFilterForm" method="GET">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <input type="range" class="form-range w-100" id="rangeInput" name="max_price"
                                min="0" max="500" value="{{ $maxPrice ?? 500 }}" oninput="amount.value=rangeInput.value; this.form.submit()">
                            <output id="amount">{{ $maxPrice ?? 500 }}</output>
                        </form>
                    </div>

                <div class="product-color mb-3">
    <h4>{{ __('messages.select_by_color') }}</h4>
    <ul class="list-unstyled">
        <li>
            <div class="product-color-item">
                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>{{ __('messages.gold') }}</a>
                <span>(1)</span>
            </div>
        </li>
        <li>
            <div class="product-color-item">
                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>{{ __('messages.green') }}</a>
                <span>(1)</span>
            </div>
        </li>
        <li>
            <div class="product-color-item">
                <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>{{ __('messages.white') }}</a>
                <span>(1)</span>
            </div>
        </li>
    </ul>
</div>

<div class="additional-product mb-4">
    <h4>{{ __('messages.additional_products') }}</h4>
    <div class="additional-product-item">
        <input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages">
        <label for="Categories-1" class="text-dark">{{ __('messages.accessories') }}</label>
    </div>
    <div class="additional-product-item">
        <input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages">
        <label for="Categories-2" class="text-dark">{{ __('messages.electronics_computer') }}</label>
    </div>
    <div class="additional-product-item">
        <input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages">
        <label for="Categories-3" class="text-dark">{{ __('messages.laptops_desktops') }}</label>
    </div>
    <div class="additional-product-item">
        <input type="radio" class="me-2" id="Categories-4" name="Categories-1" value="Beverages">
        <label for="Categories-4" class="text-dark">{{ __('messages.mobiles_tablets') }}</label>
    </div>
    <div class="additional-product-item">
        <input type="radio" class="me-2" id="Categories-5" name="Categories-1" value="Beverages">
        <label for="Categories-5" class="text-dark">{{ __('messages.smartphone_smart_tv') }}</label>
    </div>
</div>

<a href="#">
    <div class="position-relative">
        <img src="img/product-banner-2.jpg" class="img-fluid w-100 rounded" alt="Image">
        <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
            style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
            <h5 class="display-6 text-primary">{{ __('messages.sale') }}</h5>
            <h4 class="text-secondary">{{ __('messages.get_up_to_50_off') }}</h4>
            <a href="#" class="btn btn-primary rounded-pill px-4">{{ __('messages.shop_now') }}</a>
        </div>
    </div>
</a>
    </div>

                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded mb-4 position-relative">
                        {{-- <img src="img/product-banner-3.jpg" class="img-fluid rounded w-100" style="height: 250px;" alt="Image"> --}}
                        {{-- <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                            <h4 class="display-5 text-primary">SALE</h4>
                            <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                            <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                        </div> --}}
                    </div>
                    <div class="row g-4">
                        <div class="col-xl-7">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-3 text-end">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                                <label for="categorySelect">Sort:</label>
                                <form id="categoryForm" method="GET" action="{{ route('shop') }}">
                                    <select id="categorySelect" name="category" class="border-0 form-select-sm bg-light me-3"
                                            onchange="document.getElementById('categoryForm').submit()">
                                        <option value="">Default Sorting</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ (isset($categoryId) && $categoryId == $cat->id) ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                        </div>

                        <div class="col-lg-4 col-xl-2">
                            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                                <li class="nav-item me-4">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                        <i class="fas fa-th fa-3x text-primary"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                                        <i class="fas fa-bars fa-3x text-primary"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4 product">
                                @foreach ($products as $product)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="product-item rounded wow fadeInUp" data-wow-delay="0.3s">
                                            <div class="product-item-inner border rounded">
                                                <div class="product-item-inner-item position-relative">
                                                    <span class="badge-condition
                                                        @if($product->condition == 'new') bg-warning
                                                        @elseif($product->condition == 'used') bg-secondary
                                                        @endif">
                                                        {{ ucfirst($product->condition) }}
                                                    </span>
                                                    <img
                                                        src="{{
                                                            Str::startsWith($product->image, ['http://', 'https://'])
                                                                ? $product->image
                                                                : asset('storage/' . $product->image)
                                                        }}"
                                                        class="card-img-top img-fluid"
                                                        alt="{{ $product->name }}">
                                                    <div class="product-details">
                                                        <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                                                    </div>
                                                </div>
                                                <div class="text-center rounded-bottom p-4">
                                                    <h5 class="fw-bold">{{ $product->name }}</h5>
                                                    <p class="text-muted">{{ $product->category->name ?? 'Not specified' }}</p>
                                                    <p>
                                                        <del>${{ $product->price }}</del>
                                                        <span class="text-danger fw-bold">${{ $product->discount_price }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4">
                                                    <i class="fas fa-shopping-cart me-2"></i>{{ __('messages.Show_Product') }}
                                                </a>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="d-flex">
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star text-primary"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="d-flex">
                                                        <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                                            <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                                        </a>
                                                        <a href="#" class="overlay-btn favorite-btn" data-id="{{ $product->id }}">
                                                            <i class="fas fa-heart {{ auth()->check() && auth()->user()->favorites()->where('product_id', $product->id)->exists() ? 'text-danger' : '' }}"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

<!-- Pagination -->
<div class="pagination">
    @if ($products->onFirstPage() === false)
        <a href="{{ $products->previousPageUrl() }}">&laquo; Previous</a>
    @endif

    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="{{ $products->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}">Next &raquo;</a>
    @endif
</div>

                     </div>
                        </div>
                        <div id="tab-6" class="products tab-pane fade show p-0">
                            <div class="row g-4 products-mini">

                                @foreach ($products as $product)
                                    <div class="col-lg-6 mb-4">
                                        <div class="products-mini-item border rounded wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="row g-0">
                                                <div class="col-5">
                                                    <img src="{{
                                                        Str::startsWith($product->image, ['http://', 'https://'])
                                                            ? $product->image
                                                            : asset('storage/' . $product->image)
                                                    }}" class="img-fluid w-100 h-100 rounded-start" alt="{{ $product->name }}">
                                                </div>
                                                <div class="col-7">
                                                    <div class="products-mini-content p-3">
                                                        <a href="{{ route('products.show', $product->id) }}" class="d-block mb-2 fw-bold">{{ $product->name }}</a>
                                                        <p class="mb-2 text-muted">SKU: {{ $product->sku ?? 'G2356' }}</p>
                                                        <p class="mb-0">
                                                            <del class="me-2 fs-5">${{ $product->price }}</del>
                                                            <span class="text-primary fs-5">${{ $product->discount_price ?? $product->price }}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-mini-add border-top p-3 d-flex justify-content-between align-items-center">
                                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary border-secondary rounded-pill py-2 px-4">
                                                    <i class="fas fa-shopping-cart me-2"></i> show product
                                                </a>
                                                <div class="d-flex">
                                                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                                    </a>
                                                    <a href="#" class="text-primary d-flex align-items-center justify-content-center">
                                                        <span class="rounded-circle btn-sm-square border">
                                                            <i class="fas fa-heart {{ auth()->check() && auth()->user()->favorites()->where('product_id', $product->id)->exists() ? 'text-danger' : '' }}"></i>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
<div class="pagination">
    @if ($products->onFirstPage() === false)
        <a href="{{ $products->previousPageUrl() }}">&laquo; Previous</a>
    @endif

    @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
        <a href="{{ $url }}" class="{{ $products->currentPage() == $page ? 'active' : '' }}">{{ $page }}</a>
    @endforeach

    @if ($products->hasMorePages())
        <a href="{{ $products->nextPageUrl() }}">Next &raquo;</a>
    @endif
</div>
                            </div>

                            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="pagination d-flex justify-content-center mt-5">
                                    {{-- {{ $products->links() }} --}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End -->

    <!-- Product Banner Start -->
    <div class="container-fluid py-5">
        <div class="container pb-5">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <a href="#">
                        <div class="bg-primary rounded position-relative">
                            <img src="img/product-banner.jpg" class="img-fluid w-100 rounded" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(255, 255, 255, 0.5);">
                                <h3 class="display-5 text-primary">EOS Rebel <br> <span>T7i Kit</span></h3>
                                <p class="fs-4 text-muted">$899.99</p>
                                <a href="#" class="btn btn-primary rounded-pill align-self-start py-2 px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.2s">
                    <a href="#">
                        <div class="text-center bg-primary rounded position-relative">
                            <img src="img/product-banner-2.jpg" class="img-fluid w-100" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(242, 139, 0, 0.5);">
                                <h2 class="display-2 text-secondary">SALE</h2>
                                <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-secondary rounded-pill align-self-center py-2 px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Banner End -->

    @include('components.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="js/main.js"></script>

    <script>
        // Favorite Button Handler
        document.addEventListener('DOMContentLoaded', function() {
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
        });
    </script>

    <script>
        // Category Toggle Button
        document.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const sublist = this.closest('li').querySelector('.subcategories');
                if(sublist.style.display === 'none'){
                    sublist.style.display = 'block';
                    this.querySelector('i').classList.add('fa-rotate-180');
                } else {
                    sublist.style.display = 'none';
                    this.querySelector('i').classList.remove('fa-rotate-180');
                }
            });
        });
    </script>

</body>

</html>

</x-navbar>
