<meta name="csrf-token" content="{{ csrf_token() }}">
@php
use App\Models\Cart;
$cartItems = auth()->check()
    ? Cart::where('user_id', auth()->id())->with('product')->get()
    : collect(); // لو المستخدم مش داخل
$total = $cartItems->sum(fn($item) => $item->price * $item->quantity);
$cartCount = $cartItems->sum('quantity');
@endphp
@php
$favorites = [];
$favCount = 0;
if (Auth::check()) {
    $favorites = \App\Models\Favorite::with('product')
        ->where('user_id', Auth::id())
        ->get();
    $favCount = $favorites->count();
}
@endphp
<style>
        .navbar .nav-item .dropdown-menu {
            width:50% !important;
        }
/* ستايل الـ Mega Menu محسن - أسماء كلاسات جديدة تماماً لتجنب التداخل، وعدلت العرض عشان المنيو ميبقاش ضيق ويتمحور كويس */
.custom-mega-wrapper {
    border-radius: 8px !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
    position: absolute !important;
    left: 50% !important;
    transform: translateX(-50%) !important; /* عشان يتمحور تماماً */
    width: 90% !important;
    max-width: 90vw !important;
    min-width: 600px !important; /* حد أدنى عشان ميبقاش صغير جداً */
    overflow-x: hidden !important;
    z-index: 1050 !important;
    background-color: #ffffff !important;
    padding: 15px !important; /* زدت الـ padding شوية عشان يبقى أوسع */
}
.custom-mega-container {
    width: 100% !important;
    padding-left: 15px !important; /* زدت الـ padding */
    padding-right: 15px !important;
    margin-left: auto !important;
    margin-right: auto !important;
}
.custom-mega-flex-center {
    justify-content: center !important;
    display: flex !important; /* ضمن إنه flex */
    flex-wrap: wrap !important; /* عشان يلف لو كتير */
}
.custom-mega-column {
    width: 20% !important; /* زدت من 12% لـ 20% عشان الأعمدة تبقى أوسع ومتناسبة مع 4-5 فئات رئيسية */
    flex: 0 0 20% !important;
    max-width: 20% !important;
    padding-left: 8px !important; /* زدت الـ padding بين الأعمدة */
    padding-right: 8px !important;
    box-sizing: border-box !important;
    margin-bottom: 10px !important; /* مساحة أكبر تحت كل عمود */
    word-wrap: break-word !important; /* عشان النصوص الطويلة ميخرجش بره */
}
.custom-mega-title {
    font-size: 0.95rem !important; /* شوية أصغر */
    border-bottom: 1px solid #007bff;
    padding-bottom: 6px;
    color: #007bff !important;
    font-weight: bold !important;
    margin-bottom: 8px !important;
    text-align: center !important; /* تمحيص العنوان */
}
.custom-mega-item {
    background-color: transparent !important;
    border: none !important;
    color: #000 !important;
    text-decoration: none !important;
    padding: 6px 0 !important; /* زدت الـ padding شوية */
    display: block !important;
    font-size: 0.9rem !important; /* حجم نص أصغر شوية */
    white-space: nowrap !important; /* عشان ميلفش السطر */
    overflow: hidden !important;
    text-overflow: ellipsis !important; /* ... لو النص طويل */
}
.custom-mega-item:hover {
    background-color: #f8f9fa !important;
    color: #007bff !important;
    border-radius: 4px !important; /* شوية انحناء عند الهوفر */
}
/* تحسين الـ responsive - على الموبايل هيبقى عمودين */
@media (max-width: 768px) {
    .custom-mega-wrapper {
        width: 95% !important;
        min-width: auto !important;
        left: 2.5% !important;
        right: 2.5% !important;
        transform: none !important; /* على الموبايل مش محتاج translate */
        padding: 15px !important;
    }
    .custom-mega-column {
        width: 50% !important; /* عمودين على الموبايل */
        flex: 0 0 50% !important;
        max-width: 50% !important;
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
    .custom-mega-title {
        font-size: 1rem !important;
        text-align: left !important;
    }
    .custom-mega-item {
        white-space: normal !important; /* على الموبايل يلف السطر */
        font-size: 0.95rem !important;
    }
    .custom-mega-container {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
}
/* لو الشاشة أصغر، عمود واحد */
@media (max-width: 480px) {
    .custom-mega-column {
        width: 100% !important;
        flex: 0 0 100% !important;
        max-width: 100% !important;
    }
}
/* إصلاح عرض الـ dropdown على الهوفر (كان display: flow خطأ) */
.navbar .nav-item:hover .dropdown-menu {
    display: block !important;
}
/* Make navbar fully visible on mobile without collapse */
@media (max-width: 991.98px) {
    .navbar-collapse {
        display: block !important; /* Always show */
        position: static !important;
        width: 100% !important;
        height: auto !important;
        background-color: transparent !important;
        z-index: auto !important;
        overflow: visible !important;
        padding: 0 !important;
        transform: none !important;
        box-shadow: none !important;
    }
    .navbar-toggler {
        display: none !important; /* Hide toggler */
    }
    .navbar-backdrop {
        display: none !important;
    }
    .mobile-menu-close {
        display: none !important;
    }
    /* Adjust nav items for mobile */
    .navbar-nav {
        flex-direction: row !important; /* Keep horizontal */
        align-items: center !important;
        flex-wrap: wrap !important;
    }
    .nav-item {
        width: auto !important;
        margin-bottom: 0 !important;
    }
    .nav-link {
        padding: 0.5rem 1rem !important;
        border-radius: 0 !important;
        width: auto !important;
        text-align: center !important;
    }
    .dropdown-menu {
        position: absolute !important;
        float: none !important;
        width: auto !important;
        margin-top: 0 !important;
        border: 1px solid #dee2e6 !important;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        background-color: #fff !important;
    }
    .dropdown-item {
        padding: 0.5rem 1rem !important;
        width: auto !important;
    }
    /* Mega menu adjustments for mobile */
    .custom-mega-wrapper {
        position: absolute !important;
        left: 0 !important;
        transform: none !important;
        width: 100vw !important;
        max-width: none !important;
        min-width: auto !important;
        margin: 0 !important;
        border-radius: 0 !important;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1) !important;
    }
    .custom-mega-column {
        width: 100% !important; /* Full width for better sub-menu organization */
        flex: 0 0 100% !important;
        max-width: 100% !important;
        padding-left: 10px !important;
        padding-right: 10px !important;
        margin-bottom: 15px !important;
    }
}
#topbar1{
    background-color: #f28b00;
}
small, .small {
    font-size: 1.1em;
    color: black;
}
</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<link href="/lib/animate/animate.min.css" rel="stylesheet">
<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none border-bottom d-lg-block" id="topbar1">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-4 text-center text-lg-start mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a href="{{ route('help') }}" class="text-muted me-2"> Help</a><small> / </small>
                    <a href="{{ route('support') }}" class="text-muted mx-2"> Support</a><small> / </small>
                    <a href="{{url('contact')}}" class="text-muted ms-2"> Contact</a>
                </div>
            </div>
            <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
                <small class="text-dark">Call Us:</small>
                <a href="#" class="text-muted">(+012) 1234 567890</a>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>
                                USD</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item"> Euro</a>
                            <a href="#" class="dropdown-item"> Dolar</a>
                        </div>
                    </div>
                    {{-- <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>
                                English</small></a>
                        <div class="dropdown-menu rounded">
                            <a href="#" class="dropdown-item"> English</a>
                            <a href="#" class="dropdown-item"> Arabic</a>
                        </div>
                    </div> --}}
           <div class="dropdown">
    <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown">
        <small>{{ strtoupper(app()->getLocale()) }}</small>
    </a>
    <div class="dropdown-menu rounded">
        <a href="{{ route('change.lang', ['lang' => 'en']) }}" class="dropdown-item">English</a>
        <a href="{{ route('change.lang', ['lang' => 'ar']) }}" class="dropdown-item">Arabic</a>
    </div>
</div>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown"><small><i
                                    class="fa fa-home me-2"></i> My Dashboard</small></a>
                        <div class="dropdown-menu rounded">
                           @if(auth()->check())
                                <a href="{{ route('profile.show') }}" class="dropdown-item">Profile </a>
                            @else
                                <a href="{{ route('login') }}" class="dropdown-item">Login </a>
                            @endif
                            @auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('categories.index') }}" class="dropdown-item">Dashboard</a>
    @endif
@endauth
                            <a href="#" class="dropdown-item"> Wishlist</a>
                            <a href="{{ route('cart.index') }}" class="dropdown-item"> My Card</a>
                            <a href="{{ route('favorites.index') }}" class="dropdown-item"> My favorites</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"> Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-4 d-none d-lg-block">
        <div class="row gx-0 align-items-center text-center">
            <div class="col-md-4 col-lg-3 text-center text-lg-start">
                <div class="d-inline-flex align-items-center">
                    <a href="" class="navbar-brand p-0">
                        <h1 class="display-5 text-primary m-0"><a href="{{url('/')}}">Emo store</a><i
                                class="fas fa-shopping-bag text-secondary me-2"></i></h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                </div>
            </div>
          <form action="{{ route('products.search') }}" method="GET" class="col-md-4 col-lg-6 text-center">
    <div class="position-relative ps-4">
        <div class="d-flex border rounded-pill">
            <input class="form-control border-0 rounded-pill w-100 py-3"
                   type="text" name="q" placeholder="Search Looking For?">
            <select class="form-select text-dark border-0 border-start rounded-0 p-3" name="category" style="width: 200px;">
                <option value="">All Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
            <div class="col-md-4 col-lg-3 text-center text-lg-end">
                <div class="d-inline-flex align-items-center">
                    <a href="#" class="text-muted d-flex align-items-center justify-content-center me-3"><span
                            class="rounded-circle btn-md-square border"><i class="fas fa-random"></i></i></a>
<div class="dropdown me-3 position-relative">
    <a class="d-flex align-items-center justify-content-center text-dark text-decoration-none position-relative"
       href="#" id="favDropdown" data-bs-toggle="dropdown">
        <span class="position-relative">
            <span class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center"
                  style="width: 42px; height: 42px;">
                <i class="fas fa-heart fa-lg"></i>
            </span>
            @if($favCount > 0)
                <span id="favBadge"
                      class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle"
                      style="font-size: 11px; min-width: 20px; height: 20px; line-height: 18px;">
                      {{ $favCount }}
                </span>
            @endif
        </span>
        <span class="fw-semibold ms-2"></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2"
        style="width: 378px; max-height: 350px; overflow-y: auto; border-radius: 16px;">
        @if($favorites instanceof \Illuminate\Support\Collection && $favorites->isEmpty())
            <li class="text-center py-4">
                <i class="fas fa-heart-broken fa-3x text-muted mb-2"></i>
                <p class="mb-0 text-muted">لا توجد منتجات مفضلة</p>
            </li>
        @else
            @foreach($favorites as $fav)
                @if($fav->product)
                    <li class="dropdown-item px-2 py-2 border-bottom d-flex align-items-center">
                        <img src="{{ asset('storage/' . $fav->product->image) }}"
                             alt="{{ $fav->product->name }}"
                             class="rounded shadow-sm me-2"
                             style="width: 50px; height: 50px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <div class="fw-semibold small text-dark mb-1">{{ Str::limit($fav->product->name, 30) }}</div>
                            <small class="text-primary fw-bold">${{ number_format($fav->product->price, 2) }}</small>
                        </div>
                        <form action="{{ route('favorites.remove', $fav->product_id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('هل تريد حذف {{ $fav->product->name }} من المفضلة؟')">
                                حذف
                            </button>
                        </form>
                    </li>
                @endif
            @endforeach
            <li><hr class="my-2"></li>
            <li class="dropdown-item text-center">
                <a href="{{ route('favorites.index') }}" class="btn btn-sm btn-primary px-3">
                    عرض كل المفضلة
                </a>
            </li>
        @endif
    </ul>
</div>
{{-- في الـ navbar، غير قسم السلة إلى هذا: --}}
<div class="dropdown me-3 position-relative">
    <a class="d-flex align-items-center justify-content-center text-dark text-decoration-none position-relative"
       href="#" id="cartDropdown" data-bs-toggle="dropdown">
        <span class="position-relative">
            <span class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center"
                  style="width: 42px; height: 42px;">
                <i class="fas fa-shopping-cart fa-lg"></i>
            </span>
             @if($cartCount > 0)
                <span id="cartBadge"
                      class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle"
                      style="font-size: 11px; min-width: 20px; height: 20px; line-height: 18px;">
                      {{ $cartCount }}
                </span>
            @endif
        </span>
        <span class="fw-semibold ms-2">${{ number_format($total, 2) }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 p-2"
        style="width: 378px; max-height: 350px; overflow-y: auto; border-radius: 16px;">
        @if($cartItems->isEmpty())
            <li class="text-center py-4">
                <i class="fas fa-shopping-basket fa-3x text-muted mb-2"></i>
                <p class="mb-0 text-muted">السلة فارغة</p>
            </li>
        @else
            @foreach($cartItems as $item)
                <li class="dropdown-item px-2 py-2 border-bottom d-flex align-items-center">
                 <img
    src="{{
        Str::startsWith($item->image, ['http://', 'https://'])
            ? $item->image
            : asset('storage/' . $item->image)
    }}"
    alt="{{ $item->product->name ?? $item->name ?? 'Product image' }}"
    class="rounded shadow-sm me-2"
    style="width: 50px; height: 50px; object-fit: cover;">
                    <div class="flex-grow-1">
                        <div class="fw-semibold small text-dark mb-1">{{ Str::limit($item->product->name, 30) }}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">×{{ $item->quantity }}</small>
                            <small class="text-primary fw-bold">${{ number_format($item->price * $item->quantity, 2) }}</small>
                        </div>
                    </div>
                     <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('حذف {{ $item->product->name }}?')">حذف</button>
                                    </form>
                </li>
            @endforeach
            <li><hr class="my-2"></li>
            <li class="dropdown-item text-center">
                <h6 class="fw-bold mb-1 text-primary">الإجمالي: ${{ number_format($total, 2) }}</h6>
                <div class="d-flex justify-content-center mt-2">
                    <a href="{{ route('cart.index') }}" class="btn btn-sm btn-outline-primary me-2 px-3">عرض السلة</a>
                    <a href="{{ route('checkout') }}" class="btn btn-sm btn-primary px-3">الدفع الآن</a>
                </div>
            </li>
        @endif
    </ul>
</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    <!-- Navbar & Hero Start -->
    <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Accessories</a>
                                        <span>(3)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Electronics & Computer</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Laptops & Desktops</a>
                                        <span>(2)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">Mobiles & Tablets</a>
                                        <span>(8)</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="categories-bars-item">
                                        <a href="#">SmartPhone & Smart TV</a>
                                        <span>(5)</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i
                                class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{ route('shop') }}" class="nav-item nav-link">Shop</a>
                            {{-- <a href="{{ route('signal') }}" class="nav-item nav-link">Single Page</a> --}}
{{-- @props(['title']) --}}
<div class="nav-item dropdown position-static">
    <a href="#" class="nav-link dropdown-toggle" id="megaMenuDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Category
    </a>
    <!-- Dropdown كامل العرض مع ستايل محسن - أسماء كلاسات جديدة -->
    <div class="dropdown-menu w-100 shadow border-0 p-4 custom-mega-wrapper" aria-labelledby="megaMenuDropdown">
        <div class="custom-mega-container">
            <div class="row custom-mega-flex-center">
                @foreach ($categories->where('parent_id', null) as $category)
                    <div class="custom-mega-column">
                        <h6 class="custom-mega-title">{{ $category->name }}</h6>
                        <ul class="list-unstyled">
                            @if($category->children->isNotEmpty())
                                @foreach ($category->children as $child)
                                    <li>
                                        <a class="custom-mega-item py-1" href="{{ route('category.show', $child->slug) }}">
                                            {{ $child->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li><small class="text-muted">لا توجد فئات فرعية</small></li>
                            @endif
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">products</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('products.create') }}" class="dropdown-item">create products</a>
                                    <a href="{{ route('cart.index') }}" class="dropdown-item">Cart Page</a>
                                    <a href="{{ route('checkout') }}" class="dropdown-item">Cheackout</a>
                                    <a href="{{route('error')}}" class="dropdown-item">404 Page</a>
                                </div>
                            </div>
                            {{-- <a href="{{ url('contact') }}" class="nav-item nav-link me-2">Contact</a> --}}
                            <div class="nav-item dropdown d-block d-lg-none mb-3">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Category</a>
                                <div class="dropdown-menu m-0">
                                    <ul class="list-unstyled categories-bars">
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Accessories</a>
                                                <span>(3)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Electronics & Computer</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Laptops & Desktops</a>
                                                <span>(2)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Mobiles & Tablets</a>
                                                <span>(8)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">SmartPhone & Smart TV</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <a href="" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                class="fa fa-mobile-alt me-2"></i> +0123 456 7890</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    {{ $slot }}
<!-- Scripts ngrok -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/lib/wow/wow.min.js"></script>
<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartDropdown = document.getElementById('cartDropdown');
    const cartBadge = document.getElementById('cartBadge');
    if (cartDropdown && cartBadge) {
        // 🟢 عند فتح السلة (يختفي الرقم)
        cartDropdown.addEventListener('show.bs.dropdown', function() {
            cartBadge.style.opacity = '0';
            cartBadge.style.transition = 'opacity 0.3s ease';
        });
        // 🟢 عند إغلاق السلة (يظهر الرقم من جديد)
        cartDropdown.addEventListener('hide.bs.dropdown', function() {
            setTimeout(() => {
                cartBadge.style.opacity = '1';
            }, 200);
        });
    }


});
.then(data => {
    const icon = this.querySelector('i');
    icon.classList.toggle('text-danger', data.favorite);
    // تحديث رقم العدّاد في الهيدر مباشرة
    const favBadge = document.querySelector('#favDropdown .badge');
    if (favBadge) {
        favBadge.textContent = data.favCount;
    } else if (data.favCount > 0) {
        const badge = document.createElement('span');
        badge.className = 'badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle';
        badge.textContent = data.favCount;
        document.querySelector('#favDropdown .rounded-circle').appendChild(badge);
    }
})
</script>