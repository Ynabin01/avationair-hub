@extends("layouts.master")

@section('content')

<!-- start innerpage top banner -->
<section class="innerpage-banner-wrapper">
  <div class="breadcrumb-overlay"></div>
  <div class="container">
    <div class="row">
      <div class="breadcrumb-main">
        <div class="container">
            <div class="breadcrumb-container-inner">
              <h3 class="heading-title white">Apply Now</h3>
              <h1 class="white">Fill out the form below</h1>
              <ol class="breadcrumb">
                <li><a href="/">Home</a> </li>
                <li class="active">Apply Form</li>
              </ol>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- end innerpage top banner -->

<!-- start inquiry section -->

<section class="homepage-wrapper aboutus-wrapper innerpage-wrapper">
  <div class="container">
      <div class="row">
        <div class="apply-form-wrapper">
            <div class="contact-form">
              <form action="#" method="POST">
                <input type="text" id="name" placeholder="Your Full Name*" name="name" required="true">
                <input type="text" id="contact" placeholder="Your Phone Number*" name="phone" required="true">
                <input type="email" id="email" placeholder="Your Email Address*" name="email" required="true">
                <input type="text" id="country" placeholder="Your Country*" name="country" required="true">
                <input type="text" id="apply" placeholder="Apply For..." name="apply" required="true">
                <div class="form-field col-md-12">
                  <label>Upload Your CV</label>
                  <input type="file" class="form-control file-upload">
                </div>
                <textarea name="message" placeholder="Place Your Message*" spellcheck="false" data-ms-editor="true" required="true"></textarea>
                <button type="submit">Submit</button>
              </form>
            </div>
        </div>

        <div class="clearfix"></div>
      </div>
  </div>


</section>



@endsection
