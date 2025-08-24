@extends("layouts.master")
@section('content')


    <div class="container-xxl bg-primary page-header" style="background-image: url('/website/img/bcumb.jpg'); 
                           background-size: cover; 
                           background-position: center bottom;  /* move image focus to top */
                           height: 250px;"> <!-- optional: adjust height -->
        <div class="container nichha">
            <div class="bread-container bread-auto">
                <div>Home</div>
                <div class="divider"> / </div>
                <div>{{$slug1->caption ?? $slug1 }} </div>
            </div>
            <div class="b-title">{{$slug1->caption ?? $slug1}}</div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <div class="container-xxl py-6" style="background-color: #fff;">
        <nr>
            <br>
        </nr>
        <div class="inside_body">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    @foreach ($services->sortByDesc('created_at') as $sub)
                        <div class="col-lg-3 col-md-6 col-sm-10" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="service-item p-3">
                                <img src="{{ $sub->banner_image }}" alt="Service Image" class="service-img mb-2">
                                <div class="service-caption">{{ $sub->caption }}</div>
                                <div class="service-desc">{{ $sub->short_content }}</div>
                                <a href="{{ $sub->nav_name }}/@if ($child = $sub->childs->first()){{ $child->nav_name }} @endif"
                                    style="text-decoration: none;">
                                    <div class="learn-more">
                                        <span>Learn More</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <style>
        body {
            background-color: white;
        }

        /* Service Card Styling */
        .service-item {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            text-align: center;
            /* Center content for small screens */
        }

        .service-item:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .service-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .service-caption {
            color: #3D3D3D;
            font-size: 18px;
            font-family: Montserrat, sans-serif;
            font-weight: 700;
            line-height: 24px;
            margin-top: 10px;
        }

        .service-desc {
            font-family: Poppins, sans-serif;
            color: #444;
            font-size: 14px;
            text-align: justify;
            margin-top: 8px;
            flex-grow: 1;
        }

        .learn-more {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 15px;
            cursor: pointer;
            color: #CF1312;
            font-size: 14px;
            font-family: Inter, sans-serif;
            font-weight: 500;
            transition: 0.3s;
        }

        .learn-more:hover {
            gap: 15px;
            color: #a50f0e;
        }

        /* Responsive Fixes */
        @media (max-width: 992px) {
            .service-img {
                height: 160px;
            }
        }

        @media (max-width: 768px) {
            .service-item {
                text-align: center;
                margin: auto;
            }

            .service-desc {
                text-align: center;
                /* Better readability in small screens */
            }

            .learn-more {
                justify-content: center;
                /* Center button on mobile */
            }
        }

        @media (max-width: 576px) {
            .service-img {
                height: 150px;
                /* Smaller image for mobile */
            }
        }
    </style>
    <!-- Pagination -->
    <div class="container my-4 text-center">
        {{ $services->links('vendor.pagination.default copy') }}
    </div>

    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
@endsection