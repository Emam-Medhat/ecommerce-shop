@php
    $current = app()->getLocale();
    $other = $current === 'ar' ? 'en' : 'ar';
@endphp



<script>
    (function(){
        const btn = document.getElementById('langToggle');
        if(!btn) return;

        btn.addEventListener('click', function(e){
            // Disable double clicks briefly
            btn.disabled = true;
            const url = btn.dataset.target || document.getElementById('langFallback').href;
            // optional: small UX touch (spinner)
            const orig = btn.innerHTML;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Switching...';

            // navigate to route that changes language
            window.location.href = url;
        });
    })();
</script>


<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم - Electro</title>

    <!-- Google Fonts: Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>

    <!-- AOS for Animations -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


    <style>
        /* ======= Root Colors ======= */
:root {
    --primary-color: #4fc3f7; /* أزرق فاتح */
    --secondary-color: #0288d1; /* أزرق متوسط */
    --light-bg: #f5f5f5;
    --dark-bg: #1e293b;
    --card-bg: #fff;
    --card-bg-dark: #273449;
    --text-light: #cfd8dc;
    --text-dark: #111827;
}

/* ======= Body ======= */
body {
    font-family: 'Cairo', sans-serif;
    background: var(--light-bg);
    overflow-x: hidden;
    transition: background 0.3s ease, color 0.3s ease;
    color: #111827;
}

body.dark {
    background: #FF6B35;
    color: #e0e0e0;
}

/* ======= Navbar ======= */
.navbar-custom {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    padding: 15px 30px;
    z-index: 1000;
}

body.dark .navbar-custom {
    background: rgba(30, 41, 59, 0.95);
    color: #e0e0e0;
}

.navbar-custom .navbar-brand {
    font-weight: 700;
    font-size: 1.5rem;
    color: var(--primary-color);
    transition: color 0.3s ease;
}

body.dark .navbar-brand { color: #81d4fa; }

.navbar-custom .nav-link {
    color: #333;
    font-weight: 500;
    margin: 0 10px;
    transition: all 0.3s ease;
}

body.dark .nav-link { color: #cfd8dc; }

.navbar-custom .nav-link:hover {
    color: var(--primary-color);
    transform: scale(1.05);
}

/* ======= Sidebar ======= */
#sidebar {
    width: 280px;
    background: linear-gradient(180deg, #0f1c2f 0%, #1a2a45 100%);
    min-height: 100vh;
    box-shadow: 4px 0 20px rgba(0,0,0,0.1);
    position: fixed;
    top: 0;
    left: 0;
    z-index: 999;
    transition: all 0.4s ease;
}

body.dark #sidebar {
    background: linear-gradient(180deg, #0a0f1a 0%, #111827 100%);
}

#sidebar .sidebar-header {
    text-align: center;
    color: #fff;
    padding: 30px 20px;
    font-size: 1.4rem;
    font-weight: 700;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

#sidebar .sidebar-header span {
    display: block;
    font-size: 0.9rem;
    font-weight: 300;
    color: #cfd8dc;
    margin-top: 5px;
}

#sidebar .nav-link {
    color: #cfd8dc !important;
    font-size: 15px;
    padding: 15px 25px;
    border-radius: 10px;
    margin: 5px 15px;
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}

#sidebar .nav-link:hover,
#sidebar .nav-link.active {
    background: var(--primary-color);
    color: #fff !important;
    transform: translateX(5px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

#sidebar .nav-link i {
    margin-left: 10px;
    transition: transform 0.3s ease;
}

#sidebar .nav-link:hover i { transform: rotate(15deg); }

/* ======= Content ======= */
.content {
    flex: 1;
    padding: 40px;
    margin-left: 280px;
    transition: margin-left 0.4s ease, background 0.3s ease, color 0.3s ease;
    background: var(--light-bg);
}

body.dark .content {
    background: var(--primary-color);
    color: #e0e0e0;
}

.content .card {
    border-radius: 15px;
    background: var(--card-bg);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
    border: none;
}

body.dark .content .card {
    background: var(--card-bg-dark);
}

.content .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

/* ======= Toggle Sidebar Button ======= */
#toggleSidebar {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: var(--primary-color);
    transition: transform 0.3s ease;
}

#toggleSidebar:hover { transform: rotate(90deg); }

/* ======= Dark Mode Toggle ======= */
.dark-toggle {
    background: var(--primary-color);
    border: none;
    border-radius: 50px;
    padding: 10px 15px;
    color: white;
    transition: all 0.3s ease;
}

.dark-toggle:hover {
    transform: scale(1.1);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* ======= Responsive ======= */
@media (max-width: 992px) {
    #sidebar {
        left: -280px;
    }

    #sidebar.active {
        left: 0;
    }

    .content {
        margin-left: 0;
        padding: 20px;
    }
}

/* ======= Animations ======= */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.content { animation: fadeInUp 0.6s ease; }
.navbar-custom {
    z-index: 1100 !important;
}
.navbar-custom .container-fluid {
    position: relative;
}

        </style>

</head>
<style>
    .lang-dropdown .lang-btn {
        background: #f8f9fa;
        border: 2px solid #ddd;
        padding: 6px 14px;
        border-radius: 30px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: 0.3s ease-in-out;
        font-weight: 600;
        color: #444;
    }

    .lang-dropdown .lang-btn:hover {
        background: #ffffff;
        border-color: #0d6efd;
        color: #0d6efd;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .lang-dropdown .dropdown-menu {
        border-radius: 20px;
        padding: 10px 0;
        border: none;
        box-shadow: 0 8px 22px rgba(0,0,0,0.15);
        animation: fadeDown 0.3s ease;
    }

    .lang-dropdown .dropdown-item {
        font-weight: 600;
        padding: 10px 20px;
        transition: 0.2s;
    }

    .lang-dropdown .dropdown-item:hover {
        background: #0d6efd;
        color: white;
        border-radius: 12px;
    }

    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .lang-flag {
        width: 22px;
        height: 22px;
        border-radius: 50%;
        object-fit: cover;
        border: 1px solid #ccc;
    }
</style>
<body>

    <!-- Navbar احترافي مع ألوان Electro -->
    <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
        <div class="container-fluid">
            <button id="toggleSidebar" class="navbar-toggler" type="button">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-store me-2" style="color: var(--primary-color);"></i>  {{ __('messages.dashboard') }}
            </a>
   <!-- Language Dropdown -->



            <!-- Search Bar -->
            <form class="d-flex mx-auto" style="max-width: 400px;">
                <input class="form-control search-input me-2" type="search" placeholder="{{ __('messages.search_placeholder') }}" aria-label="Search">
                <button class="btn" type="submit" style="background: var(--primary-color); border: none; border-radius: 25px; color: white; padding: 8px 15px;"><i class="fas fa-search"></i></button>
            </form>

<div class="dropdown lang-dropdown">
    <button class="lang-btn dropdown-toggle" data-bs-toggle="dropdown">
    <span>{{ strtoupper(app()->getLocale()) }}</span>
    </button>

    <ul class="dropdown-menu">
        <li>
            <a class="dropdown-item d-flex align-items-center gap-2"
               href="{{ route('change.lang', ['lang' => 'en']) }}">English
            </a>
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center gap-2"
               href="{{ route('change.lang', ['lang' => 'ar']) }}"> العربية
            </a>
        </li>
    </ul>
</div>
            <div class="ms-auto d-flex align-items-center">

                <!-- Dark Mode Toggle -->
                <button class="dark-toggle me-3" onclick="toggleDarkMode()">
                    <i class="fas fa-moon" id="theme-icon"></i>
                </button>

                <!-- User Dropdown -->
                <div class="dropdown user-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{-- <img src="https://via.placeholder.com/40" class="rounded-circle me-2" width="40" alt="User"> --}}
                    <span>welcome    <span> {{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user me-2" style="color: var(--primary-color);"></i>{{ __('messages.profile') }} </a></li>
                        <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="fas fa-users me-2" style="color: var(--primary-color);"></i> {{ __('messages.clients') }}</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>   {{ __('messages.logout') }}
                        </a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex" style="margin-top: 80px;">
        <!-- Sidebar -->
        <nav id="sidebar" class="d-flex flex-column p-0">
            <div class="sidebar-header">
    <i class="fas fa-shopping-bag mb-2" style="font-size: 2rem; color: #fff;"></i>
    {{ __('messages.dashboard') }}

<h3 class="site-title">EMO Store</h3>

<style>
    .site-title {
        margin-top: 30px;
        font-size: 38px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-align: center;

        /* Gradient هادي وجميل */
        background: linear-gradient(90deg, #0066ff, #00d4ff);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;

        /* جلو خفيف جداً */
        text-shadow: 0 2px 6px rgba(0, 125, 255, 0.25);

        /* أنميشن هادية */
        animation: fadeGlow 3s ease-in-out infinite alternate;
    }

    @keyframes fadeGlow {
        0% {
            text-shadow: 0 2px 6px rgba(0, 125, 255, 0.25);
        }
        100% {
            text-shadow: 0 2px 12px rgba(0, 125, 255, 0.45);
        }
    }
</style>




</div>
<ul class="nav nav-pills flex-column mt-4 px-3">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
            <i class="fas fa-home"></i> <span>{{ __('messages.home') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
            <i class="fas fa-tags"></i> <span>{{ __('messages.manage_categories') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.products.pending') }}" class="nav-link {{ request()->routeIs('admin.products.pending') ? 'active' : '' }}">
            <i class="fas fa-clock"></i> <span>{{ __('messages.pending_products') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
            <i class="fas fa-boxes"></i> <span>{{ __('messages.manage_products') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('subcategories.create') }}" class="nav-link {{ request()->routeIs('subcategories.*') ? 'active' : '' }}">
            <i class="fas fa-layer-group"></i> <span>{{ __('messages.subcategories') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('profile.index') }}" class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="fas fa-users"></i> <span>{{ __('messages.clients') }}</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
            <i class="fas fa-envelope"></i> <span>{{ __('messages.messages') }}</span>
        </a>
    </li>
</ul>
        </nav>

        <!-- Main Content -->
        <div class="content w-100 p-4">
            {{ $slot }}
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS for Animations -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });

        // Toggle Sidebar
        const toggleSidebarBtn = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        toggleSidebarBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
            // Overlay for mobile
            if (sidebar.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        });

        // Close sidebar on outside click (mobile)
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 992 && sidebar.classList.contains('active') && !sidebar.contains(e.target) && !toggleSidebarBtn.contains(e.target)) {
                sidebar.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Dark Mode Toggle
        function toggleDarkMode() {
            document.body.classList.toggle('dark');
            const icon = document.getElementById('theme-icon');
            icon.className = document.body.classList.contains('dark') ? 'fas fa-sun' : 'fas fa-moon';
            localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
        }

        // Load Dark Mode
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark');
            document.getElementById('theme-icon').className = 'fas fa-sun';
        }
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('langToggle');
    if(!btn) return;

    btn.addEventListener('click', function(e){
        // منع ضغطات متتالية
        btn.disabled = true;
        const url = btn.dataset.target || document.getElementById('langFallback').href;

        // لمسة UX: مؤشر تحميل مؤقت
        const orig = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Switching...';

        // توجه للرابط الذي يغيّر اللغة
        window.location.href = url;
    });
});
</script>
</body>
</html>
