<!-- Mission, Vision, Values Section - Blue Theme -->
<div id="unique-container" class="container py-6"></div>
<div class="container py-5" style="margin-top: -80px;">
    <div class="row text-center g-4">

        <!-- Section Header -->
        <div class="col-12 mb-5" data-aos="fade-up" data-aos-duration="1200">
            <h2 class="mv-section-title">
                Our <span class="mission">Mission</span>,
                <span class="vision">Vision</span> &
                <span class="values">Values</span>
            </h2>
            <p class="mv-section-desc">
                Committed to excellence in educational guidance, helping students achieve their global aspirations.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Mission Card -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000"
                style=" margin-right: -20px; margin-top: -35px;     margin-bottom: 50px !important;">
                <div class="mv-card-glass h-100 p-4 text-center position-relative overflow-hidden">
                    <div class="mv-icon-circle mb-3">
                        <i class="fas fa-bullseye fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-2 text-gradient-mission">Mission</h5>
                    <p>
                        Provide students with comprehensive support and guidance to achieve their educational goals
                        globally.
                    </p>
                </div>
            </div>

            <!-- Vision Card -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1200"
                style=" margin-right: -20px; margin-top: -35px;     margin-bottom: 50px !important;">
                <div class="mv-card-glass h-100 p-4 text-center position-relative overflow-hidden">
                    <div class="mv-icon-circle mb-3 vision-icon">
                        <i class="fas fa-eye fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-2 text-gradient-vision">Vision</h5>
                    <p class=".mv-card-glass">
                        To be a leading educational consultancy recognized for excellence, trust, and global impact.
                    </p>
                </div>
            </div>

            <!-- Values Card -->
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1400"
                style=" margin-right: -20px; margin-top: -35px;     margin-bottom: 50px !important;">
                <div class="mv-card-glass h-100 p-4 text-center position-relative overflow-hidden">
                    <div class="mv-icon-circle mb-3 values-icon">
                        <i class="fas fa-handshake fa-3x"></i>
                    </div>
                    <h5 class="fw-bold mb-2 text-gradient-values">Values</h5>
                    <p>
                        Integrity, Excellence, Commitment, and Innovation guide everything we do in helping students
                        succeed.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
</div>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>
    /* Section title */
    .mv-section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0d3b66;
    }

    .mv-section-desc {
        font-size: 1rem;
        color: #0d3b66;
        max-width: 600px;
        margin: 0 auto;
    }

    .mv-card-glass p {
        color: #000;
    }

    /* Card styling */
    .mv-card-blue {
        background: linear-gradient(135deg, #1e3c72, #2a5298, #1e3c72);
        border-radius: 20px;
        color: #fff;
        transition: all 0.5s ease;
        position: relative;
    }

    /* Colorful corner effects using pseudo-elements */
    .mv-card-blue::before,
    .mv-card-blue::after {
        content: '';
        position: absolute;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        z-index: 1;
        opacity: 0.3;
    }

    .mv-card-blue::before {
        top: -10px;
        left: -10px;
        background: #55aaff;
    }

    .mv-card-blue::after {
        bottom: -10px;
        right: -10px;
        background: #0077cc;
    }

    /* Icon circle */
    .mv-icon-blue {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px auto;
        transition: all 0.5s ease;
        z-index: 2;
        position: relative;
    }

    .mv-icon-blue i {
        color: #fff;
    }

    /* Hover effect */
    .mv-card-blue:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    .mv-card-blue:hover .mv-icon-blue {
        transform: rotate(15deg) scale(1.1);
        background: rgba(255, 255, 255, 0.3);
    }

    /* Responsive */
    @media (max-width: 991px) {
        .mv-card-blue {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 576px) {
        .mv-section-title {
            font-size: 1.6rem;
        }

        .mv-section-desc {
            font-size: 0.95rem;
        }
    }

    /* mission vision */

    .mv-section-title {
        font-size: 2rem;
        font-weight: 800;
        text-align: center;
        margin: 40px 0;
        position: relative;
    }

    /* colorful parts */
    .mv-section-title .mission {
        color: #ff512f;
        /* orange-red */
    }

    .mv-section-title .vision {
        color: #24c6dc;
        /* sky blue */
    }

    .mv-section-title .values {
        color: yellow;
        /* deep purple */
    }

    /* underline animation */
    .mv-section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        width: 0;
        height: 4px;
        background: linear-gradient(90deg, #ff512f, #24c6dc, #514a9d);
        border-radius: 50px;
        transform: translateX(-50%);
        animation: underlineGrow 2s ease forwards;
    }

    @keyframes underlineGrow {
        from {
            width: 0;
        }

        to {
            width: 200px;
        }
    }

    /* responsive */
    @media (max-width: 768px) {
        .mv-section-title {
            font-size: 1.6rem;
        }
    }

    @media (max-width: 480px) {
        .mv-section-title {
            font-size: 1.3rem;
        }
    }

    /* Glass-style cards */
    .mv-card-glass {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: #fff;
        transition: all 0.5s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        min-height: 340px;
        /* you can tweak (320–380px works best) */
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* center all content */
        padding: 2rem 1.5rem;
    }

    /* Hover glowing border */
    .mv-card-glass::before {
        content: "";
        position: absolute;
        top: -2px;
        left: -2px;
        width: calc(100% + 4px);
        height: calc(100% + 4px);
        border-radius: 22px;
        background: linear-gradient(90deg, #ff512f, #24c6dc, #514a9d, #ff512f);
        background-size: 300% 300%;
        z-index: 0;
        animation: borderMove 6s linear infinite;
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .mv-card-glass:hover::before {
        opacity: 1;
    }

    @keyframes borderMove {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    /* Keep content above glowing effect */
    .mv-card-glass>* {
        position: relative;
        z-index: 2;
    }

    /* Icon circles */
    .mv-icon-circle {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px auto;
        background: linear-gradient(135deg, #ff512f, #dd2476);
        color: #fff;
        transition: transform 0.5s ease;
    }

    .vision-icon {
        background: linear-gradient(135deg, #24c6dc, #514a9d);
    }

    .values-icon {
        background: linear-gradient(135deg, #43e97b, #38f9d7);
    }

    .mv-card-glass:hover .mv-icon-circle {
        transform: scale(1.15) rotate(10deg);
    }

    /* Gradient titles */
    .text-gradient-mission {
        background: linear-gradient(45deg, #ff512f, #dd2476);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .text-gradient-vision {
        background: linear-gradient(45deg, #24c6dc, #514a9d);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .text-gradient-values {
        background: linear-gradient(45deg, #43e97b, #38f9d7);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Floating subtle animation */
    .mv-card-glass:hover {
        transform: translateY(-12px) scale(1.03);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }
</style>