<div class="do-gray" style="background-color: white ; padding-bottom: 150px;">
<div class="b-container blog-home" style="background-color: #391be6; height: 300px; margin-bottom: 115px; margin-top: -95px;">
            <div class="gallery-container">
                <br>
            <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
                <h2 class="mv-section-title">
                      <span class="mission"> Your source for </span>
                    <span class="vision">up-to-date</span> 
                    <span class="values">Blogs</span>
                </h2>
            </div>
                
                <br> <br>
                <div class="blog-gallery">

                    @foreach ($blogs->childs->sortByDesc('updated_at') as $blog)
                        @if ($loop->iteration < 5)
                        {{-- {{$blog}} --}}

                        <div class="blog-gallery-item" style="height: 300px !important;">
                            <a href="{{$blogs->nav_name}}/{{$blog->nav_name}}"><img src="{{$blog->banner_image ?? ""}}" alt=""></a>
                            <div class="blog-gallery-info" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div
                                    style="width: 100%; color: white; font-size: 10px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                    {{$blog->page_description ?? ""}}</div>
                                <div
                                    style="width: 100%; color: white; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 23.40px; word-wrap: break-word">
                                    {{$blog->caption}}</div>
                                <div
                                    style="width: 100%; height: 100%; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                                    <a href="{{$blogs->nav_name}}/{{$blog->nav_name}}">
                                        <div style="color: white; font-size: 12px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                            &plus; see details</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif

                    @endforeach

                    {{-- <div class="blog-gallery-item" style="height: 300px !important;">
                        <img src="website/img/public/image-2@2x.png" alt="">
                        <div class="blog-gallery-info">
                            <div
                                style="width: 100%; color: white; font-size: 10px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                AUCTION</div>
                            <div
                                style="width: 100%; color: white; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 23.40px; word-wrap: break-word">
                                Notice regarding Auction of Promoter Shares of Capital Merchant</div>
                            <div
                                style="width: 100%; height: 100%; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                                <div
                                    style="color: white; font-size: 12px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                    &plus; see details</div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-gallery-item" style="height: 300px !important;">
                        <img src="website/img/public/image-1@2x.png" alt="">
                        <div class="blog-gallery-info">
                            <div
                                style="width: 100%; color: white; font-size: 10px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                aUCTION</div>
                            <div
                                style="width: 100%; color: white; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 23.40px; word-wrap: break-word">
                                Notice regarding Auction of Promoter Shares of Capital Merchant</div>
                            <div
                                style="width: 100%; height: 100%; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                                <div
                                    style="color: white; font-size: 12px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                    &plus; see details</div>
                            </div>
                        </div>
                    </div>

                    <div class="blog-gallery-item" style="height: 300px !important;">
                        <img src="website/img/public/image-31@2x.png" alt="">
                        <div class="blog-gallery-info">
                            <div
                                style="width: 100%; color: white; font-size: 10px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                aUCTION</div>
                            <div
                                style="width: 100%; color: white; font-size: 16px; font-family: Montserrat; font-weight: 700; line-height: 23.40px; word-wrap: break-word">
                                Notice regarding Auction of Promoter Shares of Capital Merchant</div>
                            <div
                                style="width: 100%; height: 100%; justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                                <div
                                    style="color: white; font-size: 12px; font-family: Poppins; font-weight: 300; text-transform: uppercase; line-height: 18px; letter-spacing: 1.20px; word-wrap: break-word">
                                    &plus; see details</div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Add more gallery items here -->
                </div>
                <br>
                <div style="text-align: center; margin-top: 5px;"> <a href="/blog?content=blogs" style="background: linear-gradient(90deg,#e63946,#ff6b6b); border:none; color:#fff; font-weight:600; border-radius:40px; padding:8px 20px; font-size:0.9rem; text-decoration:none; transition:all 0.3s ease; display:inline-block;"> View All <span style="margin-left:6px;">&rarr;</span> </a> </div>
           <br>
            </div>
        </div>

        <!-- Blog End --> <br>
        <br>
        <br>
</div>

<style>
/* Image hover animation */
.blog-gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px; /* optional for rounded corners */
    transition: transform 0.5s ease, filter 0.5s ease;
}

/* Zoom and subtle brightness change on hover */
.blog-gallery-item:hover img {
    transform: scale(1.1);
    filter: brightness(1.1);
}

/* Optional: slight shadow on hover for depth */
.blog-gallery-item:hover img {
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
</style>
