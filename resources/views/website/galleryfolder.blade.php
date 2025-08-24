@extends("layouts.master")
@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <?php
    use App\Models\NavigationItems;
    ?>
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
            <div class="b-title">{{$slug2->caption ?? $slug2 }}</div>
        </div>
    </div>

    <!-- breadcrumb end -->


    <!-- Navbar & Hero End -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="gallery-container">
                <div class="gallery-items">
                    @foreach ($photos as $photo)
                                    <?php
                        $images = NavigationItems::query()->where('navigation_id', $photo->id)->latest()->get();
                                    ?>
                                    <div class="gallery-item">
                                        <a href="{{ route('GOTOGALLERY', $photo->nav_name) }}">
                                            <img src="{{ $photo->banner_image }}" alt="">
                                            <div class="info">
                                                <div class="g-title">{{ $photo->caption }}</div>
                                                <div class="details">
                                                    <!-- Assuming these details are available in your $photo object -->
                                                    <!-- Replace with actual details from your data -->
                                                    <div class="info-item">{{count($images)}} Pictures</div>
                                                    <div class="separator">•</div>
                                                    <div class="info-item">{{ \Carbon\Carbon::parse($photo->updated_at)->format('M d, Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                    @endforeach
                    <!-- End repeat -->
                    <!-- Add more gallery items here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Normal Start -->
    {{ $photos->links('vendor.pagination.default copy') }}

    <!-- Normal End -->
    {{-- <div class="gallery-indicator" style="  display: flex; justify-content: center; align-items: center;">
        <div class="gallery-indicator-item">
            <i class="gallery-chevron fas fa-chevron-left"></i>
        </div>
        <div class="gallery-indicator-item active">
            <div class="gallery-indicator-number">1</div>
        </div>
        <div class="gallery-indicator-item">
            <div class="gallery-indicator-number">2</div>
        </div>
        <div class="gallery-indicator-item">
            <div class="gallery-indicator-number">...</div>
        </div>
        <div class="gallery-indicator-item">
            <div class="gallery-indicator-number">10</div>
        </div>
        <div class="gallery-indicator-item">
            <i class="gallery-chevron fas fa-chevron-right"></i>
        </div>
    </div> --}}

@endsection