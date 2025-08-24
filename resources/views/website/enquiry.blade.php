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
            <div class="b-title">{{$slug1->caption ?? $slug1 }}</div>
        </div>
    </div>

    <!-- Navbar & Hero End -->
    <?php
    $country = [];
    $faculty = [];
    $education = [];
    $have_you_done = [];

    if (isset($slug1->long_content)) {
        $content = $slug1->long_content;
        // print_r($degree_one);

        // Split the content by <br /> to separate each part
        $parts = explode('<br />', $content);

        $i = 0;
        foreach ($parts as $part) {
            $i += 1;
            // Split each part by ":" to separate the key and value
            $pair = explode(':', $part, 2);

            // Trim whitespace from the key and value
            $key = trim($pair[0]);
            $value = isset($pair[1]) ? trim($pair[1]) : '';

            // $result[$key] = $value;
            if ($i == 1) {
                $countrys = explode(',', $value);
                foreach ($countrys as $deg) {
                    $country[] = trim($deg);
                }
            } elseif ($i == 2) {
                $proficiencys = explode(',', $value);
                foreach ($proficiencys as $deg) {
                    $faculty[] = trim($deg);
                }
            } elseif ($i == 3) {
                $educations = explode(',', $value);
                foreach ($educations as $deg) {
                    $education[] = trim($deg);
                }
            } elseif ($i == 4) {
                $have_you_dones = explode(',', $value);
                foreach ($have_you_dones as $deg) {
                    $have_you_done[] = trim($deg);
                }
            }


        }
    }

    // Remove duplicates and reindex the arrays
    $country = array_values(array_unique($country));
    $faculty = array_values(array_unique($faculty));
    $education = array_values(array_unique($education));
    $have_you_done = array_values(array_unique($have_you_done));

        ?>

    <div class="container-xxl py-6" style="background-color: white;">
        <form role="form" action="{{ route('appointmentstore') }}" method="post" id="contact-form"
            enctype='multipart/form-data'>
            @csrf
            <div class="container apply-n">
                <div class="personal-details apply-n">
                    <div class="label apply-n">Personal Details</div>
                    <div class="input-fields apply-n">
                        <div class="input-field apply-n">
                            <div class="label apply-n">Full Name</div>
                            <input type="text" name="name" placeholder=" ">
                        </div>
                        <div class="input-field apply-n">
                            <div class="label apply-n">Email</div>
                            <input type="email" name="email" placeholder=" ">
                        </div>
                        <div class="personal-details apply-n" style="width: 100%;">
                            <div class="input-fields apply-n">
                                <div class="input-field apply-n">
                                    <div class="label apply-n">Country</div>
                                    <!-- Replace input type="text" with select element -->
                                    <select
                                        style="height: 38px; border-radius: 4px; border: 1px solid rgba(61, 61, 61, 0.24);"
                                        name="country">
                                        <!-- Add options for countries -->
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($country as $c)
                                            <option value="{{$c}}">{{$c}}</option>
                                        @endforeach
                                        <!-- Add more options for other countries -->
                                    </select>
                                </div>
                                <div class="input-field apply-n">
                                    <div class="label apply-n">Faculty</div>
                                    <select type="text" name="faculty"
                                        style="height: 38px; border-radius: 4px; border: 1px solid rgba(61, 61, 61, 0.24);">
                                        <!-- Add options for countries -->
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($faculty as $c)
                                            <option value="{{$c}}">{{$c}}</option>
                                        @endforeach
                                        <!-- Add more options for other countries -->
                                    </select>
                                </div>
                                <div class="input-field apply-n">
                                    <div class="label apply-n">Phone No.</div>
                                    <input type="text" name="phone" placeholder=" ">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="education apply-n">
                    <div class="input-fields apply-n">
                        <div class="input-field apply-n">
                            <div class="label apply-n">Education Level</div>
                            <select type="text" name="edu_lvl"
                                style="border-radius: 4px; width: 30%; height: 38px; border: 1px solid rgba(61, 61, 61, 0.24);">
                                <!-- Add options for countries -->
                                <option value="" selected disabled>Select</option>
                                @foreach ($education as $c)
                                    <option value="{{$c}}">{{$c}}</option>
                                @endforeach
                                <!-- Add more options for other countries -->
                            </select>
                        </div>
                    </div>
                </div>

                <div class="checkbox-container">
                    <div class="label apply-n">Have You Done</div>
                    <div id="futkadu">
                        <div class="row">
                            @foreach ($have_you_done as $c)
                                {{-- <option value="{{$c}}">{{$c}}</option> --}}
                                <div class="agoago @if ($loop->iteration % 2 == 0) col-xs-6  @endif" style="width:120px">
                                    <label class="custom-checkbox" for="checkbox{{$loop->iteration}}">
                                        <input type="checkbox" name="have_you_done[]" value="{{$c}}"
                                            id="checkbox{{$loop->iteration}}">
                                        <span class="dot"></span> <!-- Red dot -->
                                        <span class="label-text futkau-cls">{{$c}}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="score apply-n">
                        <div class="input-fields apply-n" style="width: 20%;">
                            <div class="input-field apply-n">
                                <div class="label apply-n">Score</div>
                                <input type="text" name="score" placeholder="Enter your score">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="send-message apply-n">
                        <button type="submit">Send Message</button>
                    </div>
                </div>
        </form>
    </div>
    <script>
        // Get all agoago elements
        var agoagoElements = document.querySelectorAll('.agoago');

        // Loop through each agoago element
        agoagoElements.forEach(function (agoago) {
            // Get the text span element
            var textSpan = agoago.querySelector('.label-text');
            // Calculate the width based on the text length
            var textWidth = textSpan.offsetWidth;
            // Set the width of the agoago container
            agoago.style.width = textWidth + 35 + 'px'; // Adjust as needed
        });

    </script>


    <style>
        /* Hide the default checkbox */
        input[type="checkbox"] {
            display: none;
        }

        /* Style the custom checkbox container */
        .custom-checkbox {
            position: relative;
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #CF1312;
            /* Red border */
            background-color: transparent;

        }

        /* Style the custom checkbox dot (when checked) */
        .custom-checkbox input[type="checkbox"]:checked+.dot {
            display: block;
        }

        /* Style the dot */
        .dot {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 10px;
            height: 10px;
            background-color: #CF1312;
            /* Red dot */
            display: none;
        }
    </style>

@endsection