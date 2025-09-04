<!-- Modern Split MVV Section (Clean Image Layout, No Blur) -->
<div class="mvv2-split-section container">
  <div class="row align-items-center g-5">
    <!-- Left Images -->
    <div class="col-lg-6 d-flex">
      <!-- Big Image (always visible) -->
      <div class="mvv2-left flex-grow-2" data-aos="fade-right" data-aos-duration="1000">
        <img src="/website/img/Good-Airline-Pilot.webp" alt="Big Image" class="mvv2-img mvv2-big" />
      </div>

      <!-- Right Stacked Images (HIDDEN on mobile) -->
      <div class="mvv2-right d-flex flex-column justify-content-between ms-3 d-none d-lg-flex" data-aos="fade-left"
        data-aos-duration="1000">
        <img src="/website/img/mis.jpg" alt="Medium Image" class="mvv2-img mvv2-medium mb-3" />
        <img src="/website/img/a1.jpg" alt="Small Image" class="mvv2-img mvv2-small" />
      </div>
    </div>

    <!-- Right Content -->
    <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1200">
      <span class="mvv2-subtitle">Know About Us</span>
      <h2 class="mvv2-title">Education Air <span>Hub Nepal</span></h2>
      <p class="mvv2-desc" style="font-size: 1rem; line-height: 1.6; color: #333;">
       Aviation Hub Nepal is a trusted educational consultancy, providing expert guidance and support for students seeking higher education opportunities both locally and abroad.
      </p>

      <div class="mvv2-items mt-4">
        <div class="mvv2-item">
          <div class="mvv2-icon mvv2-icon-mission"><i class="fas fa-bullseye"></i></div>
          <div class="mvv2-text">
            <h5>Mission</h5>
            <p>Providing students with reliable, precise, and impartial information to foster effective learning.</p>
          </div>
        </div>
        <div class="mvv2-item">
          <div class="mvv2-icon mvv2-icon-vision"><i class="fas fa-eye"></i></div>
          <div class="mvv2-text">
            <h5>Vision</h5>
            <p>Aviation Hub Nepal aims to establish itself as the country's primary destination for international studies.</p>
          </div>
        </div>
        <div class="mvv2-item">
          <div class="mvv2-icon mvv2-icon-values"><i class="fas fa-handshake"></i></div>
          <div class="mvv2-text">
            <h5>Values</h5>
            <p>Integrity, Excellence, Commitment, and Innovation guide everything we do in helping students succeed.</p>
          </div>
        </div>
      </div>
    </div>
  </div><br><br><br>
</div>

<!-- Font Awesome & AOS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>AOS.init();</script>

<style>
  /* Section Padding */

  /* Image Layout */
  .mvv2-left,
  .mvv2-right img {
    position: relative;
  }

  /* Remove overlay blur */
  .mvv2-overlay-container,
  .mvv2-blue-overlay {
    display: none !important;
  }

  /* Images */
  .mvv2-img {
    border-radius: 15px;
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    object-fit: cover;
    width: 100%;
  }

  .mvv2-img:hover {
    transform: scale(1.04);
    box-shadow: 0 18px 30px rgba(0, 0, 0, 0.2);
  }

  /* Big Image */
  .mvv2-big {
    width: 350px;
    height: 500px;
    border-radius: 15px;
    object-fit: cover;
  }

  /* Right Stacked Images */
  .mvv2-medium {
    width: 135%;
    margin-left: -51px;
    height: 200px;
  }

  .mvv2-small {
    width: 135%;
    height: 400px;
    margin-left: -51px;
  }

  .mvv2-left {
    flex: 2;
    margin-right: 20px;
  }

  .mvv2-right {
    flex: 1;
    gap: 1rem;
    display: flex;
    flex-direction: column;
  }

  /* Right Content */
  .mvv2-subtitle {
    display: inline-block;
    color: #ff6b6b;
    font-weight: 600;
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 0.9rem;
  }

  .mvv2-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 1rem;
  }

  .mvv2-title span {
    color: #1e90ff;
  }

  .mvv2-desc {
    font-size: 1rem;
    color: #555;
    line-height: 1.6;
  }

  /* MVV Items */
  .mvv2-items {
    margin-top: 2rem;
  }

  .mvv2-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
  }

  .mvv2-icon {
    flex-shrink: 0;
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1.2rem;
    margin-right: 15px;
  }

  .mvv2-icon-mission {
    background: #ff6b6b;
  }

  .mvv2-icon-vision {
    background: #1e90ff;
  }

  .mvv2-icon-values {
    background: #ffa500;
  }

  .mvv2-text h5 {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 5px;
  }

  .mvv2-text p {
    color: #555;
    font-size: 0.95rem;
    line-height: 1.5;
  }

  /* Responsive */
  @media (max-width: 992px) {
    .mvv2-split-section {
      padding-top: 60px;
      padding-bottom: 0px;
    }

    .mvv2-split-section .col-lg-6.d-flex {
      flex-direction: column;
      align-items: center;
      margin-bottom: 30px;
      margin-top: -23px !important;
    }

    .mvv2-right {
      display: none !important;
    }

    /* Big Image responsive */
  

    .mvv2-subtitle {
      margin-top: 10px;
      margin-bottom: 15px;
      font-size: 0.85rem;
      text-align: center;
      margin-left: 25%;
    }

    .mvv2-title {
      font-size: 1.8rem;
      text-align: center;
      margin-bottom: 15px;
    }

    .mvv2-desc {
      font-size: 0.95rem;
      line-height: 1.6;
      margin: 0 10px 20px;
      text-align: center;
    }

    .mvv2-items {
      margin: 0 10px;
    }

    .mvv2-item {
      margin-bottom: 1.5rem;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .mvv2-icon {
      margin-right: 0;
      margin-bottom: 8px;
    }
  }

  @media (max-width: 576px) {
    .mvv2-big {
      width: 106%;
      height: auto;
      margin-bottom: -50px;
      border-radius: 10px;
    }
    

    .mvv2-title {
      font-size: 1.5rem;
    }

    .mvv2-desc {
      font-size: 0.9rem;
    }
  }

  /* Tablet (768px - 992px) */
  @media (min-width: 768px) and (max-width: 992px) {
    .mvv2-title {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .mvv2-desc {
      font-size: 1rem;
      margin: 0 20px 25px;
    }

    .mvv2-items {
      margin: 0 20px;
    }
  }
</style>
