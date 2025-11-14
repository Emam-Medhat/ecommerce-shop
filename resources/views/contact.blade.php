<x-navbar title="{{ __('messages.bestseller_page') }}">

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

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
</head>

<body>
@if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">{{ __('messages.contact_us') }}</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="#">{{ __('messages.home') }}</a></li>
        <li class="breadcrumb-item"><a href="#">{{ __('messages.pages') }}</a></li>
        <li class="breadcrumb-item active text-white">{{ __('messages.contact') }}</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Contucts Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 900px;">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">{{ __('messages.get_in_touch') }}</h4>
                        <p class="mb-5 fs-5 text-dark">{{ __('messages.we_are_here') }}</p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h5 class="text-primary wow fadeInUp" data-wow-delay="0.1s">{{ __('messages.lets_connect') }}</h5>
                    <h1 class="display-5 mb-4 wow fadeInUp" data-wow-delay="0.3s">{{ __('messages.send_your_message') }}</h1>
                    <p class="mb-4 wow fadeInUp" data-wow-delay="0.5s">{{ __('messages.contact_form_info') }} <a
                        href="https://htmlcodex.com/contact-form">{{ __('messages.download_now') }}</a>.</p>
                 
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-4 wow fadeInUp" data-wow-delay="0.1s">

                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ __('messages.your_name') }}" required>
                                    <label for="name">{{ __('messages.your_name') }}</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="{{ __('messages.your_email') }}" required>
                                    <label for="email">{{ __('messages.your_email') }}</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="number" name="phone" class="form-control" id="phone" placeholder="{{ __('messages.phone') }}" required>
                                    <label for="phone">{{ __('messages.phone') }}</label>
                                </div>
                            </div>

                            <div class="col-lg-12 col-xl-6">
                                <div class="form-floating">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="{{ __('messages.subject') }}" required>
                                    <label for="subject">{{ __('messages.subject') }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea name="message" class="form-control" placeholder="{{ __('messages.message') }}" id="message" style="height: 160px" required></textarea>
                                    <label for="message">{{ __('messages.message') }}</label>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">{{ __('messages.send_message') }}</button>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="h-100 rounded">
                        <iframe class="rounded w-100" style="height: 100%;"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387191.33750346623!2d-73.97968099999999!3d40.6974881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1694259649153!5m2!1sen!2sbd"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>{{ __('messages.address') }}</h4>
                                    <p class="mb-2">123 Street New York.USA</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fas fa-envelope fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>{{ __('messages.mail_us') }}</h4>
                                    <p class="mb-2">info@example.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fa fa-phone-alt fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>{{ __('messages.telephone') }}</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="rounded p-4">
                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                                    style="width: 70px; height: 70px;">
                                    <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h4>{{ __('messages.website_email') }}</h4>
                                    <p class="mb-2">(+012) 3456 7890</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Contuct End -->

@include('components.footer')

<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
</x-navbar>
