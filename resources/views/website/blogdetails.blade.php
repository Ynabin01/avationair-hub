@extends("layouts.master")
@section('content')

<!-- Page Header -->
<div class="container-xxl page-header" style="background-image: url('/website/img/bcumb.jpg'); background-size: cover; background-position: center bottom; height: 280px; position: relative;">
    <div class="container h-100 d-flex flex-column justify-content-end pb-4">
        <div class="bread-container text-white d-flex align-items-center gap-2">
            <div>Home</div>
            <div>/</div>
            <div>{{$slug1->caption ?? $slug1}}</div>
        </div>
        <h1 class="text-white mt-2" style="font-weight: 700;">{{$slug2->caption ?? $slug2}}</h1>
    </div>
</div>

<!-- Blog Details -->
@if(isset($slug2->childs))
<div class="container-xxl py-6">
    <div class="container">

        @php $child = $slug2->childs->first(); @endphp

        <!-- Blog Content -->
        <div class="n-content bg-white rounded shadow-sm p-4">
            <h2 class="mb-3">{{$child->caption ?? ""}}</h2>

            <!-- Date and Social Buttons Row -->
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                <div class="text-muted">
                    {{ \Carbon\Carbon::parse($child->updated_at)->format('M d, Y') }}
                </div>
                <div class="d-flex gap-2">
                    <a href="{{$child->fb_link ?? '#'}}" target="_blank" class="social-inline fb"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{$child->twit_link ?? '#'}}" target="_blank" class="social-inline tw"><i class="fab fa-twitter"></i></a>
                    <a href="{{$child->link_link ?? '#'}}" target="_blank" class="social-inline sh"><i class="fas fa-share-alt"></i></a>
                </div>
            </div>

            <!-- Buttons from long_content -->
            <div class="mb-3">
                @php
                    $content = $slug2->long_content;
                    $parts = explode('<br />', $content);
                    $keys = [];
                    $result = [];
                    foreach ($parts as $part) {
                        $pair = explode('=', $part, 2);
                        $keys[] = trim($pair[0]);
                        $result[] = isset($pair[1]) ? trim($pair[1]) : '';
                    }
                @endphp
                @foreach ($keys as $index => $res)
                    <a href="{{$result[$index]}}" class="btn btn-sm btn-outline-primary me-2 mb-2">{{$res}}</a>
                @endforeach
            </div>

            <!-- Main blog image -->
            <img src="{{$child->banner_image ?? '#'}}" class="img-fluid rounded mb-4" alt="Blog Image">

            <!-- Blog description -->
            <div class="description" style="text-align: justify;">
                {!! htmlspecialchars_decode($child->long_content) ?? "" !!}
            </div>
        </div>

        <!-- Related Blogs Redesigned -->
        <div class="mt-5">
            <h3 class="mb-4">Related Posts</h3>
            <div class="row g-4">
                @foreach($slug1->childs->sortByDesc('updated_at') as $group_project)
                    @if($loop->iteration < 5)
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="related-card h-100 shadow-sm rounded overflow-hidden">
                                <div class="related-image-wrapper">
                                    <div class="related-image" style="background-image: url('{{$group_project->banner_image ?? ''}}');"></div>
                                    <div class="overlay">
                                        <a href="/{{$slug1->nav_name}}/{{$group_project->nav_name ?? ''}}" class="overlay-link">Read More <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h5 class="related-title mb-1">{{$group_project->caption ?? ''}}</h5>
                                    <small class="text-muted">{{ \Carbon\Carbon::parse($group_project->updated_at)->format('M d, Y') }}</small>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</div>
@endif

<style>
/* Social Buttons inline with date */
.social-inline {
    width: 36px;
    height: 36px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    color: #fff;
    font-size: 16px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.social-inline.fb { background: #3b5998; }
.social-inline.tw { background: #1da1f2; }
.social-inline.sh { background: #4a4a4a; }
.social-inline:hover {
    transform: scale(1.2);
    box-shadow: 0 4px 10px rgba(0,0,0,0.25);
}

/* Related Posts Cards */
.related-card {
    background: #fff;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    display: flex;
    flex-direction: column;
}
.related-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.15);
}

/* Image Wrapper with Hover Overlay */
.related-image-wrapper {
    position: relative;
    width: 100%;
    padding-top: 60%;
    overflow: hidden;
    border-radius: 6px 6px 0 0;
}
.related-image {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background-size: cover;
    background-position: center;
    transition: transform 0.3s ease;
}
.related-card:hover .related-image {
    transform: scale(1.05);
}
.overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.25);
    opacity: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: opacity 0.3s ease;
}
.related-card:hover .overlay {
    opacity: 1;
}
.overlay-link {
    color: #fff;
    background-color: #CF1312;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-size: 0.85rem;
    text-decoration: none;
    font-weight: 600;
}
.overlay-link i {
    margin-left: 5px;
}

/* Title & Date */
.related-title {
    font-size: 1rem;
    font-weight: 700;
    color: #3D3D3D;
}

/* Buttons */
.btn-outline-primary {
    font-size: 0.85rem;
    padding: 0.25rem 0.5rem;
}

/* Blog Description */
.description p {
    margin-bottom: 1rem;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 8px;
    }
}
</style>
@endsection
