<div class="container-xxl py-6" style="background-color: #fff; padding-bottom: 30px;">
    <div class="inside_body">
        <div class="container">
            <div class="responsive-container" style="margin-top: -25px;">
                <br>
                <!-- <div
                    style="text-align: center; font-weight: 700; font-size: 1.5rem; font-family: 'Poppins', sans-serif; margin-bottom: 30px;">
                    {!! $services->long_content !!}
                </div> -->
                <h2 class="mv-section-title">
                    <span class="mission">Prepare  Abroad</span>
                    <span class="vision">for Studying</span>
                    <span class="values">Abroad</span>
                </h2>
            </div>

            <div class="row g-4" style="margin-left: 0px;">
                @foreach ($services->childs->sortByDesc('created_at') as $sub)
                    @if ($loop->iteration > 4)
                        @break
                    @endif
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded mobile-service-width">
                            <div class="border border-dark rounded image-hover" style="padding: 10px; perspective: 1000px;">
                                <!-- Image with hover effect -->
                                <img src="{{$sub->banner_image}}" alt="Service Image" class="mb-3"
                                    style="width: 100%; height: 250px; object-fit: cover; display: block;">
                                <div
                                    style="width: 100%; color: #3D3D3D; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 20px; word-wrap: break-word">
                                    {{$sub->caption}}
                                </div>
                                <div style="font-family: Poppins; color: black; font-size: 14px; text-align: justify;">
                                    {{$sub->short_content}}
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
    /* Prevent unwanted background on hover/focus */
    .image-hover:hover,
    .image-hover:focus,
    .image-hover:active {
        background-color: transparent;
        outline: none;
    }

    /* Image styling */
    .image-hover img {
        width: 100%;
        transition: transform 0.6s ease, box-shadow 0.6s ease;
        transform-origin: top;
        cursor: pointer;
        backface-visibility: hidden;
    }

    /* Hover effect: 3D fold + zoom + shadow */
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
</style>