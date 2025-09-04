<?php
use App\Models\NavigationItems;
?>
<div class="gallery-container" style="margin-bottom: 40px;">
     
     <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
                <h2 class="mv-section-title">
                     <span class="mission">  </span>
                    <span class="vision">Gallery</span>
                    <span class="values">  </span>
                </h2>
            </div> 

    <div class="gallery-grid">
        @foreach ($photos->childs->sortByDesc('updated_at') as $photo)
            @if ($loop->iteration < 5)
                <?php
                $images = NavigationItems::query()->where('navigation_id', $photo->id)->latest()->get();
                        ?>
                <div class="gallery-card">
                    <a href="{{ route('GOTOGALLERY', $photo->nav_name) }}">
                        <div class="image-wrapper">
                            <!-- Transparent Red Ribbon -->
                            <div class="corner-ribbon"></div>

                            <img src="{{ $photo->banner_image }}" alt="{{$photo->caption}}">
                            <div class="overlay">
                                <div class="overlay-content">
                                    <h3>{{$photo->caption}}</h3>
                                    <p>{{count($images)}} Pictures •
                                        {{ \Carbon\Carbon::parse($photo->updated_at)->format('M d, Y') }}</p>
                                </div>
                            </div>
                        </div> 
                    </a>
                </div>
            @endif
        @endforeach
    </div>
</div>

<style>
    /* GRID LAYOUT */
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        max-width: 1000px;
        margin: auto;
        padding: 10px;
    }

    /* CARD */
    .gallery-card {
        perspective: 1000px;
    }

    .image-wrapper {
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s ease, box-shadow 0.5s ease, background-color 0.5s ease;
    }

    /* SQUARE IMAGE WITH SMALLER HEIGHT */
    .image-wrapper img {
        width: 100%;
        height: 160px;
        /* reduced height */
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease, filter 0.5s ease;
    }

    /* HOVER EFFECT */
    .image-wrapper:hover {
        transform: scale(1.03);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        background-color: rgba(255, 0, 0, 0.05);
        /* subtle red highlight */
    }

    /* TRANSPARENT RED CORNER */
    .corner-ribbon {
        position: absolute;
        top: 0;
        left: 0;
        width: 80px;
        height: 80px;
        background: rgba(255, 0, 0, 0.3);
        /* semi-transparent red */
        clip-path: polygon(0 0, 100% 0, 0 100%);
        z-index: 2;
        transform: scale(0.9);
        transition: transform 0.4s ease, background 0.4s ease;
    }

    .image-wrapper:hover .corner-ribbon {
        transform: scale(1.1) rotate(-10deg);
        background: rgba(255, 0, 0, 0.5);
    }

    /* OVERLAY INFO */
    .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent 60%);
        display: flex;
        align-items: flex-end;
        justify-content: center;
        opacity: 0;
        transition: transform 0.5s ease, opacity 0.5s ease;
        transform: translateY(20%);
    }

    .image-wrapper:hover .overlay {
        opacity: 1;
        transform: translateY(0);
    }

    .overlay-content {
        color: #fff;
        /* fully white caption */
        text-align: center;
        padding: 12px;
    }

    .overlay-content h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #fff;
        /* ensure caption is white */
    }

    .overlay-content p {
        font-size: 13px;
        opacity: 0.9;
        margin-top: 4px;
        color: #fff;
        /* ensure details text is white */
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .image-wrapper img {
            height: 160px;
        }
    }

    @media (max-width: 480px) {
        .image-wrapper img {
            height: 140px;
        }
    }
</style>