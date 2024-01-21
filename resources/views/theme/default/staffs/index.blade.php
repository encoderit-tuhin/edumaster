@extends('theme.default.layout')

@section('styles')
    <link rel="stylesheet" href="https://ndcm.edu.bd/public/frontend/style/department.css">
@endsection

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{__("Departmental Staff Information")}}</h2>
                    <ul>
                        <li><a href="{{route('index')}}">{{__("Home")}}</a></li>
                        <li>{{__("Departmental Staff")}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!--  department section start  -->
    <section class="department_section">
        <div class="container">
            <div class="row">
                @foreach ($staff_departments as $department)
                    <div class="col-lg-3 col-md-4 col-6">
                        <a href="{{ route('staff-department', $department->slug) }}" class="department_box">
                            <h4>{{__("Department of")}}</h4>
                            <h5>{{ __($department->value) }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- department page end -->


    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>-->
    <!-- youbube popup -->
    
    <!-- aos animate js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- include js -->
    <script>
        /* aos animate */
        AOS.init({
            duration: 700,
        })

        /* carousel js */
        $('.carousel').carousel({
            interval: false,
            interval: 5000,
            pause: "false"
        });

        /* download carousel */
        // $('.download_carousel').owlCarousel({
        //     autoplayTimeout:5000,
        //     autoplay:true,
        //     margin: 30,
        //     dots:false,
        //     loop:true,
        //     nav:false,
        //     responsive:{
        //         1200:{items:4},
        //         991:{items:3},
        //         768:{items:2},
        //         0:{items:1}
        //     }
        // });

        /* YouTubePopUp */
        // jQuery("a.bla-1").YouTubePopUp();
    </script>
@endsection
