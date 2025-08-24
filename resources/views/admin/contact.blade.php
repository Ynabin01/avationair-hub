
@extends("layouts.master")

@section('content')
<!-- breadcrumb start -->
<style>
    body{
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
                <div>Contact</div>
            </div>
            <div class="b-title">Contact</div>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="container-xxl py-6" style="width: 90%;">
        <div class="container">
            <div class="contact-section">
                <div class="contact-title">Let’s Get In Touch</div>
                <div class="contact-row">
                    <div class="contact-item">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-map-marker-alt" style="font-size: 24px;"></i>
                                <!-- Reduced the font size to 24px -->
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Address</div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 24px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->website_full_address }}</div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="fas fa-phone-alt" style="font-size: 24px;"></i>
                                <!-- Reduced the font size to 24px -->
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Phone Number</div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 24px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->phone }}</div>
                        </div>
                    </div>


                    <div class="contact-item">
                        <div
                            style="width: 100%; height: 100%; padding: 16px; border-radius: 4px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <div
                                style="background-color: rgba(207, 19, 18, 0.24); color: red; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                <i class="far fa-envelope" style="font-size: 24px;"></i>
                                <!-- Reduced the font size to 24px -->
                            </div>
                            <div
                                style="text-align: center; color: #212529; font-size: 18px; font-family: Montserrat; font-weight: 600; line-height: 23.40px; word-wrap: break-word; margin-top: 10px;">
                                Email Address</div>
                            <div
                                style="text-align: center; color: #3D3D3D; font-size: 16px; font-family: Poppins; font-weight: 400; line-height: 20.80px; word-wrap: break-word; margin-top: 5px;">
                                {{ $global_setting->site_email }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.3s">
            <form role="form" action="{{ route('contactstore') }}" method="post" id="contact-form" enctype='multipart/form-data'>
                @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="first_name" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" name="message" id="message"
                                    style="height: 150px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary py-2 px-4" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Contact End -->
 
    @endsection
