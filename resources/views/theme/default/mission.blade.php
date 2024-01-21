@extends('theme.default.layout')

@section('content')

<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Mission</h2>
                <ul>
                    <li><a href="{{route('index')}}">{{__("Home")}}</a></li>
                    <li>Mission</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- second header end -->



<!-- single page start -->
<section class="single_page">
    <div class="container">
            </div>
    
    <div class="container">
        <div class="page_article">
                                                                    <p  center;"><strong>প্রেরণ-কর্ম (Mission)</strong></p>
<p><br />নটর ডেম কলেজ ময়মনসিংহ যথোপযুক্ত শিক্ষার পরিবেশে তত্ত্ব ও ব্যবহারিক ক্লাস এবং সহ-শিক্ষা কার্যক্রমের মাধ্যমে গ্রাম ও শহরের বিভিন্ন জায়গা থেকে আসা শিক্ষার্থীদের জন্যে মানসম্পন্ন ও গুণগত শিক্ষা দান করে থাকে। এই কলেজ শিক্ষার্থীদের উদ্ভাবনী ও গুণগত জীবন-ব্যাপী শিক্ষা দান করে যা তাদের জীবনকে সফলতার পথে পরিচালিত করে।</p>
<p>&nbsp;</p>        </p>
    </div>
</section>



<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>-->
<!-- youbube popup -->

<!-- aos animate js -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- include js -->
<script>
    /* aos animate */
    AOS.init({duration: 700,})

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
