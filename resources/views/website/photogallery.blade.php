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
      <div class="b-title">{{$slug2->caption ?? $slug2}}</div>
    </div>
  </div>
  <!-- breadcrumb end -->

  <!-- gallery start -->
  <div class="container-xxl py-6">
    <div class="container">
      <div class="row-gallery-section">
        @foreach ($photos as $key => $photo)
          <div class="column">
            <img src="/uploads/photo_gallery/{{ $photo->file }}" class="myImg" alt="{{ $photo->caption }}"
              data-index="{{ $key }}">
          </div>
        @endforeach
      </div>
    </div>
  </div><br> <br>
  <!-- gallery end -->

  <!-- Modal -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <span class="prev">&#10094;</span>
    <span class="next">&#10095;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

@endsection

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    var images = document.getElementsByClassName("myImg");
    var currentIndex = 0;

    function showImage(index) {
      modal.style.display = "block";
      modalImg.src = images[index].src;
      captionText.innerHTML = images[index].alt;
      currentIndex = index;
    }

    for (let i = 0; i < images.length; i++) {
      images[i].onclick = function () {
        showImage(i);
      };
    }

    // Close modal
    var span = document.getElementsByClassName("close")[0];
    span.onclick = function () {
      modal.style.display = "none";
    };

    // Next / Prev
    document.querySelector(".next").onclick = function () {
      currentIndex = (currentIndex + 1) % images.length;
      showImage(currentIndex);
    };

    document.querySelector(".prev").onclick = function () {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      showImage(currentIndex);
    };

    // Click outside closes
    window.onclick = function (event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  });
</script>