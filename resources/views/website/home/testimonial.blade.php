<!-- <div class="container-fluid bg-primary bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                    @foreach ($testimonial as $test)
                    <div class="testimonial-item text-center text-white">
                        <img class="img-fluid mx-auto rounded-circle mb-4 border border-primary p-2 shadow" src="{{ $test->banner_image ?? '' }}" alt="Testimonial Image" style="width: 150px; height: 150px; background: white;">
                        <p class="fs-5">{!! htmlspecialchars_decode($test->short_content ?? '') !!}</p>
                        <hr class="mx-auto w-25">
                        <h4 class="text-white mb-0">{{ $test->caption ?? '' }}</h4>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-xxl py-6 testo-nichha" style="background-color: #ffff; padding-bottom: -200px;">
    <div class="container test-con" style="margin-top: -110px;">
        <h2 class="mb-5 testi"
            style="color: #212529; font-size: 24px; font-family: Montserrat; font-weight: 500; line-height: 24px; letter-spacing: 2px; font-size: 18px; text-align: center; margin-top: 136px; word-wrap: break-word">
            Testimonial
        </h2>
        <div id="testimonial-carousel" class="carousel slide text-center carousel-dark testi-mon"
            data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($testimonial as $index => $test)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <div class="row align-items-center justify-content-center" style="margin-right: 80px !important;">
                            <div class="col-lg-4 col-md-6 text-center mobile-image-container">
                                <img class="shadow-1-strong mb-4"
                                    src="{!! htmlspecialchars_decode($test->banner_image ?? '') !!}" alt="avatar"
                                    style="width: 150px; height: 150px; border-radius: 50%;">
                            </div>
                            <div class="col-lg-7 col-md-6 test-res" style="margin-top: -90px; margin-left: -90px">
                                <!-- Adjusted margins -->
                                <img class="quotation-icon" loading="lazy" alt="" src="website/img/public/quotation.svg"
                                    style="margin-top: 55px margin-right: 671px;"> <!-- Adjusted margin-top -->
                                <p class="mb-1" style="text-align: justify; margin-top: 10px;">
                                    {!! htmlspecialchars_decode($test->long_content ?? '') !!}</p>
                                <h6 style="text-align: justify; margin-bottom: 0;">
                                    {!! htmlspecialchars_decode($test->caption ?? '') !!}</h6>
                                <!-- Removed bottom margin -->
                                <p style="text-align: justify; margin-bottom: 0;">
                                    {!! htmlspecialchars_decode($test->short_content ?? '') !!}</p>
                                <!-- Removed bottom margin -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div style="margin-top: 20px;"> <!-- Add margin to the carousel control buttons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonial-carousel"
                    data-bs-slide="prev"
                    style="opacity: unset; border-radius: 50%; background-color: transparent; border: 1px solid #CF1312; width: 40px; height: 40px; margin-top: 60px;">
                    <!-- Previous button -->
                    <span class="fas fa-chevron-left" aria-hidden="true"
                        style="background-color: transparent; color: #CF1312; font-size: 24px;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonial-carousel"
                    data-bs-slide="next"
                    style="opacity: unset; border-radius: 50%; background-color: transparent; border: 1px solid #CF1312; width: 40px; height: 40px; margin-top: 60px;">
                    <!-- Next button -->
                    <span class="fas fa-chevron-right" aria-hidden="true"
                        style="background-color: transparent; color: #CF1312; font-size: 24px;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

 
