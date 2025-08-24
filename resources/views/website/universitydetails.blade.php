@extends("layouts.master")
@section('content')

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


    <?php
    //$content = "Country:USA<br /> Proficiency Test:IELTS, PTE<br /> Degree: A,B";
    $content = $slug2->long_content;

    // Split the content by <br /> to separate each part
    $parts = explode('<br />', $content);

    $result = [];
    foreach ($parts as $part) {
        // Split each part by ":" to separate the key and value
        $pair = explode(':', $part, 2);

        // Trim whitespace from the key and value
        $key = trim($pair[0]);
        $value = isset($pair[1]) ? trim($pair[1]) : '';

        // $result[$key] = $value;
        $result[] = $value;
    }

    // Now $result contains an associative array with keys "Country", "Proficiency Test", and "Degree"
    // and their respective values
    // print_r($result[0]);
    //Array ( [Country] => USA [Proficiency Test] => IELTS, PTE [Degree] => A,B )
    ?>

    <!-- Universities Start -->
    <div class="container-xxl py-6" style="background-color: white;">
        <div class="uni-page-container">
            <div class="uni-page-content antim">
                <div class="uni-page-title">Know More</div>
                <div class="uni-page-description tuantim">{{$slug2->childs->first()->short_content ?? ""}}</div>
                <div class="uni-page-info">
                    <div class="uni-page-info-item">
                        <span class="uni-page-info-label">Country:</span>
                        <span class="uni-page-info-value">{{$result[0]}}</span>
                    </div>
                    <div class="uni-page-info-item">
                        <span class="uni-page-info-label">Proficiency Test:</span>
                        <span class="uni-page-info-value">{{$result[1]}}</span>
                    </div>
                </div>
            </div>

            <div class="uni-page-image-container imgantim">
                <img class="uni-page-image" src="{{$slug2->banner_image ?? ""}}" alt="Adelphi University Logo">
            </div>
        </div>
        <div class="container">
            <div class="uni-page-header">
                <div class="uni-page-header-title">Faculty</div>
                <div class="uni-page-header-description">Here are the details of courses offered by this university.
                </div>
            </div>
            <div class="uni-page-container uni-page-faculty">
                {!! htmlspecialchars_decode($slug2->childs->first()->long_content ?? "") !!}
                {{-- <div class="uni-page-faculty">
                    <div class="uni-page-faculty-title">Faculty 1</div>
                    <div class="uni-page-faculty-description">In Australia, international students can apply for
                        permission to work. Students are permitted to work 20 hours a week and full-time during
                        vacations. If you are studying master's or doctorate courses under subclass 574, then you are
                        permitted to work unlimited hours a week.</div>
                </div>
                <div class="uni-page-faculty">
                    <div class="uni-page-faculty-title">Faculty 2</div>
                    <div class="uni-page-faculty-description">Process to obtain Australian Student Visa for
                        international students:
                        <br>Any person who intends to undertake full-time study in a registered course in Australia
                        needs to obtain an Australian Student Visa. A Student Visa permits the holder to travel to,
                        enter, and remain in Australia for the duration of the registered course of study. Overseas
                        students cannot undertake part-time study in Australia and must leave Australia on completion of
                        their course of study.
                    </div>
                </div>
                <div class="uni-page-faculty">
                    <div class="uni-page-faculty-title">Faculty 3</div>
                    <div class="uni-page-faculty-description">Student visa applicants from India, Nepal, and Bhutan are
                        required to undergo a Pre-Visa Assessment (PVA).</div>
                </div> --}}
            </div>
            {{-- <div class="uni-page-table table-responsive">

                <table class="table ">
                    <thead>
                        <tr class="table-active">
                            <th scope="col">Intake</th>
                            <th scope="col">Deadlines</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">September / October</td>
                            <td>January to May</td>
                        </tr>
                        <tr>
                            <td scope="row">January / February</td>
                            <td>September to November</td>
                        </tr>
                        <tr>
                            <td scope="row">Rolling Admissions</td>
                            <td>No Fixed deadline varies by university</td>
                        </tr>
                    </tbody>
                </table>
                <div class="uni-page-table-section">
                    <div class="uni-page-table-title">Intake</div>
                    <div class="uni-page-table-content">
                        <div class="uni-page-table-item">September / October</div>
                        <div class="uni-page-table-item">January / February</div>
                        <div class="uni-page-table-item">Rolling Admissions</div>
                    </div>
                </div>
                <div class="uni-page-table-section">
                    <div class="uni-page-table-title">Deadlines</div>
                    <div class="uni-page-table-content">
                        <div class="uni-page-table-item">January to May</div>
                        <div class="uni-page-table-item">September to November</div>
                        <div class="uni-page-table-item">No fixed deadline; varies by university</div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
<!--End Universities Start -->