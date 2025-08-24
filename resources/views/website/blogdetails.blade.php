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
            <div class="b-title">{{$slug2->caption ?? $slug2 }}</div>
        </div>
    </div>

    <!-- breadcrumb end -->

    <!--  blog-details Start -->
    @if (isset($slug2->childs))
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row share-btns">

                    <div class="col-md-12 col-lg-10">
                        <div class="n-content" style="background-color: #F3F6F8;">
                            <div class="media-body">
                                <h4>
                                    {{$slug2->childs->first()->caption ?? ""}}
                                </h4>
                                <div class="small-button-blog-b">
                                    <div class="meta mb-1"><span
                                            class="date">{{ \Carbon\Carbon::parse($slug2->childs->first()->updated_at)->format('M d, Y') }}</span>
                                    </div>
                                    <?php
            $content = $slug2->long_content;
            $parts = explode('<br />', $content);
            $keys = [];
            $result = [];
            foreach ($parts as $part) {
                // Split each part by ":" to separate the key and value
                $pair = explode('=', $part, 2);

                // Trim whitespace from the key and value
                $keys[] = trim($pair[0]);
                $value = isset($pair[1]) ? trim($pair[1]) : '';
                $result[] = $value;
            }
            // print_r($keys); // Uncomment to check if keys are parsed correctly
                                            ?>
                                    @foreach ($keys as $index => $res)
                                        <a href="{{$result[$index]}}">
                                            <div class="button">{{$res}}</div>
                                        </a>
                                    @endforeach

                                </div>
                            </div><br>

                            <img src=" {{$slug2->childs->first()->banner_image ?? "#"}}" class="image"
                                style="width: 100%; height: auto;">
                            <br>
                            <div class="description" style="text-align: justify;">
                                {!! htmlspecialchars_decode($slug2->childs->first()->long_content) ?? "" !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-0 col-lg-2" style=" margin-top: 25px;">
                        <div class="social-icons">
                            <a href="{{$slug2->childs->first()->fb_link ?? ""}}" target="_blank">
                                <div class="icon-container">
                                    <div class="outer-circle"></div>
                                    <div class="inner-circle">
                                        <i class="fab fa-facebook-f icon"></i>
                                        <div class="background-circle"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{$slug2->childs->first()->twit_link ?? ""}}" target="_blank">
                                <div class="icon-container">
                                    <div class="outer-circle"></div>
                                    <div class="inner-circle">
                                        <i class="fab fa-twitter icon"></i>
                                        <div class="background-circle"></div>
                                    </div>
                                </div>
                            </a>
                            <a href="{{$slug2->childs->first()->link_link ?? ""}}" target="_blank">
                                <div class="icon-container">
                                    <div class="outer-circle"></div>
                                    <div class="inner-circle">
                                        <i class="fas fa-share-alt icon"></i>
                                        <div class="background-circle"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="n-content" style="background-color: #F3F6F8;">
                            <div class="blog-details-container">
                                @foreach ($slug1->childs->sortByDesc('updated_at') as $group_project)
                                    @if ($loop->iteration < 5)
                                        <div class="blog-details-item">
                                            <img class="blog-details-image" src="{{$group_project->banner_image ?? ""}}" />
                                            <div class="blog-details-content">
                                                <div class="blog-details-title">{{$group_project->caption ?? ""}}</div>
                                                <div class="blog-details-read-more">
                                                    <a href="/{{$slug1->nav_name}}/{{$group_project->nav_name ?? ""}}">
                                                        <div class="blog-details-read-more-link">Read More</div>
                                                    </a>
                                                    <i class="fas fa-arrow-right"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($loop->iteration == 2)
                                            </div><br>
                                            <div class="blog-details-container">
                                        @endif
                                        @if ($loop->iteration == 4)
                                            </div>
                                        @endif

                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <style>
        .social-icons {
            /* position: fixed; */
            bottom: 70px;
            /* Adjust as needed */
            right: 130px;
            /* Adjust as needed */
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .icon-container {
            width: 48px;
            height: 48px;
            position: relative;
            cursor: pointer;

        }

        .outer-circle {
            width: 48px;
            height: 48px;
            position: absolute;
            background: white;
            border-radius: 50%;
            border: 1px #3D3D3D3D solid;
        }

        .icon-container:hover .outer-circle {
            border-color: #CF1312;
        }

        .icon-container:hover .icon {
            color: #CF1312;
        }


        .inner-circle {
            width: 24px;
            height: 24px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .icon {
            width: 24px;
            height: 24px;
            position: absolute;
            color: #3D3D3DCC;
            /* Change color as needed */
            font-size: 24px;
            /* Adjust size as needed */
            line-height: 24px;
            /* Adjust line height as needed */
            text-align: center;
            /* Center the icon */
        }

        .background-circle {
            width: 24px;
            height: 24px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Default styles */
        .blog-details-container {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 24px;
            /* padding: 0 20px; /* Adjust padding for spacing from both sides */
        }

        .blog-details-item {
            width: calc(50% - 12px);
            /* Adjust width for two items per row with gap */
            height: auto;
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
        }

        .blog-details-image {
            width: 112px;
            height: 122px;
        }

        .blog-details-content {
            flex: 1;
            padding: 0 16px;
            /* Adjust padding for better spacing */
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            gap: 16px;
        }

        .blog-details-title {
            align-self: stretch;
            color: #3D3D3D;
            font-size: 16px;
            font-family: Montserrat;
            font-weight: 700;
            line-height: 20.80px;
            word-wrap: break-word;
        }

        .blog-details-read-more {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .blog-details-read-more-link {
            color: #3D3D3D;
            font-size: 14px;
            font-family: Poppins;
            font-weight: 400;
            text-decoration: underline;
            line-height: 14px;
            word-wrap: break-word;
        }

        .blog-details-read-more-icon {
            width: 16px;
            height: 16px;
            position: relative;
        }

        .blog-details-read-more-icon-inner {
            width: 16px;
            height: 16px;
            position: absolute;
            background: black;
        }

        .blog-details-read-more-icon-outer {
            width: 16px;
            height: 16px;
            position: absolute;
            background: #3D3D3D;
        }


        @media (max-width: 768px) {
            .blog-details-item {
                width: 100%;
                /* Full width for single item per row on smaller screens */
            }

            .blog-details-container {
                margin-left: 95px;
                /* Adjust margin-left for spacing from the left side on smaller screens */
            }
        }

        @media (max-width: 576px) {
            .blog-details-container {
                margin-left: 6px;
                /* Adjust margin-left for spacing from the left side on even smaller screens */
            }
        }
    </style>
    <!-- blog-details end  -->

@endsection