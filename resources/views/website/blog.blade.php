@extends("layouts.master")
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
            <div class="b-title">{{$slug1->caption ?? $slug1 }}</div>
        </div>
    </div>

    <!-- breadcrumb end -->

    <!-- Blog Start -->
    <section class="blog-list px-3 py-5 p-md-5 kar-barka-sar">
        <div class="row blog-grid">
            <div class="search-blog-p  col" style="margin-bottom: 50px;">
                <!-- <div class="search-blog-p input-container"> -->
                {{-- <input type="text" class="search-blog-p input-text" placeholder="Search for News"> --}}
                <form id="searchForm" action="{{ route('search') }}" method="GET" style="position: relative;">
                    <div style="position: relative;">
                        <input id="searchInput" type="text" name="slug" style="padding-left: 35px; font-size: 15px;"
                            class="search-blog-p input-text" value="@if(isset($slug2)){{$slug2}}@endif"
                            placeholder="Search for News">
                        <span style="position: absolute;left: 195px; top: 50%; transform: translateY(-50%);">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input id="type" type="hidden" name="content" class="search-blog-p input-text"
                        value="{{request()->input('content')}}" placeholder="Search for News">
                </form>
                <script>
                    document.getElementById("searchForm").addEventListener("submit", function (event) {
                        var searchValue = document.getElementById("searchInput").value.trim();
                        if (!searchValue) {
                            event.preventDefault(); // Prevent form submission if search value is empty
                            return;
                        }
                        // var actionUrl = "{{ route('search', ['slug' => '']) }}/" ;
                        this.setAttribute("action", actionUrl);
                    });
                </script>

                <!-- </div> -->
                <div class="search-blog-p title" style="    margin-top: 15px;">Discover More</div>
                <div class="search-blog-p button-container">
                    <div class="search-blog-p button-group">
                        <a href="/blog?content=news">
                            <div class="search-blog-p button">
                                <div class="search-blog-p button-text">News</div>
                            </div>
                        </a>
                        <a href="/blog?content=blogs">
                            <div class="search-blog-p button">
                                <div class="search-blog-p button-text">Blogs</div>
                            </div>
                        </a>
                        <a href="/blog?content=notices">
                            <div class="search-blog-p button">
                                <div class="search-blog-p button-text">Notices</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class=" col-md-8">
                {{-- {{$slug1}} --}}
                @foreach ($blogs as $group_project)
                            <?php
                    // $content = $group_project->long_content;      
                    // $parts = explode('<br />', $content);    
                    // $keys = [];
                    // $result = [];
                    // foreach ($parts as $part) {
                    //     // Split each part by ":" to separate the key and value
                    //     $pair = explode('=', $part, 2);

                    //     // Trim whitespace from the key and value
                    //     $keys[] = trim($pair[0]);
                    //     $value = isset($pair[1]) ? trim($pair[1]) : '';
                    //     $result[] = $value;    
                    // }                              
                                                            ?>
                            <div class="mb-5 row">
                                <div class="item media ">
                                    <div class="item-with-shadow media" style="width:100%">
                                        <div class="media-body" style="width:100%">
                                            <div class="meta mb-1"><span
                                                    class="date">{{ \Carbon\Carbon::parse($group_project->updated_at)->format('M d, Y') }}</span>
                                            </div>
                                            <h3 class="title mb-1"><a
                                                    href="{{$slug1->nav_name}}/{{$group_project->nav_name}}">{{$group_project->caption ?? ""}}</a>
                                            </h3>
                                            <div class="intro">{{$group_project->short_content ?? ""}}</div>
                                            <div class="small-button-blog-b">
                                                {{-- @foreach ($keys as $index => $res)
                                                <a href="{{$result[$index]}}">
                                                    <div class="button">{{$res}}</div>
                                                </a>
                                                @endforeach --}}
                                                <div class="button">{{$group_project->long_content}}</div>
                                                {{-- <div class="button">Blogs</div> --}}
                                                <div class="separator"></div>
                                                <div class="time">{{$group_project->icon_image_caption ?? ""}}</div>
                                            </div>
                                        </div><!--//media-body-->
                                        <img class="ml-3 img-fluid post-thumb d-none d-md-block" style="
                                                                        max-height: 150px;
                                                                        height: 97px;
                                                                        width: 110px;
                                                                        inline-size: -webkit-fill-available;
                                                                    " src="{{$group_project->banner_image ?? ""}}" alt="image">
                                    </div>
                                </div><!--//media-->
                            </div><!--//item-->
                @endforeach

                {{-- <div class="more" style="text-align: center;">
                    <svg width="117" height="24" viewBox="0 0 117 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.6121 6.848L6.40406 18H4.72406L0.516063 6.848H2.06806L5.57206 16.464L9.07606 6.848H10.6121ZM12.9606 7.808C12.6832 7.808 12.4486 7.712 12.2566 7.52C12.0646 7.328 11.9686 7.09333 11.9686 6.816C11.9686 6.53867 12.0646 6.304 12.2566 6.112C12.4486 5.92 12.6832 5.824 12.9606 5.824C13.2272 5.824 13.4512 5.92 13.6326 6.112C13.8246 6.304 13.9206 6.53867 13.9206 6.816C13.9206 7.09333 13.8246 7.328 13.6326 7.52C13.4512 7.712 13.2272 7.808 12.9606 7.808ZM13.6646 9.232V18H12.2086V9.232H13.6646ZM24.1461 13.28C24.1461 13.5573 24.1301 13.8507 24.0981 14.16H17.0901C17.1434 15.024 17.4367 15.7013 17.9701 16.192C18.5141 16.672 19.1701 16.912 19.9381 16.912C20.5674 16.912 21.0901 16.768 21.5061 16.48C21.9327 16.1813 22.2314 15.7867 22.4021 15.296H23.9701C23.7354 16.1387 23.2661 16.8267 22.5621 17.36C21.8581 17.8827 20.9834 18.144 19.9381 18.144C19.1061 18.144 18.3594 17.9573 17.6981 17.584C17.0474 17.2107 16.5354 16.6827 16.1621 16C15.7887 15.3067 15.6021 14.5067 15.6021 13.6C15.6021 12.6933 15.7834 11.8987 16.1461 11.216C16.5087 10.5333 17.0154 10.0107 17.6661 9.648C18.3274 9.27467 19.0847 9.088 19.9381 9.088C20.7701 9.088 21.5061 9.26933 22.1461 9.632C22.7861 9.99467 23.2767 10.496 23.6181 11.136C23.9701 11.7653 24.1461 12.48 24.1461 13.28ZM22.6421 12.976C22.6421 12.4213 22.5194 11.9467 22.2741 11.552C22.0287 11.1467 21.6927 10.8427 21.2661 10.64C20.8501 10.4267 20.3861 10.32 19.8741 10.32C19.1381 10.32 18.5087 10.5547 17.9861 11.024C17.4741 11.4933 17.1807 12.144 17.1061 12.976H22.6421ZM37.7479 9.232L35.0119 18H33.5079L31.3959 11.04L29.2839 18H27.7799L25.0279 9.232H26.5159L28.5319 16.592L30.7079 9.232H32.1959L34.3239 16.608L36.3079 9.232H37.7479ZM54.0026 9.072C54.6852 9.072 55.2932 9.216 55.8266 9.504C56.3599 9.78133 56.7812 10.2027 57.0906 10.768C57.3999 11.3333 57.5546 12.0213 57.5546 12.832V18H56.1146V13.04C56.1146 12.1653 55.8959 11.4987 55.4586 11.04C55.0319 10.5707 54.4506 10.336 53.7146 10.336C52.9572 10.336 52.3546 10.5813 51.9066 11.072C51.4586 11.552 51.2346 12.2507 51.2346 13.168V18H49.7946V13.04C49.7946 12.1653 49.5759 11.4987 49.1386 11.04C48.7119 10.5707 48.1306 10.336 47.3946 10.336C46.6372 10.336 46.0346 10.5813 45.5866 11.072C45.1386 11.552 44.9146 12.2507 44.9146 13.168V18H43.4586V9.232H44.9146V10.496C45.2026 10.0373 45.5866 9.68533 46.0666 9.44C46.5572 9.19467 47.0959 9.072 47.6826 9.072C48.4186 9.072 49.0692 9.23733 49.6346 9.568C50.1999 9.89867 50.6212 10.384 50.8986 11.024C51.1439 10.4053 51.5492 9.92533 52.1146 9.584C52.6799 9.24267 53.3092 9.072 54.0026 9.072ZM63.7669 18.144C62.9456 18.144 62.1989 17.9573 61.5269 17.584C60.8656 17.2107 60.3429 16.6827 59.9589 16C59.5856 15.3067 59.3989 14.5067 59.3989 13.6C59.3989 12.704 59.5909 11.9147 59.9749 11.232C60.3696 10.5387 60.9029 10.0107 61.5749 9.648C62.2469 9.27467 62.9989 9.088 63.8309 9.088C64.6629 9.088 65.4149 9.27467 66.0869 9.648C66.7589 10.0107 67.2869 10.5333 67.6709 11.216C68.0656 11.8987 68.2629 12.6933 68.2629 13.6C68.2629 14.5067 68.0603 15.3067 67.6549 16C67.2603 16.6827 66.7216 17.2107 66.0389 17.584C65.3563 17.9573 64.5989 18.144 63.7669 18.144ZM63.7669 16.864C64.2896 16.864 64.7803 16.7413 65.2389 16.496C65.6976 16.2507 66.0656 15.8827 66.3429 15.392C66.6309 14.9013 66.7749 14.304 66.7749 13.6C66.7749 12.896 66.6363 12.2987 66.3589 11.808C66.0816 11.3173 65.7189 10.9547 65.2709 10.72C64.8229 10.4747 64.3376 10.352 63.8149 10.352C63.2816 10.352 62.7909 10.4747 62.3429 10.72C61.9056 10.9547 61.5536 11.3173 61.2869 11.808C61.0203 12.2987 60.8869 12.896 60.8869 13.6C60.8869 14.3147 61.0149 14.9173 61.2709 15.408C61.5376 15.8987 61.8896 16.2667 62.3269 16.512C62.7643 16.7467 63.2443 16.864 63.7669 16.864ZM71.6333 10.656C71.8893 10.1547 72.252 9.76533 72.7213 9.488C73.2013 9.21067 73.7826 9.072 74.4653 9.072V10.576H74.0813C72.4493 10.576 71.6333 11.4613 71.6333 13.232V18H70.1773V9.232H71.6333V10.656ZM84.1461 13.28C84.1461 13.5573 84.1301 13.8507 84.0981 14.16H77.0901C77.1434 15.024 77.4367 15.7013 77.9701 16.192C78.5141 16.672 79.1701 16.912 79.9381 16.912C80.5674 16.912 81.0901 16.768 81.5061 16.48C81.9327 16.1813 82.2314 15.7867 82.4021 15.296H83.9701C83.7354 16.1387 83.2661 16.8267 82.5621 17.36C81.8581 17.8827 80.9834 18.144 79.9381 18.144C79.1061 18.144 78.3594 17.9573 77.6981 17.584C77.0474 17.2107 76.5354 16.6827 76.1621 16C75.7887 15.3067 75.6021 14.5067 75.6021 13.6C75.6021 12.6933 75.7834 11.8987 76.1461 11.216C76.5087 10.5333 77.0154 10.0107 77.6661 9.648C78.3274 9.27467 79.0847 9.088 79.9381 9.088C80.7701 9.088 81.5061 9.26933 82.1461 9.632C82.7861 9.99467 83.2767 10.496 83.6181 11.136C83.9701 11.7653 84.1461 12.48 84.1461 13.28ZM82.6421 12.976C82.6421 12.4213 82.5194 11.9467 82.2741 11.552C82.0287 11.1467 81.6927 10.8427 81.2661 10.64C80.8501 10.4267 80.3861 10.32 79.8741 10.32C79.1381 10.32 78.5087 10.5547 77.9861 11.024C77.4741 11.4933 77.1807 12.144 77.1061 12.976H82.6421Z"
                            fill="#CF1312" />
                        <path
                            d="M108.475 18.7912C108.343 18.9242 108.162 18.9993 107.974 19C107.786 19.0007 107.605 18.9269 107.471 18.7949C107.338 18.6629 107.262 18.4835 107.262 18.2961C107.261 18.1087 107.335 17.9287 107.468 17.7957L112.577 12.7113L95.7162 12.7113C95.6223 12.7121 95.5292 12.6944 95.4423 12.6591C95.3554 12.6239 95.2763 12.5719 95.2097 12.506C95.1431 12.4402 95.0903 12.3618 95.0543 12.2755C95.0183 12.1892 94.9998 12.0967 95 12.0032C95.0007 11.8143 95.0763 11.6334 95.2105 11.4998C95.3447 11.3662 95.5264 11.2909 95.7162 11.2902L112.577 11.2902L107.468 6.21325C107.337 6.07883 107.264 5.89898 107.264 5.71177C107.264 5.52457 107.337 5.34471 107.468 5.2103C107.533 5.1437 107.612 5.09081 107.698 5.0547C107.785 5.0186 107.878 5 107.971 5C108.065 5 108.158 5.0186 108.245 5.0547C108.331 5.09081 108.409 5.1437 108.475 5.2103L114.795 11.5055C114.926 11.638 115 11.8169 115 12.0032C115 12.1896 114.926 12.3684 114.795 12.501L108.475 18.7912Z"
                            fill="#CF1312" />
                    </svg>
                </div> --}}

                {{ $blogs->links('vendor.pagination.default copy') }}
            </div>
        </div>
    </section>
@endsection

<!-- Blog End -->