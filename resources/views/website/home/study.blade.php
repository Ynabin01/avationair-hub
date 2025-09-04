<div class="py-5 abroad-section">
    <div class="container">
        <div class="abroad-container">
            <!-- Section Header -->
            <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
                <h2 class="mv-section-title">
                      <span class="mission">Top Global </span>
                    <span class="vision">Destinations for</span> 
                    <span class="values">Studying Abroad</span>
                </h2>
            </div>

            <!-- Grid of Cards -->
            <div class="abroad-grid">
                @foreach ($abroad as $sub)
                    <a href="{{$sub->icon_image_caption ?? ''}}" class="abroad-card">
                        <img src="{{$sub->banner_image ?? ''}}" alt="{{$sub->caption}}" class="abroad-card-img">
                        <h5 class="abroad-card-title">{{$sub->caption}}</h5>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</div>

<style>
    /* Section */
    .abroad-section {
        background: linear-gradient(135deg, #f9f9f9, #f1f1f1);
        font-family: 'Montserrat', sans-serif;
    }

    .abroad-title {
        margin-bottom: 30px;
        font-weight: 700;
        color: #222;
    }

    /* Grid Layout */
    .abroad-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    /* Cards */
    .abroad-card {
        display: block;
        text-decoration: none;
        background: #fff;
        border-radius: 15px;
        padding: 15px;
        text-align: center;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        color: inherit;
    }

    .abroad-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .abroad-card-img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
        margin-bottom: 10px;
    }

    .abroad-card-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    /* Responsive */
    @media(max-width: 768px) {
        .abroad-card-img {
            height: 140px;
        }

        .abroad-card-title {
            font-size: 1rem;
        }
    }
</style>
