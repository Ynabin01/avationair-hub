@if(isset($banners) && count($banners) > 0)
    <div id="fullBannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-inner">
            @foreach($banners as $key => $banner)
                <div class="carousel-item @if($key == 0) active @endif">

                    <!-- Full screen media -->
                    @if($banner->video_url || $banner->main_attachment)
                        <video autoplay muted loop playsinline class="d-block w-100 carousel-media">
                            <source src="{{ $banner->video_url ?? '/uploads/main_attachment/' . $banner->main_attachment }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @elseif($banner->banner_image)
                        <img src="{{ $banner->banner_image }}" class="d-block w-100 carousel-media" alt="Banner Image">
                    @endif

                    <!-- Overlay content centered -->
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center text-center h-100 px-3">
                        <h1 class="banner-title">
                            {!! htmlspecialchars_decode($banner->caption ?? '') !!}
                        </h1>
                        <h2 class="banner-short-content mt-2">
                            {!! htmlspecialchars_decode($banner->short_content ?? '') !!}
                        </h2>
                        <h2 class="banner-long-content mt-3">
                            {!! htmlspecialchars_decode($banner->long_content ?? '') !!}
                        </h2>

                        <a href="/about-one/about-us-one" class="banner-btn">
                            Explore More <span style="margin-left:6px;">&rarr;</span>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#fullBannerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#fullBannerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($banners as $key => $banner)
                <button type="button" data-bs-target="#fullBannerCarousel" data-bs-slide-to="{{ $key }}"
                    class="@if($key == 0) active @endif" aria-current="@if($key == 0) true @endif"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>
    </div>

    <!-- CSS animations & responsive -->
    <style>
        .carousel-item {
            position: relative;
            height: 100vh;
            min-height: 500px;
        }

        .carousel-media {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Overlay text styling */
        .banner-title {
            color: #e63946;
            font-family: Montserrat, sans-serif;
            font-size: 3rem;
            font-weight: 700;
            animation: fadeInDown 1s;
        }

        .banner-short-content {
            color: #000;
            font-family: Poppins, sans-serif;
            font-size: 2rem;
            font-weight: 600;
            animation: fadeInDown 1.2s;
        }

        .banner-long-content {
            color: #fff;
            font-family: Poppins, sans-serif;
            font-size: 1.2rem;
            font-weight: 500;
            max-width: 800px; /* limits width on large screens */
            width: 100%; /* full width on small screens */
            margin: 0 auto; /* center horizontally */
            word-wrap: break-word; /* wrap long words */
            animation: fadeInUp 1.5s;
        }

        .banner-btn {
            background: linear-gradient(90deg,#e63946,#ff6b6b);
            border: none;
            color: #fff;
            font-weight: 600;
            border-radius: 40px;
            padding: 8px 20px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            animation: fadeInUp 1.8s;
            margin-top: 20px;
        }

        /* Animations */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .banner-title { font-size: 2.5rem; }
            .banner-short-content { font-size: 1.8rem; }
            .banner-long-content { font-size: 1.1rem; }
        }

        @media (max-width: 992px) {
            .banner-title { font-size: 2rem; }
            .banner-short-content { font-size: 1.5rem; }
            .banner-long-content { font-size: 1rem; }
        }

        @media (max-width: 768px) {
            .banner-title { font-size: 1.5rem; }
            .banner-short-content { font-size: 1.2rem; }
            .banner-long-content { font-size: 0.9rem; padding: 0 10px; }
        }

        @media (max-width: 576px) {
            .banner-title { font-size: 1.2rem; }
            .banner-short-content { font-size: 1rem; }
            .banner-long-content { font-size: 0.8rem; padding: 0 5px; }
            .carousel-caption { padding: 0 1rem; }
        }
    </style>
@endif
