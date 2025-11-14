<x-navbar title="Single Product">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Electro - Electronics Website Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries CSS -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <meta name="csrf-token" content="{{ csrf_token() }}">
<script>
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>

    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        /* General Custom Styles */
        .product-image-container { transition: transform 0.3s ease; }
        .product-image-container:hover { transform: scale(1.05); }
        .quantity-btn { transition: background-color 0.2s; }
        .quantity-btn:hover { background-color: #e9ecef !important; }
        .related-item { transition: box-shadow 0.3s; }
        .related-item:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .tab-pane { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        .sidebar-sticky { position: sticky; top: 20px; }

        /* Owl Carousel Custom */
        .custom-related-slider .custom-owl-nav button {
            background: rgba(255,255,255,0.9) !important;
            border: 1px solid #ddd !important;
            border-radius: 50% !important;
            width: 40px !important;
            height: 40px !important;
            color: #333 !important;
            font-size: 16px !important;
            opacity: 0.8;
            transition: all 0.3s ease;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .custom-related-slider .custom-owl-nav button:hover {
            background: #007bff !important;
            color: white !important;
            opacity: 1;
        }
        .custom-related-slider .custom-owl-nav .custom-owl-prev { left: -50px !important; }
        .custom-related-slider .custom-owl-nav .custom-owl-next { right: -50px !important; }
        .custom-related-slider .custom-owl-dots .custom-owl-dot span {
            width: 10px !important;
            height: 10px !important;
            background: #ddd !important;
            border-radius: 50% !important;
            transition: all 0.3s ease;
        }
        .custom-related-slider .custom-owl-dots .custom-owl-dot.active span {
            background: #007bff !important;
            transform: scale(1.2);
        }
        .custom-related-item-inner {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 480px;
        }
        .custom-related-item-inner:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .custom-related-item-inner img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .custom-related-item-inner .custom-text-center {
            flex-shrink: 0;
            padding: 15px;
            background: white;
        }

        /* Fallback No JS */
        .no-js .custom-related-slider {
            display: flex !important;
            flex-wrap: wrap;
            gap: 20px;
        }
        .no-js .custom-related-item { flex: 1 1 300px; }

        @media (max-width: 992px) {
            .custom-related-slider .custom-owl-nav button { display: none !important; }
        }
        @media (max-width: 576px) {
            .custom-related-item-inner { min-height: 400px; }
        }
    </style>
</head>


<body class="no-js">
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Single Product</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Pages</a></li>
            <li class="breadcrumb-item active text-white">Single Product</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <!-- Single Products Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <!-- Sidebar -->
                <div class="col-lg-5 col-xl-3 wow fadeInUp sidebar-sticky" data-wow-delay="0.1s">
                    <!-- Search -->
                    <div class="input-group w-100 mx-auto d-flex mb-4">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>

                    <!-- Product Categories -->
                    <div class="product-categories mb-4">
                        <h4>Products Categories</h4>
                        <ul class="list-unstyled">
                            <li><div class="categories-item"><a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Accessories</a><span>(3)</span></div></li>
                            <li><div class="categories-item"><a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Electronics & Computer</a><span>(5)</span></div></li>
                            <li><div class="categories-item"><a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Laptops & Desktops</a><span>(2)</span></div></li>
                            <li><div class="categories-item"><a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>Mobiles & Tablets</a><span>(8)</span></div></li>
                            <li><div class="categories-item"><a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>SmartPhone & Smart TV</a><span>(5)</span></div></li>
                        </ul>
                    </div>

                    <!-- Select By Color -->
                    <div class="additional-product mb-4">
                        <h4>Select By Color</h4>
                        <div class="additional-product-item"><input type="radio" class="me-2" id="Categories-1" name="Categories-1" value="Beverages"><label for="Categories-1" class="text-dark">Gold</label></div>
                        <div class="additional-product-item"><input type="radio" class="me-2" id="Categories-2" name="Categories-1" value="Beverages"><label for="Categories-2" class="text-dark">Green</label></div>
                        <div class="additional-product-item"><input type="radio" class="me-2" id="Categories-3" name="Categories-1" value="Beverages"><label for="Categories-3" class="text-dark">White</label></div>
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
                                     <i class="fa fa-star {{ $i <= $featured->rating ? 'text-warning' : 'text-muted' }}"></i>
                                    </div>
                                    <div class="d-flex">
                                        <h5 class="fw-bold me-2">${{ $featured->discount_price }}</h5>
                                        <h5 class="text-danger text-decoration-line-through">${{ $featured->price }}</h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No featured products available.</p>
                        @endforelse
                        <div class="d-flex justify-content-center">
                            <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">View More</a>
                        </div>
                    </div>

                    <!-- Ad Banner -->
                    <a href="#">
                        <div class="position-relative mb-4">
          <img 
    src="{{ 
        Str::startsWith($product->image, ['http://', 'https://']) 
            ? $product->image 
            : asset('storage/' . $product->image) 
    }}" 
    class="card-img-top img-fluid" 
    alt="{{ $product->name }}">
                            {{-- <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid w-100 rounded" alt="{{ $product->name }}"> --}}
                            <div class="text-center position-absolute d-flex flex-column align-items-center justify-content-center rounded p-4" style="width: 100%; height: 100%; top: 0; right: 0; background: rgba(242, 139, 0, 0.3);">
                                <h5 class="display-6 text-primary">{{ $product->condition }}</h5>
                                <h4 class="text-secondary">{{ $product->name }}</h4>
                                <a href="#" class="btn btn-primary rounded-pill px-4">Shop Now</a>
                            </div>
                        </div>
                    </a>

                    <!-- Product Tags -->
                    <div class="product-tags">
                        <h4 class="mb-3">PRODUCT TAGS</h4>
                        <div class="product-tags-items bg-light rounded p-3">
                            @forelse($product->tags ?? ['New', 'Brand', 'Black', 'White', 'Tablets', 'Phone', 'Camera', 'Drone', 'Television', 'Sales'] as $tag)
                                <a href="#" class="border rounded py-1 px-2 mb-2 d-inline-block me-1">{{ $tag }}</a>
                            @empty
                                <p>No tags available.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Main Product Content -->
                <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4 single-product">
                        <!-- Product Image and Details Row -->
                        <div class="row align-items-center g-5">
                            <!-- Product Image -->
                            <div class="col-xl-6">

                                @php
                                    $conditionClass = match(strtolower($product->condition ?? '')) {
                                        'new' => 'bg-success',
                                        'used' => 'bg-secondary',
                                        default => 'bg-warning'
                                    };
                                @endphp
                                <div class="position-relative bg-light rounded text-center p-3 shadow-sm product-image-container">
                                  
                                            <img 
    src="{{ 
        Str::startsWith($product->image, ['http://', 'https://']) 
            ? $product->image 
            : asset('storage/' . $product->image) 
    }}" 
    class="card-img-top img-fluid" 
    alt="{{ $product->name }}"> 
     {{-- <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 450px; object-fit: cover;"> --}}
                                    <!-- Condition Badge -->
                                    <span class="badge {{ $conditionClass }} position-absolute top-0 start-0 m-3 px-3 py-2 rounded-pill shadow">
                                        {{ ucfirst($product->condition ?? 'Unknown') }}
                                    </span>
                                </div>
                            </div>
                            <!-- Product Details -->
                            <div class="col-xl-6">
                                <h2 class="fw-bold text-primary mb-2">{{ $product->name }}</h2>
                                <p class="text-muted mb-3">{{ $product->category->name ?? 'Uncategorized' }}</p>

                                @php
                                    $displayPrice = $product->discount_price ?? $product->price ?? 0;
                                    $originalPrice = $product->price ?? 0;
                                    $hasDiscount = $displayPrice && $originalPrice && $displayPrice < $originalPrice;
                                @endphp

                                <!-- Price -->
                                <div class="mb-3">
                                    <h4 class="fw-bold text-danger d-inline">${{ number_format($displayPrice, 2) }}</h4>
                                    @if($hasDiscount)
                                        <del class="text-muted ms-2">${{ number_format($originalPrice, 2) }}</del>
                                    @endif
                                </div>
@if($product->attributes->isNotEmpty())
    <div class="mt-4">
        <h5 class="text-primary mb-3">⚙️ خصائص المنتج</h5>
        <ul class="list-group">
            @foreach($product->attributes as $attr)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="fw-bold">{{ $attr->name }}</span>
                    <span>{{ $attr->value }}</span>
                </li>
            @endforeach
        </ul>
    </div>
@else
    <p class="text-muted">لا توجد خصائص مضافة لهذا المنتج.</p>
@endif

                                <!-- Rating -->
                                @php $avgRating = $product->rating ?? 4; @endphp
                                <div class="d-flex align-items-center mb-4">
                                   
                                    
                                    <span class="ms-2 text-muted small">({{ $product->reviews_count ?? 12 }} تقييم)</span>
                                </div>

                                <!-- Attributes -->
                                @if(isset($product->attributes) && is_array($product->attributes) && count($product->attributes) > 0)
                                    <ul class="list-unstyled mb-4">
                                        @foreach($product->attributes as $attribute)
                                            <li><strong>{{ $attribute->name ?? 'Attribute' }}:</strong> {{ $attribute->value ?? 'N/A' }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <!-- Description -->

                                <!-- Availability -->
                                <div class="mb-4">
                                    <small class="d-block">الحالة: <strong class="text-capitalize">{{ $product->condition ?? 'unknown' }}</strong></small>
                                    <small class="d-block">متاح: <strong class="{{ $displayPrice > 0 ? 'text-success' : 'text-danger' }}">{{ $displayPrice > 0 ? 'متوفر' : 'غير متوفر' }}</strong></small>
                                </div>

                                <!-- Total Price -->
                                <p id="prod_totalPrice" class="fw-bold text-primary mb-4">السعر الإجمالي: ${{ number_format($displayPrice, 2) }}</p>

                                <!-- Quantity -->
                                <div class="input-group quantity mb-4" style="width: 120px;">
                                    <button class="btn btn-sm btn-outline-secondary rounded-start quantity-btn" type="button" id="prod_btn_minus"><i class="fa fa-minus"></i></button>
                                    <input type="text" class="form-control form-control-sm text-center border-0" id="prod_quantity" value="1" readonly>
                                    <button class="btn btn-sm btn-outline-secondary rounded-end quantity-btn" type="button" id="prod_btn_plus"><i class="fa fa-plus"></i></button>
                                </div>

                                <!-- Add to Cart Form -->
<form action="{{ route('cart.add') }}" method="POST" class="d-flex gap-2">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="product_name" value="{{ $product->name }}">
    <input type="hidden" name="price" value="{{ $product->discount_price }}">
    <input type="hidden" name="image" 
       value="{{ Str::startsWith($product->image, ['http://','https://']) 
               ? $product->image 
               : asset('storage/' . $product->image) }}">
    <input type="hidden" name="qty" id="hidden_qty" value="1">

    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm"
        onclick="document.getElementById('hidden_qty').value = document.getElementById('prod_quantity').value; return confirm('هل أنت متأكد؟');">
        <i class="fa fa-shopping-bag me-2"></i> أضف إلى السلة
    </button>
</form>


{{-- 

                              <form action="{{ route('cart.add') }}" method="POST" class="d-flex gap-2">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="product_name" value="{{ $product->name }}">
    <input type="hidden" name="price" value="{{ $product->discount_price }}">

    <input type="hidden" name="image" value="{{ asset('storage/' . $product->image) }}">
    <input type="hidden" name="qty" id="hidden_qty" value="1">

    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 shadow-sm"
        onclick="document.getElementById('hidden_qty').value = document.getElementById('prod_quantity').value; return confirm('هل أنت متأكد؟');">
        <i class="fa fa-shopping-bag me-2"></i> أضف إلى السلة
    </button>
</form>  --}}

                                <!-- Share Buttons -->
                                <div class="mt-3">
                                    <a href="#" class="btn btn-outline-primary rounded-pill px-4 py-1 me-2"><i class="fab fa-facebook-f me-1"></i> مشاركة</a>
                                    <a href="#" class="btn btn-outline-info rounded-pill px-4 py-1"><i class="fab fa-twitter me-1"></i> مشاركة</a>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs and Reviews -->
                        <div class="col-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active" id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about" type="button" role="tab">Description</button>
                                    <button class="nav-link" id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission" type="button" role="tab">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                                <!-- Description Tab -->
                                <div class="tab-pane fade show active" id="nav-about" role="tabpanel">
                                                               <p class="text-muted mb-4">{{ $product->description ?? 'No description available.' }}</p>
                                                            </div>
                                <!-- Reviews Tab -->
                                <div class="tab-pane fade" id="nav-mission" role="tabpanel">
                                    @forelse($product->reviews ?? [] as $review)
                                        <div class="d-flex mb-4">
                                                    <img 
    src="{{ 
        Str::startsWith($product->image, ['http://', 'https://']) 
            ? $product->image 
            : asset('storage/' . $product->image) 
    }}" 
    class="card-img-top img-fluid" 
    alt="{{ $product->name }}">
                                            {{-- <img src="{{ $review->user_avatar ?? 'img/avatar.jpg' }}" class="img-fluid rounded-circle p-3 me-3" style="width: 80px; height: 80px;" alt=""> --}}
                                            <div class="flex-grow-1">
                                                <p class="mb-2 small">{{ $review->created_at->format('M d, Y') ?? 'Recent' }}</p>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <h6>{{ $review->user_name ?? 'Anonymous' }}</h6>
                                                    <div class="d-flex">
                                                     <i class="fa fa-star {{ $i <= ($review->rating ?? 5) ? 'text-warning' : 'text-muted' }}"></i>
                                                    </div>
                                                </div>
                                                <p class="text-dark">{{ $review->comment ?? 'Great product!' }}</p>
                                            </div>
                                        </div>
                                    @empty
                                        <p>لا توجد تقييمات بعد. كن أول من يقيم!</p>
                                    @endforelse
                                </div>
                            </div>

                            <!-- Leave a Reply Form -->
                            <form action="#" class="row g-4">
                                <div class="col-lg-6"><input type="text" class="form-control border-0 py-3" placeholder="Your Name *"></div>
                                <div class="col-lg-6"><input type="email" class="form-control border-0 py-3" placeholder="Your Email *"></div>
                                <div class="col-12"><textarea class="form-control border-0 py-3" rows="5" placeholder="Your Review *"></textarea></div>
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center py-3">
                                        <div class="d-flex align-items-center">
                                            <p class="mb-0 me-3">Please rate:</p>
                                            <div class="d-flex">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-3">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Products End -->

    <!-- Related Products Start -->
    <div class="container-fluid related-product py-5">
        <div class="container">
            <div class="mx-auto text-center pb-5" style="max-width: 700px;">
                <h4 class="text-primary mb-4 border-bottom border-primary border-2 d-inline-block p-2 title-border-radius wow fadeInUp" data-wow-delay="0.1s">Related Products</h4>
                <p class="wow fadeInUp" data-wow-delay="0.2s">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, asperiores ducimus sint quos tempore officia similique quia? Libero, pariatur consectetur?</p>
            </div>
            <div class="custom-related-slider owl-carousel pt-4" id="relatedCarousel">
             

                @forelse($items as $item)
                    <div class="custom-related-item">
                        <div class="custom-related-item-inner">
                            <div class="position-relative">
                                        <img 
    src="{{ 
        Str::startsWith($item->image, ['http://', 'https://']) 
            ? $item->image 
            : asset('storage/' . $item->image) 
    }}" 
    class="card-img-top img-fluid" 
    alt="{{ $item->name }}">
                                {{-- <img src="{{ asset('storage/' . $related->image) }}" class="img-fluid w-100 rounded-top" alt="{{ $related->name }}"> --}}
                                <div class="position-absolute top-0 start-0 m-2 badge bg-primary">{{ $related->condition ?? 'New' }}</div>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <a href="#" class="btn btn-sm btn-outline-light"><i class="fa fa-eye"></i></a>
                                </div>
                            </div>
                            <div class="custom-text-center">
                                <a href="#" class="d-block mb-2 text-muted">{{ $related->category->name ?? 'Electronics' }}</a>
                                <h5 class="mb-2">{{ $item->name }}<br><small class="text-muted">{{ $item->model ?? 'Model' }}</small></h5>
                                @php $relDisplayPrice = $related->discount_price ?? $related->price ?? 0; $relOriginalPrice = $related->price ?? 0; @endphp
                                <div class="d-flex justify-content-center mb-3">
                                    @if($relDisplayPrice < $relOriginalPrice)
                                        <del class="me-2 fs-6">${{ number_format($relOriginalPrice, 2) }}</del>
                                    @endif
                                    <span class="text-primary fs-5">${{ number_format($relDisplayPrice, 2) }}</span>
                                </div>
                                <a href="#" class="btn btn-primary rounded-pill py-2 px-4 w-100"><i class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center p-4">
                        <p>No related products available.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </div>




    <!-- Related Products End -->

    @include('components.footer')

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script> 


    <!-- Clean JS for Custom Animation - No Conflicts -->
    <script>
        $(document).ready(function() {
            // Remove no-js class
            $('html').removeClass('no-js');

            // Destroy existing if any
            var carousel = $('#relatedCarousel');
            if (carousel.hasClass('owl-loaded')) {
                carousel.trigger('destroy.owl.carousel');
            }

            // Init with unique classes
            var items = $('.custom-related-item').length;
            if (items > 0) {
                carousel.owlCarousel({
                    loop: items > 3,
                    margin: 20,
                    nav: items > 1,
                    navClass: ['custom-owl-prev', 'custom-owl-next'],
                    navText: ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'],
                    dots: items > 1,
                    dotsClass: 'custom-owl-dots',
                    dotClass: 'custom-owl-dot',
                    autoplay: items > 1,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    smartSpeed: 600,
                    responsive: {
                        0: { items: 1 },
                        576: { items: 2 },
                        768: { items: 3 },
                        1200: { items: 4 }
                    }
                });

                // Refresh on resize
                $(window).resize(function() {
                    carousel.trigger('refresh.owl.carousel');
                });
            }

            // Quantity, Cart, Stars, WOW - keep as before
            const btnPlus = document.getElementById("prod_btn_plus");
            const btnMinus = document.getElementById("prod_btn_minus");
            const quantityInput = document.getElementById("prod_quantity");
            const totalPriceElement = document.getElementById("prod_totalPrice");
            const hiddenQty = document.getElementById("hidden_qty");
            const addToCartForm = document.getElementById("addToCartForm");

            let priceString = "{{ $displayPrice ?? 0 }}".replace(/[^\d.]/g, '');
            const unitPrice = parseFloat(priceString) || 0;
            let currentQty = 1;

            function updateTotal(qty) {
                const total = (unitPrice * qty).toFixed(2);
                totalPriceElement.innerHTML = `السعر الإجمالي: $${total}`;
                hiddenQty.value = qty;
            }

            updateTotal(currentQty);

            if (btnPlus) btnPlus.addEventListener("click", () => { currentQty++; quantityInput.value = currentQty; updateTotal(currentQty); });
            if (btnMinus) btnMinus.addEventListener("click", () => { if (currentQty > 1) { currentQty--; quantityInput.value = currentQty; updateTotal(currentQty); } });

            // Cart
            function getCart() { return JSON.parse(localStorage.getItem('shoppingCart')) || []; }
            function saveCart(cart) { localStorage.setItem('shoppingCart', JSON.stringify(cart)); }

            if (addToCartForm) {
                addToCartForm.addEventListener("submit", function(e) {
                    e.preventDefault();
                    if (confirm("هل أنت متأكد من إضافة هذا المنتج إلى السلة؟")) {
                        const productName = "{{ $product->name ?? '' }}";
                        const totalItemPrice = (unitPrice * currentQty).toFixed(2);

                        let cart = getCart();
                        const existingItemIndex = cart.findIndex(item => item.name === productName);

                        if (existingItemIndex !== -1) {
                            cart[existingItemIndex].qty += currentQty;
                            cart[existingItemIndex].total = (parseFloat(cart[existingItemIndex].total) + parseFloat(totalItemPrice)).toFixed(2);
                        } else if (unitPrice > 0) {
                            cart.push({
                                name: productName,
                                price: unitPrice.toFixed(2),
                                qty: currentQty,
                                total: totalItemPrice,
                                image: "{{ asset('storage/' . ($product->image ?? '')) }}"
                            });
                        }

                        saveCart(cart);
                        alert(`تم إضافة ${currentQty} من ${productName} إلى السلة!`);
                        const cartBadge = document.getElementById("cartBadge");
                        if (cartBadge) {
                            const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
                            cartBadge.textContent = totalItems > 0 ? totalItems : '';
                        }
                    }
                });
            }

            // Review Stars
            document.querySelectorAll('.review-star').forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.dataset.rating);
                    document.querySelectorAll('.review-star').forEach((s, index) => {
                        s.classList.toggle('text-warning', index < rating);
                        s.classList.toggle('text-muted', index >= rating);
                    });
                });
            });

            // WOW
            if (typeof WOW !== 'undefined') new WOW().init();
        });
    </script>

</body>

</html>
</x-navbar>
