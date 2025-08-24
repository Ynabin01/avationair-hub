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
            <div class="n-content" style="background-color: #white;">
                @if (!empty($normal->main_attachment))
                    <div class="manager-message" style="align-self: center;">
                        <img src="/uploads/main_attachment/{{$normal->main_attachment}}" alt="" class="manager-image"
                            style="width: 150px; height: 150px;border-radius: 50%;border: 2px solid #cf1312;">
                    </div>
                    <br>
                @endif
                <!-- <div class="title">{{ $normal->caption }}</div><br> -->
                @if (!empty($normal->main_attachment))
                    <div class="description" style="text-align-last: center;">@php echo $normal->short_content; @endphp</div>
                @else
                    <div class="description">@php echo $normal->short_content; @endphp</div>
                @endif
                <br>
                <div class="description">@php echo $normal->long_content; @endphp</div>
                @if (!empty($normal->banner_image))
                    <img src="{{ $normal->banner_image }}" class="image" style="width: 100%; height: 60%;">
                    <br>
                @endif
            </div>
        </div>
    </div>



    <!-- Normal End -->
@endsection