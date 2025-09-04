<!-- Partner Section -->
<div class="py-5 abroad-section" style="
    /* margin-top: -51px; */
    margin-bottom: -108px !important;
">
    <div class="container-xxl bg-primary my-6 py-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 0;">
        <div class="col-12 mb-5 text-center" data-aos="fade-up" data-aos-duration="1200">
            <h2 class="mv-section-title">
                <span class="mission">Our</span>
                <span class="vision">Partners</span>
            </h2>
        </div>

        <div class="container">
            <div class="owl-carousel client-carousel" style="display: flex; justify-content: center; gap: 30px;">
                @if (isset($partners))
                    @foreach ($partners as $partner)
                        <div class="item text-center">
                            <a href="#">
                                <img class="img-fluid" src="{{ $partner->banner_image }}"
                                    style="height: 60px; width: 200px; object-fit: contain;" alt="Partner">
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Owl Carousel CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function () {
        $('.client-carousel').owlCarousel({
            loop: true,               // infinite loop
            margin: 30,
            autoplay: true,           // enable autoplay
            autoplayTimeout: 2000,    // 2 seconds per slide
            autoplayHoverPause: false, // do NOT pause on hover
            smartSpeed: 1000,          // slide transition speed
            responsive: {
                0: { items: 1 },
                576: { items: 2 },
                768: { items: 3 },
                992: { items: 4 }
            }
        });
    });
</script>