@extends("layouts.master")
@section('content')
 

 <!-- breadcrumb start -->
 <!-- <div class="container-xxl bg-primary page-header"
        style="background-image: url('/website/img/public/xx.jpg'); background-size: cover; background-position: center;">
        <div class="container">
            <div class="bread-container">
                <div>Home</div>
                <div class="divider"> / </div>
                <div>universities status </div>
            </div>
            <div class="b-title">Universities Status</div>
        </div>
    </div> -->

    <!-- breadcrumb end -->

    <!-- Universities Start -->
    <div class="container-xxl py-6" style="background-color: #fff;">
        <div class="container">
            <div class="univ-container">
                <div class="personal-details apply-n" style="width: 100%;">
                    <div class="input-fields apply-n">
                        <div class="input-field apply-n">
                            <div class="label apply-n">Country</div>
                            <!-- Replace input type="text" with select element -->
                            <select style=" font-weight: 400; font-size: 12px; font-family: Inter; height: 38px; border-radius: 4px; border: 1px solid rgba(61, 61, 61, 0.24); ">
                                <!-- Add options for countries -->
                                <option value="" selected disabled>Select...</option>
                                <option value="country1">Country 1</option>
                                <option value="country2">Country 2</option>
                                <!-- Add more options for other countries -->
                            </select>
                        </div>
                        <div class="input-field apply-n">
                            <div class="label apply-n">Degree</div>
                            <select type="text"
                                style="font-weight: 400; font-size: 12px; font-family: Inter; height: 38px; border-radius: 4px; border: 1px solid rgba(61, 61, 61, 0.24);">
                                <!-- Add options for countries -->
                                <option value="" selected disabled>Select...</option>
                                <option value="country1">Country 1</option>
                                <option value="country2">Country 2</option>
                                <!-- Add more options for other countries -->
                            </select>
                        </div>
                        <div class="input-field apply-n">
                            <div class="label apply-n">English Proficiency Test</div>
                            <select type="text"
                                style=" font-weight: 400; font-size: 12px; font-family: Inter; height: 38px; border-radius: 4px; border: 1px solid rgba(61, 61, 61, 0.24);">
                                <!-- Add options for countries -->
                                <option value="" selected disabled>Select...</option>
                                <option value="country1">Country 1</option>
                                <option value="country2">Country 2</option>
                                <!-- Add more options for other countries -->
                            </select>
                        </div>

                    </div>
                </div>
            </div>
            <div class="center-section">
                <img class="centered-image search-image" src="img/public/search-img.PNG"
                    alt="Description of your image">
            </div>
        </div>
    </div>
@endsection
    <!--End Universities Start -->
     