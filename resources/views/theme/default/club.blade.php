

@extends('theme.default.layout')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ $club->name }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ trans('Home') }}</a></li>
                        <li>{{ __($club->name) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->



    <!-- single page start -->
    <section class="single_page">
        <div class="container">
            <div class="moderator_area">
                @if (isset($club->moderators[0]->user))
                    <div class="moderator_box">
                        @if ($club->moderators[0]->user->teacher)
                            <img src="{{ asset('uploads/images/' . ($club->moderators[0]->user->image ?? 'uploads/noimg.png')) }}"
                                alt="">
                            <h5>{{ $club->moderators[0]->user->name }}</h5>
                            <p>{{ __('Moderator') }}</p>
                            <p>{{ $club->moderators[0]->user->teacher->designation }}</p>
                        @endif
                    </div>
                @endif

                @if ($club->logo)
                    <div class="club_logo text-center">
                        <img src="{{ asset('uploads/images/clubs/' . $club->logo) }}" alt="">
                    </div>
                @endif
                @if (isset($club->moderators[1]->user))
                    @if ($club->moderators[1]->user->teacher)
                        <div class="moderator_box">

                            <img src="{{ $club->moderators[1]->user->teacher->image }}" alt="">
                            <h5>{{ $club->moderators[1]->user->name }}</h5>
                            <p>{{ __('Moderator') }}</p>
                            <p>{{ $club->moderators[1]->user->teacher->designation }}</p>

                        </div>
                    @endif
                @endif
            </div>
        </div>

        <div class="container">
            <div class="page_article">
                <img src="{{ asset('uploads/images/clubs/' . $club->banner_image) }}" alt="">
                <h3><strong>{{ $club->name }}</strong></h3>
                <h3>{{ __('Founding period') }}: {{ $club->foundation_date }}</h3>
                <p><strong>{{ __('Slogan') }}: {{ $club->slogan }}</strong></p>
                <div>
                    <p><strong>{{ __('A brief history of the club') }}:</strong>
                        {!! $club->history !!}
                    </p>

                    <p> <strong>{{ __('Mission Vision') }}:</strong>
                        <br>{!! $club->mission_vision !!}
                    </p>

                    <p> <strong>{{ __('Achievement') }}:</strong>
                        <br />
                        {!! $club->achievement !!}
                    </p>


                    @if ($club->activity)
                        <p><strong>{{ __('Activities') }}:</strong><br>
                            {!! $club->activity !!}
                        </p>
                    @endif
                    <p>{{ __('Facebook Page') }}:&nbsp;{{ $club->fb_link }}</p>
                </div>
                <p>&nbsp;</p>
                <p></p>
            </div>
        </div>

    </section>



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
