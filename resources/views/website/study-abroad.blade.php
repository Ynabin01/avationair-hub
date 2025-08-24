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
  
    <!-- Study-abroad Start -->
    <div class="container-xxl py-6" style="background-color: white;">
        @if (isset($slug2->childs[0]))

        <div class="about-country-a">
            <div class="content">
                <div class="title">{{$slug2->childs[0]->caption}}</div>
                <div class="paragraphs">
                    <div class="paragraph">{!! htmlspecialchars_decode($slug2->childs[0]->long_content) !!}</div>
                </div>
            </div>
            <img class="image" src="{{$slug2->childs[0]->banner_image}}" alt="About Australia Image" />
        </div>
        @endif

        @if (isset($slug2->childs[1]))

            <div class="kar-dosar-color" style="background-color: rgb(243, 246, 248); margin-top: 30px; padding: 3px 0px 40px 0px;">

                <div class="header-a-page-k">
                    <div class="title">{{$slug2->childs[1]->caption}}</div>
                    <div class="description">{{$slug2->childs[1]->short_content}}</div>
                </div>
                
                <div class="container know-more-about-a">
                    <div class="section know-more-about-a">
                        <div class="row abroad-col">
                            <div class="subsection know-more-about-a col-xs-12">
                                @php 
                                $listCount = count($slug2->childs[1]->childs);
                                $middleIndex = intdiv($listCount, 2); // Calculate middle index using integer division
                            @endphp
                            
                            @php $test = 0 @endphp
                            @foreach ($slug2->childs[1]->childs as $index => $lists)
                                <div class="sub-content know-more-about-a">
                                    <div class="sub-title know-more-about-a">{{$lists->caption}}</div>
                                    <div class="sub-paragraph know-more-about-a">{!! htmlspecialchars_decode($lists->short_content) !!}</div>
                                </div>
                                @if ($loop->iteration == $middleIndex + 1)
                                    @php $test++ @endphp
                                    </div>
                                    <div class="subsection know-more-about-a col-xs-12">
                                @endif
                            @endforeach
                            @if ($test != 0)
                                </div>  
                            @endif
                            

                            {{-- <div class="sub-content know-more-about-a">
                                <div class="sub-title know-more-about-a">Student Visa Process</div>
                                <div class="sub-paragraph know-more-about-a">Process to obtain Australian Student Visa for
                                    international students
                                    <br />Any person who intends to undertake full-time study in a registered course in
                                    Australia needs to obtain a Australian Student Visa. A Student Visa permits the holder to
                                    travel to, enter and remain in Australia for the duration of the registered course of study.
                                    Overseas students cannot undertake part-time study in Australia and must leave Australia on
                                    completion of their course of study.
                                </div>
                            </div>
                            <div class="sub-content know-more-about-a">
                                <div class="sub-title know-more-about-a">Processing Times</div>
                                <div class="sub-paragraph know-more-about-a">Student applicants should lodge applications no
                                    more than 3 months and at least 8 weeks before course commencement dates. Some applications
                                    take longer to process. Students may be asked to undertake further medicals and some delays
                                    may be experienced due to the need to verify bank or education documents. Nepalese and
                                    Bhutanese applicants need to take into account the time taken for documents and letters to
                                    be sent and received by the Visa Office.
                                    <br />To be granted a student visa you will need
                                </div>
                            </div> --}}
                        {{-- </div>
                        <div class="subsection know-more-about-a">
                            <div class="sub-content know-more-about-a">
                                <div class="sub-title know-more-about-a">Student Visa Processing</div>
                                <div class="sub-paragraph know-more-about-a">Student visa applicants from India, Nepal and
                                    Bhutan are required to undergo a Pre-Visa Assessment (PVA).</div>
                            </div>
                            <div class="sub-content know-more-about-a">
                                <div class="sub-title know-more-about-a">Application</div>
                                <div class="sub-paragraph know-more-about-a">Persons wishing to study in Australia should apply
                                    on form 157A and pay the current visa application charge.</div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        @endif

        @if (isset($slug2->childs[2]))
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s"
                style="margin-top: 20px; margin-bottom: -20px;">

                <div class="container" style="margin-bottom: 40px;">
                    <div class="row g-5">
                        <div class="row">
                            <div class="col-lg-6 order-lg-1 order-2" style="margin-top: 24px">
                                <div class="position-relative h-100">
                                    <img class="wow zoomIn img-fluid" data-wow-delay="0.9s" src="{{$slug2->childs[2]->banner_image}}"
                                        alt="Image"
                                        style=" margin-left: 30px; width: 80%; height: 110%; margin-bottom: 20px; display: block; max-width: 80%;" />
                                </div>
                            </div>

                            <div class="col-lg-6 order-lg-2 order-1 right-kani" style="margin-top: 80px">
                                <div class="studyk-mobile-me"
                                    style="width: 100%; color: #212529; font-size: 24px; font-family: Montserrat; font-weight: 500; line-height: 31.20px; margin-top: -45px; word-wrap: break-word">
                                    {{$slug2->childs[2]->long_content}}</div>
                                <div
                                    style="max-width: 100%; word-wrap: break-word; color: #3d3d3d; font-size: 14px; font-family: Outfit; font-weight: 400; line-height: 30px;">
                                    @foreach ($slug2->childs[2]->childs as $subsubsub)
                                                            
                                    <div class="left-icon-main" style="display: flex; gap: 8px; ">
                                        <div class="left-icon"
                                            style=" width: 20px; height: 20px; border-radius: 50%; border: 2px solid #3d3d3d; display: flex; align-items: center; justify-content: center;">
                                            <div
                                                style="width: 12px; height: 12px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                                                <span
                                                    style="color: #3d3d3d; font-size: 10px; line-height: 1; font-weight: bold">&rarr;</span>
                                            </div>
                                        </div>
                                        <div style="flex: 1">
                                            {{$subsubsub->short_content}}
                                            {{-- Purpose: Surgical masks are designed to provide a barrier and protection
                                            against respiratory droplets, including those carrying bacteria and viruses. --}}
                                        </div>
                                    </div>
                                @endforeach

                                    <!-- Repeat the same structure for other points -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (isset($slug2->childs[3]))

            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" style="background-color: #F3F6F8;">
                <div class="faq-title">{{$slug2->childs[3]->caption}}</div>
                <div class="faq-container">
                    @foreach($slug2->childs[3]->childs as $sub)
                        <div class="std-faq">
                            <div class="question">
                            {{$sub->short_content}}
                                <i class="fas fa-chevron-down "></i>
                            </div>
                            <div class="answer">
                                {!! htmlspecialchars_decode($sub->long_content) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @php
            use App\Models\NavigationItems;
            if (isset($slug2->childs[4])){
                $photos = NavigationItems::query()->where('navigation_id',$slug2->childs[4]->id)->latest()->get();
            }
        @endphp
       @if (isset($slug2->childs[4]))
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container">
                    <div class="title text-center mb-4">{{$slug2->childs[4]->caption}}</div>
                    <div class="row justify-content-center">
                        @foreach ($photos as $sub)
                            <!-- Repeat 6 logos -->
                            <div class="col-6 col-md-4 col-lg-2 mb-4">
                                <div class="university">
                                    <img src="/uploads/photo_gallery/{{ $sub->file }}" alt="University Logo" class="img-fluid">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-4">
                        <a href="/universities" class="btn btn-primary">Find More Universities</a>
                    </div>
                </div>
            </div>
        @endif


    </div>


    <!--End Study-abroad   -->



        @endsection

  