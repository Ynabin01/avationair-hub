@extends('layouts.master')

@section('content')
    <style>
        body {
            background-color: white;
        }
    </style>
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
    <!-- Main Content Wrapper Start -->
    <div class="container">
        <br><br> <br>
        <main class="main-content-wrapper">
            <div class="inner-page-content">
                <!-- Services Area Start -->
                <section class="services-area ptb--60">
                    <div class="container">
                        <div class="row">
                            @foreach ($photos as $photo)
                                <div class="col-xl-3 col-lg-4 col-md-6 mb--30">
                                    <iframe width="100%" height="250" src="{{ $photo->link }}" title="YouTube video player"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
                <!-- Services Area End -->
            </div>
            <!-- Normal End -->
            <br>
            {{ $photos->links('vendor.pagination.default copy') }}

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
        </main>
        <br>
        <br>
    </div>
    <!-- Main Content Wrapper End -->

@endsection