@extends('theme.default.layout')

@section('content')
    @foreach ($home_page_sections as $section)
        <div>
            @if ($section['enabled'] && $section['view'])
                @include($section['view'], [
                    'section' => $section,
                ])
            @endif
        </div>
    @endforeach

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

        // jQuery("a.bla-1").YouTubePopUp();
    </script>
@endsection
