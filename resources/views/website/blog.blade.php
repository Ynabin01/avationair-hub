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

    <section class="blog-list px-3 py-5 p-md-5 kar-barka-sar">
        <!-- Search & Filter Section -->
        <div class="search-filter-container">
            <form id="searchForm" action="{{ route('search') }}" method="GET">
                <input id="searchInput" type="text" name="slug" value="@if(isset($slug2)){{$slug2}}@endif"
                    placeholder="Search for News">
                <i class="fa fa-search"></i>
                <input type="hidden" name="content" value="{{request()->input('content')}}">
            </form>

            <div class="button-group">
                <!-- <a href="{{ route('search', ['content' => 'blogs']) }}">
                    <div class="button {{ request()->input('content') == 'blogs' ? 'active' : '' }}">Blogs</div>
                </a> -->
                <a href="{{ route('search', ['content' => 'blogs']) }}">
                    <div class="button {{ request()->input('content') == 'blogs' ? 'active' : '' }}">Blogs</div>
                </a>
                <a href="{{ route('search', ['content' => 'news']) }}">
                    <div class="button {{ request()->input('content') == 'news' ? 'active' : '' }}">News</div>
                </a>
                <a href="{{ route('search', ['content' => 'notices']) }}">
                    <div class="button {{ request()->input('content') == 'notices' ? 'active' : '' }}">Notices</div>
                </a>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            @foreach ($blogs as $group_project)
                <div class="blog-item">
                    <img src="{{$group_project->banner_image ?? ''}}" alt="image">
                    <div class="media-body">
                        <div class="meta">{{ \Carbon\Carbon::parse($group_project->updated_at)->format('M d, Y') }}</div>
                        <h3 class="title"><a
                                href="{{$slug1->nav_name}}/{{$group_project->nav_name}}">{{$group_project->caption ?? ""}}</a>
                        </h3>
                        <div class="intro">{{$group_project->short_content ?? ""}}</div>
                        <div class="small-button-blog-b">
                            <div class="button">{{$group_project->long_content}}</div>
                            <div class="separator"></div>
                            <div class="time">{{$group_project->icon_image_caption ?? ""}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $blogs->links('vendor.pagination.default copy') }}
        </div>
    </section>
    <style>
        body {
            background-color: white;
            font-family: Arial, sans-serif;
        }

        /* Search & Filter Container */
        .search-filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 30px;
        }

        /* Fixed size search bar */
        .search-filter-container form {
            width: 350px;
            /* fixed width for professional look */
            max-width: 100%;
            position: relative;
        }

        .search-filter-container input[type="text"] {
            width: 100%;
            padding: 10px 40px 10px 15px;
            font-size: 16px;
            border: 1px solid #fa7900ff;
            border-radius: 30px;
            /* rounded for modern look */
            outline: none;
            transition: all 0.3s ease;
        }

        .search-filter-container input[type="text"]:focus {
            border-color: rgb(18, 62, 207);
            box-shadow: 0 0 8px rgba(253, 252, 251, 1);
        }

        .search-filter-container .fa-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #888;
            font-size: 18px;
        }

        /* Filter Buttons */
        .button-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button-group a .button {
            background-color: rgb(18, 62, 207);
            color: #fff;
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .button-group a .button:hover,
        .button-group a .button.active {
            background-color: rgb(18, 62, 207);
            transform: translateY(-2px);
        }

        /* Blog Grid */
        .blog-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .blog-item {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }

        .blog-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .blog-item img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-bottom: 1px solid #eee;
        }

        .blog-item .media-body {
            padding: 15px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .blog-item .meta {
            font-size: 12px;
            color: #999;
            margin-bottom: 8px;
        }

        .blog-item .title a {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            text-decoration: none;
            line-height: 1.3;
        }

        .blog-item .intro {
            font-size: 14px;
            margin: 10px 0;
            flex-grow: 1;
            color: #555;
        }

        .blog-item .small-button-blog-b .button {
            background-color: rgb(18, 62, 207);
            color: #fff;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            display: inline-block;
            margin-bottom: 5px;
        }

        /* Responsive Grid */
        @media (max-width: 1200px) {
            .blog-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 991px) {
            .blog-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .search-filter-container {
                flex-direction: column;
                align-items: stretch;
            }

            .button-group {
                justify-content: flex-start;
                margin-left: 15px;
            }
        }

        @media (max-width: 576px) {
            .blog-grid {
                grid-template-columns: 1fr;
            }

            .blog-item img {
                height: 120px;
            }

            .search-filter-container form {
                width: 100%;
            }
        }
    </style>

@endsection