@php
use Illuminate\Support\Str;
@endphp

<x-navbar title="{{ $category->name ?? 'Shop' }}">

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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

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
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
            font-size: 0.7rem;
        }

        .product-image-container { 
            transition: transform 0.3s ease; 
        }
        .product-image-container:hover { 
            transform: scale(1.05); 
        }
        
        /* تحسينات للتصميم العام */
        .product-item {
            transition: all 0.3s ease;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .quantity-btn { 
            transition: background-color 0.2s; 
        }
        .quantity-btn:hover { 
            background-color: #e9ecef !important; 
        }
        
        .sidebar-sticky { 
            position: sticky; 
            top: 20px; 
        }
    </style>
</head>

<body>
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">{{ $category->name ?? 'Shop Page' }}</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">{{ $category->name ?? 'Shop' }}</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Searvices Start -->
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
    <!-- Searvices End -->

    <!-- Products Offer Start -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Camera for You!</p>
                            <h3 class="text-primary">Smart Camera</h3>
                            <h1 class="display-3 text-secondary mb-0">40% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                       <img src="{{ asset('img/product-1.png') }}" class="img-fluid" alt="">
                    </a>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.3s">
                    <a href="#" class="d-flex align-items-center justify-content-between border bg-white rounded p-4">
                        <div>
                            <p class="text-muted mb-3">Find The Best Whatches for You!</p>
                            <h3 class="text-primary">Smart Whatch</h3>
                            <h1 class="display-3 text-secondary mb-0">20% <span
                                    class="text-primary fw-normal">Off</span></h1>
                        </div>
                        <img src="{{ asset('img/product-2.png') }}" class="img-fluid" alt="">
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
                <!-- Sidebar -->
                <div class="col-lg-3 wow fadeInUp sidebar-sticky" data-wow-delay="0.1s">
                    <!-- Search -->
                    <div class="input-group w-100 mx-auto d-flex mb-4">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>

                    <!-- Product Categories -->
                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            @foreach($categories ?? [] as $cat)
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        {{ $cat->name }}</a>
                                    <span>({{ $cat->products_count ?? 0 }})</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Price Filter -->
                    <div class="price mb-4">
                        <h4 class="mb-2">Price</h4>
                        <input type="range" class="form-range w-100" id="rangeInput" name="rangeInput" min="0" max="500"
                            value="0" oninput="amount.value=rangeInput.value">
                        <output id="amount" name="amount" min-velue="0" max-value="500" for="rangeInput">0</output>
                    </div>

                    <!-- Select By Color -->
                    <div class="product-color mb-3">
                        <h4>Select By Color</h4>
                        <ul class="list-unstyled">
                            @foreach($colors ?? ['Gold', 'Green', 'White'] as $color)
                            <li>
                                <div class="product-color-item">
                                    <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
                                        {{ $color }}</a>
                                    <span>({{ rand(1, 5) }})</span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Additional Products -->
                    <div class="additional-product mb-4">
                        <h4>Additional Products</h4>
                        @foreach($categories ?? [] as $cat)
                        <div class="additional-product-item">
                            <input type="radio" class="me-2" id="cat-{{ $cat->id }}" name="categories" value="{{ $cat->id }}">
                            <label for="cat-{{ $cat->id }}" class="text-dark"> {{ $cat->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <!-- Featured Products -->
                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Featured products</h4>
                        @forelse($featuredProducts ?? [] as $featured)
                            <div class="featured-product-item d-flex mb-3">
                                <div class="rounded me-3" style="width: 80px; height: 80px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $featured->image) }}" class="img-fluid rounded" alt="{{ $featured->name }}" style="object-fit: cover;">
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-2">{{ $featured->name }}</h6>
                                    <div class="d-flex mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star {{ $i <= ($featured->rating ?? 4) ? 'text-warning' : 'text-muted' }}"></i>
                                        @endfor
                                    </div>
                                    <div class="d-flex">
                                        <h5 class="fw-bold me-2">${{ $featured->discount_price ?? $featured->price }}</h5>
                                        @if($featured->discount_price && $featured->discount_price < $featured->price)
                                            <h5 class="text-danger text-decoration-line-through">${{ $featured->price }}</h5>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No featured products available.</p>
                        @endforelse
                        <div class="d-flex justify-content-center my-4">
                            <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">View More</a>
                        </div>
                    </div>

                    <!-- Ad Banner -->
                    <a href="#">
                        <div class="position-relative mb-4">
                            <img src="{{ asset('img/product-banner-2.jpg') }}" class="img-fluid w-100 rounded" alt="Image">
                            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4"
                                style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                                <h5 class="display-6 text-primary">SALE</h5>
                                <h4 class="text-secondary">Get UP To 50% Off</h4>
                                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>

                    <!-- Product Tags -->
                    <div class="product-tags py-4">
                        <h4 class="mb-3">PRODUCT TAGS</h4>
                        <div class="product-tags-items bg-light rounded p-3">
                            @foreach($tags ?? ['New', 'Brand', 'Black', 'White', 'Tablets', 'Phone', 'Camera', 'Drone', 'Television', 'Sales'] as $tag)
                                <a href="#" class="border rounded py-1 px-2 mb-2 d-inline-block me-1">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                    <!-- Banner -->
                    <div class="rounded mb-4 position-relative">
                        <img src="{{ asset('img/product-banner-3.jpg') }}" class="img-fluid rounded w-100" style="height: 250px;"
                            alt="Image">
                        <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                            <h4 class="display-5 text-primary">SALE</h4>
                            <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                            <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                        </div>
                    </div>

                    <!-- Search and Sort -->
                    <div class="row g-4">
                        <div class="col-xl-7">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-3 text-end">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                                <label for="electronics">Sort By:</label>
                                <select id="electronics" name="electronicslist"
                                    class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                    <option value="volvo">Default Sorting</option>
                                    <option value="volv">Nothing</option>
                                    <option value="sab">Popularity</option>
                                    <option value="saab">Newness</option>
                                    <option value="opel">Average Rating</option>
                                    <option value="audio">Low to high</option>
                                    <option value="audi">High to low</option>
                                </select>
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

                    <!-- Products Grid View -->
                    <div class="tab-content">
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4 product">
                                @forelse ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.3s">
                                        <div class="product-item-inner border rounded product-image-container">
                                            <div class="product-item-inner-item position-relative">
                                                <!-- Condition Badge -->
                                                @php
                                                    $conditionClass = match(strtolower($product->condition ?? '')) {
                                                        'new' => 'bg-success',
                                                        'used' => 'bg-secondary',
                                                        default => 'bg-warning'
                                                    };
                                                @endphp
                                                <span class="badge {{ $conditionClass }} position-absolute top-0 start-0 m-2 px-2 py-1 rounded-pill shadow">
                                                    {{ ucfirst($product->condition ?? 'Unknown') }}
                                                </span>
                                                
                                            <img 
    src="{{ 
        Str::startsWith($product->image, ['http://', 'https://']) 
            ? $product->image 
            : asset('storage/' . $product->image) 
    }}" 
    class="card-img-top img-fluid" 
    alt="{{ $product->name }}"
    style="width: 100%; height: 250px; object-fit: cover; border-radius: 10px;">

                                                {{-- <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: auto; object-fit: cover;"> --}}
                                                <div class="product-details position-absolute top-0 end-0 m-2">
                                                    <a href="{{ route('products.show', $product->id) }}" class="text-white bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                        <i class="fa fa-eye fa-sm"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="text-center rounded-bottom p-4">
                                                <h5 class="fw-bold">{{ $product->name }}</h5>
                                                <p class="text-muted">{{ $product->category->name ?? 'غير محدد' }}</p>

                                                <div class="mb-2">
                                                    @if($product->discount_price && $product->discount_price < $product->price)
                                                        <del class="text-muted me-2">${{ number_format($product->price, 2) }}</del>
                                                        <span class="text-danger fw-bold">${{ number_format($product->discount_price, 2) }}</span>
                                                    @else
                                                        <span class="text-primary fw-bold">${{ number_format($product->price, 2) }}</span>
                                                    @endif
                                                </div>

                                                <!-- Rating -->
                                                @php $avgRating = $product->rating ?? 4; @endphp
                                                <div class="d-flex justify-content-center mb-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fa fa-star {{ $i <= $avgRating ? 'text-warning' : 'text-muted' }}"></i>
                                                    @endfor
                                                    <span class="ms-2 text-muted small">({{ $product->reviews_count ?? 0 }})</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                            <!-- Add to Cart Form -->
                                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->discount_price ?? $product->price }}">
                                                <input type="hidden" name="image" value="{{ asset('storage/' . $product->image) }}">
                                                <input type="hidden" name="qty" value="1">
                                                
                                                {{-- <button type="submit" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4">
                                                    <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                                                </button> --}}
                                                <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                    class="fas fa-shopping-cart me-2"></i> show product</a>
                                            </form>
                                            
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star {{ $i <= $avgRating ? 'text-warning' : 'text-muted' }}"></i>
                                                    @endfor
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                                    </a>
                                                    <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                                        <span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center py-5">
                                    <h4 class="text-muted">No products found in this category.</h4>
                                    <p class="text-muted">Please check back later or browse other categories.</p>
                                </div>
                                @endforelse

                                <!-- Pagination -->
                               
                            </div>
                        </div>

                        <!-- Products List View -->
                        <div id="tab-6" class="products tab-pane fade show p-0">
                            <div class="row g-4 products-mini">
                                @forelse ($products as $product)
                                <div class="col-lg-6">
                                    <div class="products-mini-item border">
                                        <div class="row g-0">
                                            <div class="col-5">
                                                <div class="products-mini-img border-end h-100 position-relative">
                                                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 h-100" alt="{{ $product->name }}" style="object-fit: cover;">
                                                    <div class="products-mini-icon rounded-circle bg-primary position-absolute top-0 end-0 m-2">
                                                        <a href="{{ route('products.show', $product->id) }}" class="text-white d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                                            <i class="fa fa-eye fa-sm"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="products-mini-content p-3">
                                                    <a href="#" class="d-block mb-2 text-muted">{{ $product->category->name ?? 'Electronics' }}</a>
                                                    <a href="{{ route('products.show', $product->id) }}" class="d-block h4">{{ $product->name }}</a>
                                                    @if($product->discount_price && $product->discount_price < $product->price)
                                                        <del class="me-2 fs-5">${{ number_format($product->price, 2) }}</del>
                                                        <span class="text-primary fs-5">${{ number_format($product->discount_price, 2) }}</span>
                                                    @else
                                                        <span class="text-primary fs-5">${{ number_format($product->price, 2) }}</span>
                                                    @endif
                                                    
                                                    <!-- Rating -->
                                                    @php $avgRating = $product->rating ?? 4; @endphp
                                                    <div class="d-flex mt-2">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="fa fa-star {{ $i <= $avgRating ? 'text-warning' : 'text-muted' }} fa-xs"></i>
                                                        @endfor
                                                        <span class="ms-2 text-muted small">({{ $product->reviews_count ?? 0 }})</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="products-mini-add border p-3">
                                            <!-- Add to Cart Form -->
                                            <form action="{{ route('cart.add') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                                                <input type="hidden" name="price" value="{{ $product->discount_price ?? $product->price }}">
                                                <input type="hidden" name="image" value="{{ asset('storage/' . $product->image) }}">
                                                <input type="hidden" name="qty" value="1">
                                                
                                                <button type="submit" class="btn btn-primary border-secondary rounded-pill py-2 px-4">
                                                    <i class="fas fa-shopping-cart me-2"></i> Add To Cart
                                                </button>
                                            </form>
                                            
                                            <div class="d-flex float-end">
                                                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-3">
                                                    <span class="rounded-circle btn-sm-square border"><i class="fas fa-random"></i></span>
                                                </a>
                                                <a href="#" class="text-primary d-flex align-items-center justify-content-center me-0">
                                                    <span class="rounded-circle btn-sm-square border"><i class="fas fa-heart"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center py-5">
                                    <h4 class="text-muted">No products found in this category.</h4>
                                    <p class="text-muted">Please check back later or browse other categories.</p>
                                </div>
                                @endforelse

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
                            <img src="{{ asset('img/product-banner.jpg') }}" class="img-fluid w-100 rounded" alt="">
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
                            <img src="{{ asset('img/product-banner-2.jpg') }}" class="img-fluid w-100" alt="">
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center rounded p-4"
                                style="background: rgba(242, 139, 0, 0.5);">
                                <h2 class="display-2 text-secondary">SALE</h2>
                                <h4 class="display-5 text-white mb-4">Get UP To 50% Off</h4>
<a href="{{ route('categories.products', $category->id) }}" class="btn btn-primary mt-2">
    عرض المنتجات
</a>




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
    
    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    <script>
        // Initialize WOW.js
        if (typeof WOW !== 'undefined') {
            new WOW().init();
        }

        // Cart functionality
        function getCart() {
            return JSON.parse(localStorage.getItem('shoppingCart')) || [];
        }

        function saveCart(cart) {
            localStorage.setItem('shoppingCart', JSON.stringify(cart));
        }

        // Add to cart functionality
        document.querySelectorAll('form[action="{{ route("cart.add") }}"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const productName = formData.get('product_name');
                const price = parseFloat(formData.get('price'));
                const qty = parseInt(formData.get('qty'));
                const image = formData.get('image');
                const totalItemPrice = (price * qty).toFixed(2);

                if (confirm(`Add ${qty} ${productName} to cart?`)) {
                    let cart = getCart();
                    const existingItemIndex = cart.findIndex(item => item.name === productName);

                    if (existingItemIndex !== -1) {
                        cart[existingItemIndex].qty += qty;
                        cart[existingItemIndex].total = (parseFloat(cart[existingItemIndex].total) + parseFloat(totalItemPrice)).toFixed(2);
                    } else if (price > 0) {
                        cart.push({
                            name: productName,
                            price: price.toFixed(2),
                            qty: qty,
                            total: totalItemPrice,
                            image: image
                        });
                    }

                    saveCart(cart);
                    alert(`Added ${qty} ${productName} to cart!`);
                    
                    // Update cart badge
                    const cartBadge = document.getElementById("cartBadge");
                    if (cartBadge) {
                        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
                        cartBadge.textContent = totalItems > 0 ? totalItems : '';
                    }
                }
            });
        });
    </script>
</body>
</html>
</x-navbar>