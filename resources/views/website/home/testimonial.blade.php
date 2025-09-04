<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Testimonial Section -->
<div class="container-xxl py-6" style="background-color: #f8f9fa; ">
    <div class="container text-center">

        <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
            <h2 class="mv-section-title">
                <span class="mission">What Our</span>
                <span class="vision">Clients </span>
                <span class="values">Says</span>
            </h2>
        </div>
        <!-- Swiper -->
        <div class="swiper testimonial-swiper">
            <div class="swiper-wrapper">
                @foreach ($testimonial as $test)
                    <div class="swiper-slide">
                        <div class="testimonial-card p-4 bg-white rounded shadow-sm h-100">
                            <div class="avatar-wrapper mx-auto mb-3">
                                <img src="{{ $test->banner_image ?? '' }}" alt="Avatar" class="testimonial-avatar">
                            </div>
                            <p class="testimonial-text mb-2">{!! htmlspecialchars_decode($test->long_content ?? '') !!}</p>
                            <h5 class="testimonial-name mb-1">{!! htmlspecialchars_decode($test->caption ?? '') !!}</h5>
                            <p class="testimonial-short">{!! htmlspecialchars_decode($test->short_content ?? '') !!}</p>
                        </div>
                    </div>
                @endforeach
            </div><br><br>
        </div>
    </div>
</div>

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    const swiper = new Swiper('.testimonial-swiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        loop: true,
        speed: 3000, // duration of slide transition (ms)
        autoplay: {
            delay: 0, // no delay, continuous movement
            disableOnInteraction: false,
        },
        freeMode: true, // enables smooth continuous sliding
        freeModeMomentum: false,
        breakpoints: {
            0: { slidesPerView: 1, spaceBetween: 15 },
            768: { slidesPerView: 2, spaceBetween: 20 },
            992: { slidesPerView: 3, spaceBetween: 30 },
        },
    });
</script>

<style>
    /* Testimonial Card */
    .testimonial-card {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
    }

    /* Avatar */
    .avatar-wrapper {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        margin-bottom: 15px;
        border: 3px solid #CF1312;
    }

    .testimonial-avatar {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Text */
    .testimonial-text {
        font-size: 15px;
        color: #555;
        line-height: 1.6;
    }

    .testimonial-name {
        font-weight: 600;
        color: #CF1312;
    }

    .testimonial-short {
        font-size: 13px;
        color: #777;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .testimonial-card {
            padding: 2rem 1rem;
        }

        .avatar-wrapper {
            width: 80px;
            height: 80px;
        }

        .testimonial-text {
            font-size: 14px;
        }
    }
</style>