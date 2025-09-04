@extends("layouts.master")

@section('content')
    <!-- breadcrumb start -->
    <style>
        body {
            background-color: white;
        }
    </style>

    <!-- Include Animate.css & Wow.js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

    <div class="container-xxl bg-primary page-header wow animate__fadeIn" style="background-image: url('/website/img/bcumb.jpg'); 
                    background-size: cover; 
                    background-position: center bottom;  
                    height: 250px;">
        <div class="container nichha">
            <div class="bread-container bread-auto wow animate__fadeInDown" data-wow-delay="0.2s">
                <div>Home</div>
                <div class="divider"> / </div>
                <div>Contact</div>
            </div>
            <div class="b-title wow animate__fadeInUp" data-wow-delay="0.4s">Contact</div>
        </div>
    </div>

    <!-- Contact Start -->
    <div class="container-xxl py-6" style="width: 90%;">
        <div class="container">
            <div class="contact-section"><br><br>
                <div class="responsive-container" style="margin-top: -25px;">
                    <h2 class="mv-section-title animated-heading">
                        <span class="mission">Let’s Get</span>
                        <span class="vision"> In </span>
                        <span class="values">Touch</span>
                    </h2>
                </div>
                <div class="contact-row">

                    <div class="contact-item wow animate__fadeInUp" data-wow-delay="0.3s">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-map-marker-alt" style="font-size: 24px;"></i>
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Address
                            </div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 24px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->website_full_address }}
                            </div>
                        </div>
                    </div>

                    <div class="contact-item wow animate__fadeInUp" data-wow-delay="0.5s">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-phone-alt" style="font-size: 24px;"></i>
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Phone Number
                            </div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 24px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->phone }}
                            </div>
                        </div>
                    </div>

                    <div class="contact-item wow animate__fadeInUp" data-wow-delay="0.7s">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="far fa-envelope" style="font-size: 24px;"></i>
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Email Address
                            </div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 20.80px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->site_email }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 wow animate__fadeInUp" data-wow-delay="0.3s">
                <form role="form" action="{{ route('contactstore') }}" method="post" id="contact-form"
                    enctype='multipart/form-data'>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating wow animate__fadeInLeft" data-wow-delay="0.4s">
                                <input type="text" class="form-control" name="first_name" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating wow animate__fadeInRight" data-wow-delay="0.5s">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating wow animate__fadeInUp" data-wow-delay="0.6s">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating wow animate__fadeInUp" data-wow-delay="0.7s">
                                <textarea class="form-control" placeholder="Leave a message here" name="message"
                                    id="message" style="height: 150px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end wow animate__fadeInUp" data-wow-delay="0.8s">
                            <button class="btn btn-primary py-2 px-4" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </div>
<iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d44668.46432989629!2d85.28493276485202!3d27.70903024219139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e1!3m2!1sen!2snp!4v1755687932394!5m2!1sen!2snp"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- Contact End -->
@endsection


<style>
    /* Multi-color text */
    .mv-section-title span.mission {
        color: #0830cb;
        /* Red */
        animation: floatColors 3s infinite alternate;
    }

    .mv-section-title span.vision {
        color: #00BFFF;
        /* Blue */
        animation: floatColors 3s infinite alternate 0.3s;
    }

    .mv-section-title span.values {
        color: #32CD32;
        /* Green */
        animation: floatColors 3s infinite alternate 0.6s;
    }

    /* Floating/scale animation */
    @keyframes floatColors {
        0% {
            transform: translateY(0px) scale(1);
            text-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
        }

        50% {
            transform: translateY(-10px) scale(1.05);
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
        }

        100% {
            transform: translateY(0px) scale(1);
            text-shadow: 0px 0px 0px rgba(0, 0, 0, 0);
        }
    }
</style>