@extends("layouts.master")
@section('content')
    <style>
        body {
            background-color: white;
        }

        /* Unique Gallery Styles */
        .custom-gallery-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .custom-gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* 4 per row */
            gap: 25px;
        }

        .custom-gallery-card {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .custom-gallery-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.15);
        }

        .custom-gallery-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
        }

        .custom-gallery-info {
            padding: 14px 16px;
            background: #fff;
        }

        /* Caption Title */
        .custom-gallery-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #1a1a1a;
            position: relative;
            display: inline-block;
        }

        /* Accent underline */
        .custom-gallery-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -4px;
            width: 40%;
            height: 3px;
            background: linear-gradient(90deg, #391be6, #6c63ff);
            border-radius: 2px;
        }

        .custom-gallery-details {
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            color: #777;
        }

        .custom-gallery-details .separator {
            margin: 0 8px;
            color: #aaa;
        }

        /* Responsive - 2 per row on tablets */
        @media (max-width: 992px) {
            .custom-gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Responsive - 1 per row on mobile */
        @media (max-width: 576px) {
            .custom-gallery-grid {
                grid-template-columns: 1fr;
            }

            .custom-gallery-card img {
                height: 200px;
            }
        }
    </style>

    <?php
    use App\Models\NavigationItems;
    ?>
    <div class="container-xxl bg-primary page-header" style="background-image: url('/website/img/bcumb.jpg'); 
                   background-size: cover; 
                   background-position: center bottom;
                   height: 250px;">
        <div class="container nichha">
            <div class="bread-container bread-auto">
                <div>Home</div>
                <div class="divider"> / </div>
                <div>{{ $slug1->caption ?? $slug1 }} </div>
            </div>
            <div class="b-title">{{ $slug2->caption ?? $slug2 }}</div>
        </div>
    </div>

    <!-- Gallery Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="custom-gallery-wrapper">
                <div class="custom-gallery-grid">
                    @foreach ($photos as $photo)
                        <?php
                        $images = NavigationItems::query()->where('navigation_id', $photo->id)->latest()->get();
                        ?>
                        <div class="custom-gallery-card">
                            <a href="{{ route('GOTOGALLERY', $photo->nav_name) }}">
                                <img src="{{ $photo->banner_image }}" alt="">
                                <div class="custom-gallery-info">
                                    <div class="custom-gallery-title">{{ $photo->caption }}</div>
                                    <div class="custom-gallery-details">
                                        <div class="info-item">{{ count($images) }} Pictures</div>
                                        <div class="separator">•</div>
                                        <div class="info-item">{{ \Carbon\Carbon::parse($photo->updated_at)->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Pagination -->
    {{ $photos->links('vendor.pagination.default copy') }}
@endsection
