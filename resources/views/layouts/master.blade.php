@php
    $normal_gallary_notice = App\Models\Navigation::query()
        ->where('nav_category', 'Main')
        ->where('page_type', 'Normal')
        ->orderBy('position', 'ASC')
        ->get();

    $menus = App\Models\Navigation::query()
        ->where('nav_category', 'Main')
        ->where('page_type', '!=', 'Job')
        ->where('page_type', '!=', 'Notice')
        ->where('parent_page_id', 0)
        ->where('page_status', '1')
        ->orderBy('position', 'ASC')
        ->get();

    $global_setting = App\Models\GlobalSetting::first();
    if (isset($normal)) {
        $seo = $normal;
    } elseif (isset($job)) {
        $seo = $job;
    }
@endphp


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Education Air Hub Nepal Pvt. Ltd.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="{{ $seo->meta_keywords ?? '' }}">
    <meta name="description" content="{{ $seo->meta_description ?? '' }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('website/img/favicon.ico') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&family=Montserrat&family=Poppins&display=swap"
        rel="stylesheet">

    <!-- Font Awesome (latest only, keep v6) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('website/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Theme Stylesheet -->
    <link id="theme-style" rel="stylesheet" href="{{ asset('website/assets/css/theme-1.css') }}">

    <!-- Bootstrap Stylesheet -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
</head>


<body>
    <!-- Top Bar -->
    <div class="container-fluid bg-dark text-light py-2">
        <div class="container">
            <div class="row align-items-center">

                <!-- Left: Email + Phone (Hidden on mobile/tablet) -->
                <div class="col-lg-6 d-none d-lg-flex align-items-center gap-4">
                    <span class="d-flex align-items-center small text-light">
                        <i class="fas fa-envelope me-2 text-warning"></i>
                        <a href="mailto:{{ $global_setting->site_email }}" class="text-light text-decoration-none">
                            {{ $global_setting->site_email }}
                        </a>
                    </span>
                    <span class="d-flex align-items-center small text-light">
                        <i class="fas fa-phone-alt me-2 text-success"></i>
                        <a href="tel:{{ $global_setting->phone }}" class="text-light text-decoration-none">
                            {{ $global_setting->phone }}
                        </a>
                    </span>
                </div>

                <!-- Right: Social Icons (Always Visible) -->
                <div class="col-12 col-lg-6 d-flex justify-content-center justify-content-lg-end gap-2 mt-2 mt-lg-0">
                    <a href="{{ $global_setting->facebook ?? '#' }}" target="_blank"
                        class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; background:#3b5998; color:white; transition:.3s;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="{{ $global_setting->twitter ?? '#' }}" target="_blank"
                        class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; background:#1da1f2; color:white; transition:.3s;">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ $global_setting->linkedin ?? '#' }}" target="_blank"
                        class="rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px; background:#e4405f; color:white; transition:.3s;">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!--  end .container -->
    <!-- Navbar & Hero Start -->
    <!-- Navbar Start -->
    <div class="container-xxl position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-0 upri-navbar"
            style="background-color: rgba(18, 62, 207, 1); height:git init
 60px;">

            <!-- Logo -->
            <a href="/" class="image-hder navbar-brand d-flex justify-content-center align-items-center p-0"
                style="height: 100%; width: 160px; margin-left: 60px;">
                <img src="/uploads/icons/{{ $global_setting->site_logo }}" alt="Logo" style="width: 100%;">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" id="mobileMenuToggle">
                <span class="fa fa-bars text-white"></span>
            </button>

            <!-- Desktop Menu -->
            <div class="collapse navbar-collapse nav-border-small" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0" style="width: 100%; padding:15px; margin-bottom: 10px;">
                    <a href="/" class="nav-item nav-link active">Home</a>

                    @foreach ($menus as $menu)
                        <div class="nav-item @if ($menu->childs->count() > 0) dropdown @endif">
                            <a href="@if($menu->nav_name == 'aboutus' || $menu->nav_name == 'notice' || $menu->nav_name == 'gallery') # 
                            @elseif ($menu->nav_name == 'blog') /{{ $menu->nav_name }}?content=blogs 
                                    @else /{{ $menu->nav_name }} @endif"
                                class="nav-link @if ($menu->childs->count() > 0 && !in_array($menu->id, ['2752', '2751', '2756'])) dropdown-toggle @endif"
                                @if ($menu->childs->count() > 0 && !in_array($menu->id, ['2752', '2751', '2756']))
                                data-bs-toggle="dropdown" role="button" aria-expanded="false" @endif>
                                {{ $menu->caption }}
                            </a>

                            @if ($menu->childs->count() > 0 && !in_array($menu->id, ['2415', '2537', '2752', '2751', '2756']))
                                <div class="dropdown-menu m-0">
                                    @if ($menu->id != '2753')
                                        @foreach ($menu->childs as $sub)
                                            <a href="/{{ $menu->nav_name }}/{{ $sub->nav_name }}"
                                                class="dropdown-item">{{ $sub->caption }}</a>
                                        @endforeach
                                    @else
                                        @php $subpage = $menu->childs->first() @endphp
                                        @foreach ($subpage->childs as $sub)
                                            <a href="/{{ $menu->nav_name }}/{{ $sub->nav_name }}"
                                                class="dropdown-item">{{ $sub->caption }}</a>
                                        @endforeach
                                    @endif
                                </div>
                            @endif
                        </div>
                    @endforeach

                    <a href="/contact" class="nav-item nav-link">Contact</a>
                </div>
            </div>
        </nav>

        <!-- Mobile Overlay Menu -->
        <div id="mobileMenuOverlay">
            <span id="mobileMenuClose" class="fa fa-times" style="margin-right: 40px !important;"></span>
            <div class="navbar-nav flex-column mobile-menu-body">
                <a href="/" class="mobile-nav-link">Home</a>

                @foreach ($menus as $menu)
                    <div class="mobile-nav-item">
                        <a href="@if($menu->nav_name == 'aboutus' || $menu->nav_name == 'notice' || $menu->nav_name == 'gallery') # 
                         @elseif ($menu->nav_name == 'blog') /{{ $menu->nav_name }}?content=blogs 
                                 @else /{{ $menu->nav_name }} @endif" class="mobile-nav-link">{{ $menu->caption }}</a>

                        @if ($menu->childs->count() > 0 && !in_array($menu->id, ['2415', '2537', '2752', '2751', '2756']))
                            <div class="mobile-submenu">
                                @if ($menu->id != '2753')
                                    @foreach ($menu->childs as $sub)
                                        <a href="/{{ $menu->nav_name }}/{{ $sub->nav_name }}"
                                            class="mobile-submenu-link">{{ $sub->caption }}</a>
                                    @endforeach
                                @else
                                    @php $subpage = $menu->childs->first() @endphp
                                    @foreach ($subpage->childs as $sub)
                                        <a href="/{{ $menu->nav_name }}/{{ $sub->nav_name }}"
                                            class="mobile-submenu-link">{{ $sub->caption }}</a>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach

                <a href="/contact" class="mobile-nav-link">Contact</a>
            </div>
        </div>
    </div>

    <style>
        /* Desktop nav stays as it is */
        .navbar-nav .nav-link {
            font-weight: 700 !important;
            color: black;
            transition: color 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: red;
        }

        /* Mobile overlay menu */
        #mobileMenuOverlay {
            position: fixed;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background-color: rgba(18, 62, 207, 0.97);
            z-index: 9999;
            transition: left 0.35s ease;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            padding: 70px 20px 30px;
        }

        #mobileMenuOverlay.active {
            left: 0;
            animation: slideIn 0.35s ease;
        }

        @keyframes slideIn {
            from {
                left: -100%;
            }

            to {
                left: 0;
            }
        }

        /* Close button hidden by default */
        #mobileMenuClose {
            position: fixed;
            top: 20px;
            right: 20px;
            font-size: 32px;
            color: #fff;
            cursor: pointer;
            z-index: 10000;
            display: none;
            /* hidden by default */
        }

        /* Menu body */
        .mobile-menu-body {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Main links */
        .mobile-nav-link {
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            text-decoration: none;
            padding: 10px 0;
            transition: color 0.3s;
        }

        .mobile-nav-link:hover {
            color: red;
        }

        /* Submenu */
        .mobile-submenu {
            padding-left: 18px;
            margin-top: 5px;
            display: none;
            /* hidden by default */
            flex-direction: column;
            gap: 8px;
        }

        .mobile-submenu.active {
            display: flex;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .mobile-submenu-link {
            font-size: 16px;
            color: #eaeaea;
            text-decoration: none;
            transition: color 0.3s;
        }

        .mobile-submenu-link:hover {
            color: red;
        }

        @media (max-width: 991px) {
            #navbarCollapse {
                display: none !important;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleBtn = document.getElementById('mobileMenuToggle');
            const overlay = document.getElementById('mobileMenuOverlay');
            const closeBtn = document.getElementById('mobileMenuClose');

            // Open overlay
            toggleBtn.addEventListener('click', () => {
                overlay.classList.add('active');
                closeBtn.style.display = 'block';
            });

            // Close overlay
            closeBtn.addEventListener('click', () => {
                overlay.classList.remove('active');
                closeBtn.style.display = 'none';
            });

            // Click outside to close
            overlay.addEventListener('click', e => {
                if (e.target === overlay) {
                    overlay.classList.remove('active');
                    closeBtn.style.display = 'none';
                }
            });

            // Dropdown toggle for mobile menu
            document.querySelectorAll('.mobile-nav-item > .mobile-nav-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    const submenu = this.nextElementSibling;
                    if (submenu && submenu.classList.contains('mobile-submenu')) {
                        e.preventDefault(); // prevent navigation
                        submenu.classList.toggle('active');
                    }
                });
            });
        });
    </script>


    @yield('content')

    <!-- banner start  -->
    <!-- about us start  -->
    <!-- Service Start -->
    <!-- Start Study Abroad -->
    <!-- Testimonial Start -->
    <!-- Gallery Start -->
    <!-- Client Section -->
    <!-- Blog Start -->


    <!-- Footer Start -->

    <div class="container-fluid bg-light pt-5 pb-4">
        <div class="container">
            <div class="row text-center text-md-start g-4">

                <!-- Logo & Description -->
                <div class="col-md-6 col-lg-4">
                    <img src="/uploads/icons/{{ $global_setting->site_logo }}" alt="Logo" class="img-fluid mb-3"
                        style="height: 120px; width: 100%;">
                    <p class="footer-text">
                        {{ $global_setting->site_description ?? 'We provide quality education consultancy services.' }}
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="mb-3" style="font-weight: 600;">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="/about-one/about-us-one">About Us</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="/gallery/photo-gallery-one">Photo Gallery</a></li>
                        <li><a href="/blog?content=blogs">Blog</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

                <!-- Get Connect -->
                <div class="col-md-6 col-lg-3">
                    <h5 class="mb-3" style="font-weight: 600;">Get Connect</h5>
                    <ul class="list-unstyled footer-text">
                        <li><strong>Email:</strong> <a href="mailto:{{ $global_setting->contact_email }}"
                                class="text-dark">{{ $global_setting->contact_email ?? 'info@example.com' }}</a></li>
                        <li><strong>Phone:</strong> <a href="tel:{{ $global_setting->contact_phone }}"
                                class="text-dark">{{ $global_setting->contact_phone ?? '+977 123456789' }}</a></li>
                        <li><strong>Address:</strong> {{ $global_setting->address ?? 'Putalisadak, Kathmandu, Nepal' }}
                        </li>
                        <li class="mt-2 footer-social">
                            <a href="{{ $global_setting->facebook ?? '#' }}" target="_blank">Facebook</a>
                            <a href="{{ $global_setting->twitter ?? '#' }}" target="_blank">Twitter</a>
                            <a href="{{ $global_setting->instagram ?? '#' }}" target="_blank">Instagram</a>
                        </li>
                    </ul>
                </div>

                <!-- Map -->
                <div class="col-md-6 col-lg-2">

                    <h5 class="mb-3" style="font-weight: 600;">Location</h5>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44668.46432989629!2d85.28493276485202!3d27.70903024219139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e1!3m2!1sen!2snp!4v1755687932394!5m2!1sen!2snp"
                        width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>


        </div>
    </div>

    <div class="container-fluid bg-dark text-light d-footer pt-3 wow fadeIn" data-wow-delay="0.1s">

        <div class="text-center mt-4" style="font-size: 14px; font-weight: 500; color: #fff;     margin-bottom: 40px;">
            &copy; {{ date('Y') }} {{ $global_setting->site_name ?? 'Your Site' }}. All Rights Reserved.
        </div>

    </div>

    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/website/lib/wow/wow.min.js"></script>
    <script src="/website/lib/easing/easing.min.js"></script>
    <script src="/website/lib/waypoints/waypoints.min.js"></script>
    <script src="/website/lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Template Javascript -->
    <script src="/website/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <!-- Bootstrap JS (needed for toggler & dropdowns) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS to fix dropdown click on mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dropdowns = document.querySelectorAll('.navbar-collapse .dropdown-toggle');

            dropdowns.forEach(function (dropdown) {
                dropdown.addEventListener('click', function (e) {
                    if (window.innerWidth < 992) { // mobile only
                        e.preventDefault();
                        var parent = this.parentElement;
                        parent.classList.toggle('show');
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const questions = document.querySelectorAll('.question');

            questions.forEach(function (question) {
                question.addEventListener('click', function () {
                    const answer = this.nextElementSibling;
                    if (answer.style.display === 'block') {
                        answer.style.display = 'none';
                        this.querySelector('.arrow').textContent = '\u25BC'; // Unicode for down arrow
                    } else {
                        answer.style.display = 'block';
                        this.querySelector('.arrow').textContent = '\u25B2'; // Unicode for up arrow
                    }
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            const tabs = document.querySelectorAll('.dd');

            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    tabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>`

    <script>
        $(document).ready(function () {
            var owl = $(".client-carousel");
            owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                nav: false,
                dots: false,
                responsive: {
                    0: { items: 1 },
                    480: { items: 2 },
                    768: { items: 3 },
                    992: { items: 4 }
                }
            });

            // Custom Next/Prev buttons
            $("#next").click(function () {
                owl.trigger('next.owl.carousel', [300]);
            });
            $("#prev").click(function () {
                owl.trigger('prev.owl.carousel', [300]);
            });
        });
    </script>


    <style>
        .gallery-indicator-item.disable:hover {
            cursor: unset;
            background-color: unset;
        }
    </style>

</body>

</html>