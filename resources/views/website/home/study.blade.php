<div class="container-xxl py-6 aus-abroad">
    <div class="main-container">
         
            <h2 class="mv-section-title">
                      <span class="mission">Explore Top Destinations </span>
                    <span class="vision">To Study</span> 
                    <span class="values">Abroad</span>
                </h2>
       
        <!-- Tabs -->
        <div class="homestudy-list nav" id="myTab" role="tablist">
            @foreach ($abroad as $sub)
                <a href="#abroad{{$sub->id}}" data-bs-toggle="tab" data-bs-target="#abroad{{$sub->id}}"
                    class="homestudy-item @if($loop->first) active @endif">
                    <div class="homestudy-name @if($loop->first) active @endif">{{$sub->caption}}</div>
                </a>
            @endforeach
        </div>

        <!-- Tab Content -->
        <div class="tab-content">
            @foreach ($abroad as $subsub)
                <div id="abroad{{$subsub->id}}" class="tab-pane @if($loop->first) active @endif">
                    <div class="container-fluid py-5 abroad-mobile">
                        <div class="container text-center">
                            <!-- Image on top with 3D hover -->
                            <div class="image-container animate-element" style="margin-top: -50px;">
                                <img src="{{$subsub->banner_image ?? ''}}" alt="{{$subsub->caption}}" class="study-img">
                            </div>

                            <!-- Content below -->
                            <div class="kamkar animate-element">
                                <div class="long-content" style="font-size: 18px !important;">
                                    {{$subsub->long_content}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div style="text-align: center; margin-top: 20px;"> <a href="/blog?content=blogs"
                    style="background: linear-gradient(90deg,#e63946,#ff6b6b); border:none; color:#fff; font-weight:600; border-radius:40px; padding:8px 20px; font-size:0.9rem; text-decoration:none; transition:all 0.3s ease; display:inline-block;">
                    View All <span style="margin-left:6px;">&rarr;</span> </a> </div>
        </div>
    </div>
</div>
</div>

<style>
    /* ===== Section Background Image ===== */
    .aus-abroad {
        position: relative;
        margin: 50px 0;
        font-family: 'Montserrat', sans-serif;
        overflow: hidden;
        color: #fff;
        padding: 60px 0;
        min-height: 600px;
        /* ensures section is tall enough for background */
        background-image: url('/website/img/bgi.jpg');
        /* replace with your image path */
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    /* Optional overlay for better text readability */
    .aus-abroad::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.4);
        /* adjust opacity if needed */
        z-index: 0;
    }

    .aus-abroad>.main-container {
        position: relative;
        z-index: 1;
    }

    /* ===== Tabs ===== */
    .homestudy-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        margin-bottom: 50px;
    }

    .homestudy-item {
        padding: 12px 25px;
        border-radius: 30px;
        background-color: rgba(255, 255, 255, 0.8);
        cursor: pointer;
        text-align: center;
        transition: 0.3s;
        color: #000;
    }

    .homestudy-item.active,
    .homestudy-item:hover {
        background-color: #CF1312;
        color: #fff;
    }

    /* ===== Image ===== */
    .image-container {
        perspective: 1000px;
        margin-bottom: 5px;
    }

    .study-img {
        width: 60%;
        max-width: 400px;
        border-radius: 12px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        display: block;
        margin: 0 auto;
        cursor: pointer;
    }

    .image-container:hover .study-img {
        transform: rotateY(10deg) rotateX(5deg) scale(1.05);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
    }

    /* ===== Content ===== */
    .kamkar {
        margin-top: 5px;
        opacity: 0;
        transform: translateY(20px);
        transition: 0.8s ease-out;
    }

    .animate-element.show {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    /* ===== Responsive ===== */
    @media(max-width: 991px) {
        .study-img {
            width: 80%;
        }

        .homestudy-item {
            padding: 10px 20px;
            font-size: 14px;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tabs = document.querySelectorAll('.homestudy-item');

        function animatePane(pane) {
            const elements = pane.querySelectorAll('.animate-element');
            elements.forEach((el, index) => {
                el.classList.remove('show');
                setTimeout(() => { el.classList.add('show'); }, index * 150);
            });
        }

        // Animate first active pane on load
        const firstPane = document.querySelector('.tab-pane.active');
        if (firstPane) animatePane(firstPane);

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('data-bs-target');

                // Toggle tab active class
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Show corresponding tab content
                document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('active'));
                const pane = document.querySelector(target);
                pane.classList.add('active');

                // Animate newly active pane
                animatePane(pane);
            });
        });
    });
</script>