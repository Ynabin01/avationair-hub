<div class="container-xxl py-6" style="background-color: #fff; padding-bottom: 30px;">
    <div class="inside_body">
        <div class="container">
            <br>
            <!-- <div class="responsive-container" style="margin-top: -25px;">
                            <br>
                            <h2 class="mv-section-title">
                                <span class="mission"></span>
                                <span class="vision"></span>
                                <span class="values">Abroad</span>
                            </h2>
                        </div> -->
                <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
                    <h2 class="mv-section-title">
                        <span class="mission">Prepare Abroad</span>
                        <span class="vision">for Studying</span>
                        <span class="values">Abroad</span>
                    </h2>
                </div>

            <!-- Centered Row -->
            <div class="row g-4" style="margin-left: 0px; display: flex; justify-content: center; flex-wrap: wrap;">
                @foreach ($services->childs->sortByDesc('created_at') as $sub)
                    @if ($loop->iteration > 4)
                        @break
                    @endif
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="display: flex; justify-content: center;">
                        <div class="service-item rounded mobile-service-width" style="max-width: 100%;">
                            <div class="border border-dark rounded image-hover" style="padding: 10px; perspective: 1000px;">
                                <!-- Image with hover effect -->
                                <img src="{{$sub->banner_image}}" alt="Service Image" class="mb-3"
                                    style="width: 100%; height: 250px; object-fit: cover; display: block;">
                                <div
                                    style="width: 100%; color: #3D3D3D; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 20px; word-wrap: break-word">
                                    {{$sub->caption}}
                                </div>
                                <div style="font-family: Poppins; color: black; font-size: 14px; text-align: justify;">
                                    @php echo $sub->short_content; @endphp
                                </div>
                                <a href="{{$sub->nav_name}}/@if ($child = $sub->childs->first()){{$child->nav_name}} @endif"
                                    style="text-decoration: none;">
                                    <div
                                        style="width: 100%; display: flex; justify-content: flex-start; align-items: center; gap: 8px; margin-top: 10px; cursor: pointer;">
                                        <div
                                            style="color: #391be6; font-size: 14px; font-family: Inter; font-weight: 400; line-height: 14px; word-wrap: break-word;">
                                            Learn More
                                        </div>
                                        <i class="fas fa-arrow-right" style="color: rgba(6, 21, 231, 1);"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div><br><br>
    </div>
</div>

<style>
    /* Image Hover Effects */
    .image-hover img {
        width: 100%;
        transition: transform 0.6s ease, box-shadow 0.6s ease;
        transform-origin: top;
        cursor: pointer;
        backface-visibility: hidden;
    }

    .image-hover:hover img {
        transform: rotateX(20deg) scale(1.05);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
    }

    /* Optional: subtle zoom for the whole card */
    .service-item {
        transition: transform 0.3s ease;
    }

    .service-item:hover {
        transform: scale(1.02);
    }

    /* Prevent unwanted background on hover/focus */
    .image-hover:hover,
    .image-hover:focus,
    .image-hover:active {
        background-color: transparent;
        outline: none;
    }
</style>