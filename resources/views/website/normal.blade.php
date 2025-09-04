@extends("layouts.master")

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
    <!-- breadcrumb start -->

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
            <div class="b-title">{{$slug2->caption ?? $slug2}}</div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- Normal Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="n-content" style="background-color: #fff;">

                {{-- Short content --}}
                @if (!empty($normal->main_attachment))
                    <div class="description" style="text-align-last: center;">
                        @php echo $normal->short_content; @endphp
                    </div>
                @else
                    <div class="description">
                        @php echo $normal->short_content; @endphp
                    </div>
                @endif
                <br>

                {{-- Long content with conditional image --}}
                <div class="description {{ empty($normal->main_attachment) ? 'full-width' : '' }}"
                    style="overflow: hidden;">
                    @if (!empty($normal->main_attachment))
                        <img src="/uploads/main_attachment/{{$normal->main_attachment}}" alt="Additional Image"
                            class="animated-img img-right"
                            style="max-width:300px; height:auto; float:right; margin:0 0 10px 20px;">
                    @endif
                    @php echo $normal->long_content; @endphp
                </div>
                <br>

                {{-- Banner image --}}
                @if (!empty($normal->banner_image))
                    <img src="{{ $normal->banner_image }}" class="image animated-img img-bottom"
                        style="width: 100%; height: auto;">
                    <br>
                @endif
            </div>
        </div>
    </div>

@endsection

<style>
    .description.full-width {
        width: 100%;
    }

    /* Make image responsive on smaller devices */
    @media (max-width: 768px) {
        .description img.img-right {
            float: none;
            display: block;
            margin: 0 auto 15px auto;
            max-width: 100%;
        }
    }

    /* Enhanced animations */
    .animated-img {
        opacity: 0;
        transform: translateY(50px) scale(0.8) rotate(-5deg);
        animation: fadeSlideRotate 1s forwards;
        animation-timing-function: ease-out;
    }

    /* Staggered delays */
    .img-top {
        animation-delay: 0.2s;
    }

    .img-right {
        width: 250px;
        /* increased width */
        height: 250px;
        /* increased height */
        float: right;
        margin: 0 0 15px 25px;
        object-fit: cover;
        animation-delay: 0.5s;
    }

    .img-bottom {
        animation-delay: 0.8s;
    }

    /* Responsive adjustments */
    @media (max-width: 992px) {
        .img-right {
            width: 200px;
            height: 200px;
        }
    }

    @media (max-width: 768px) {
        .img-right {
            float: none;
            display: block;
            width: 100%;
            height: auto;
            margin: 0 0 10px 0;
        }
    }

    /* Keyframes: fade + slide up + zoom + rotation */
    @keyframes fadeSlideRotate {
        0% {
            opacity: 0;
            transform: translateY(50px) scale(0.8) rotate(-5deg);
        }

        60% {
            opacity: 1;
            transform: translateY(-10px) scale(1.05) rotate(2deg);
        }

        100% {
            opacity: 1;
            transform: translateY(0) scale(1) rotate(0deg);
        }
    }
</style>