<!-- AOS for animations -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<style>
  /* Main section */
  .advanced-section {
    border-radius: 20px;
    padding: 60px 30px;
    /* smaller padding for responsiveness */
  }

  /* Image styling */
  .advanced-image {
    border-radius: 18px;
    transition: all 0.6s ease;
    max-width: 100%;
    height: auto;
  }

  .advanced-image:hover {
    transform: scale(1.05);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
  }

  /* Title */
  .advanced-title {
    font-size: 2rem;
    font-weight: 700;
    color: #212529;
  }

  /* Description */
  .advanced-description {
    font-size: 1rem;
    line-height: 1.6;
    color: #495057;
  }

  /* Button */
  .btn-advance {
    background: linear-gradient(90deg, #e63946, #ff6b6b);
    border: none;
    color: #fff;
    font-weight: 600;
    border-radius: 50px;
    padding: 12px 30px;
    transition: all 0.3s ease;
  }

  .btn-advance:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(230, 57, 70, 0.3);
    background: linear-gradient(90deg, #ff6b6b, #e63946);
  }

  /* Responsive adjustments */
  @media (max-width: 991px) {
    .advanced-section {
      padding: 50px 20px;
    }

    .advanced-title {
      font-size: 1.8rem;
      text-align: center;
    }

    .advanced-description,
    .text-dark {
      text-align: center;
    }

    .btn-advance {
      display: block;
      margin: 0 auto;
    }
  }

  @media (max-width: 576px) {
    .advanced-title {
      font-size: 1.6rem;
    }

    .advanced-description {
      font-size: 0.95rem;
    }
  }
</style>

<div id="unique-container" class="container py-6">
  <div class="advanced-section row align-items-center g-4">

    <!-- Left Image -->
    <div class="col-lg-6 col-md-12 text-center mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1200">
      <img src="{!! htmlspecialchars_decode($about->banner_image ?? '') !!}" alt="About Banner"
        style="width:400px; height:240px; max-width:100%;">
    </div>


    <!-- Right Content -->
    <div class="col-lg-6 col-md-12" data-aos="fade-left" data-aos-duration="1200">
      <div class="advanced-content">

        <!-- Title -->
        <h2 class="advanced-title mb-3">
          {!! htmlspecialchars_decode($about->caption ?? '') !!}
        </h2>

        <!-- Description -->
        <p class="advanced-description mb-4">
          {!! htmlspecialchars_decode($about->short_content ?? '') !!}
        </p>
        <p class="text-dark mb-4">
          {!! htmlspecialchars_decode($about->long_content ?? '') !!}
        </p>

        <!-- Explore Button -->
        <a href="/about-one/about-us-two" class="btn btn-advance">
          Explore More <span class="ms-2">&rarr;</span>
        </a>
      </div>
    </div>

  </div>
</div>