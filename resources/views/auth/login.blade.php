<x-navbar title="{{ __('messages.page_login') }}">

<style>
/* Container الرئيسي */
.login-wrapper {
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin-top: 60px;
}

/* فورم تسجيل الدخول */
.login-form {
    width: 400px;
    background: #fff;
    padding: 35px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

.login-form h3 {
    text-align: center;
    color: #0d6efd;
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 25px;
}

.login-form .form-control {
    border-radius: 8px;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
}

.login-form .form-control:focus {
    border-color: #0d6efd;
    box-shadow: 0 0 5px rgba(13,110,253,0.4);
}

.login-form button {
    border-radius: 8px;
    font-weight: 500;
    padding: 10px;
    transition: 0.3s;
    margin-bottom: 15px;
}

.login-form button:hover {
    transform: translateY(-2px);
}

/* رابط التسجيل */
.login-form .text-center a {
    color: #0d6efd;
    text-decoration: none;
    font-weight: 500;
}

.login-form .text-center a:hover {
    text-decoration: underline;
}

/* Social Login */
.social-login {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 15px;
}

.social-login a {
    flex: 1 1 calc(50% - 6px); /* زرين في الصف */
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    border-radius: 8px;
    padding: 10px;
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

.social-login a.google { background: #dc3545; }
.social-login a.github { background: #333; }
.social-login a.facebook { background: #0d6efd; }
.social-login a.twitter { background: #17a2b8; }

.social-login a:hover {
    opacity: 0.9;
    transform: translateY(-2px);
}

/* Alerts */
.alert-danger {
    border-radius: 8px;
    font-size: 0.95rem;
    text-align: center;
}

/* Responsive */
@media (max-width: 576px) {
    .login-form {
        width: 95%;
    }
    .social-login a {
        flex: 1 1 100%; /* عمود واحد على الشاشات الصغيرة */
    }
}
</style>

<div class="container login-wrapper">
    <div class="login-form">
        <h3>{{ __('messages.login') }}</h3>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.store') }}" method="POST">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="{{ __('messages.email') }}" required value="{{ old('email') }}">
            <input type="password" name="password" class="form-control" placeholder="{{ __('messages.password') }}" required>
            <button type="submit" class="btn btn-warning w-100">{{ __('messages.login') }}</button>
        </form>

        <div class="text-center mt-2">
            {{ __('messages.no_account') }} <a href="{{ route('register') }}">{{ __('messages.register_now') }}</a>
        </div>

        <div class="social-login">
            <a href="{{ route('google.login') }}" class="google"><i class="fab fa-google"></i> Google</a>
            <a href="{{ route('github.login') }}" class="github"><i class="fab fa-github"></i> GitHub</a>
            <a href="{{ route('facebook.login') }}" class="facebook"><i class="fab fa-facebook-f"></i> Facebook</a>
            <a href="{{ route('twitter.login') }}" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
        </div>
    </div>
</div>

</x-navbar>
