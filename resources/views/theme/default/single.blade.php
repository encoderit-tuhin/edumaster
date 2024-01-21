@extends('theme.default.layout')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ $post->content[0]->post_title }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ trans('Home') }}</a></li>
                        <li>{{ $post->content[0]->post_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- single page start -->
    <section class="single_page">
        <div class="container">
            <div class="page_article">
                <div class="">
                    <img class="mt-3" style="max-height:350px; max-width: 100%"
                        src="{{ $post->featured_image != '' ? asset('uploads/media/' . $post->featured_image) : asset('uploads/no_image.jpg') }}"
                        alt="" />
                    <div style="max-width: 100%">
                        {!! $post->content[0]->post_content !!}
                    </div>
                </div>
            </div>
            <a href="{{ asset('uploads/media/' . $post->featured_image) }}" download=""
                title="https://ndcm.edu.bd/Admission_Infomation" class="download_btn" target="_blank">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    </section>

    <style>
        .single_page .download_btn:hover {
            background: #08336D;
            color: #fff;
        }

        .single_page .download_btn {
            display: inline-block;
            background: #0B499D;
            transition: all .2s;
            align-items: center;
            color: #fff;
            font-size: 13px;
            padding: 8px 15px;
            border-radius: 2px;
        }

        .single_page .download_btn i {
            display: inline-block;
            font-size: 10px;
            margin-top: -3px;
            margin-right: 5px;
            vertical-align: middle;
        }
    </style>

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
