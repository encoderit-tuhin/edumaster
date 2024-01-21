@extends('theme.default.layout')

@section('content')


<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Motto</h2>
                <ul>
                    <li><a href="">Home</a></li>
                    <li>Motto</li>
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
                                                                    <p><strong>মূলমন্ত্র (Motto)</strong></p>
<p>&nbsp;নটর ডেম কলেজ ময়মনসিংহ-এর মূলমন্ত্র হচ্ছে, জ্ঞান অন্বেষণ করো মানব সেবার তরে। এই মূলমন্ত্রের প্রতিপাদ্য হলো শুধু গ্রন্থগত বিদ্যায় সীমাবদ্ধ না থেকে প্রকৃত জ্ঞান অন্বেষী হয়ে মানব সেবায় ব্রতী হওয়া। ইংরেজি <em>Knowledge</em> শব্দের বাংলা হলো জ্ঞান। কলেজের নাম <em>Notre Dame</em>, ফরাসি ভাষা থেকে উদ্ভূত; যার ইংরেজি হলো <em>Our Lady</em> এবং বাংলায় মাতা মেরী। যীশু খ্রিস্টের জননী জ্ঞানের মাতা মেরী যেমন তাঁর পুত্রকে জ্ঞানে, বয়সে ও মানুষের ভালোবাসায় গড়ে তুলেছেন এবং মানব সেবায় ব্রতী হয়ে জীবন উৎসর্গ করতে অনুপ্রাণিত করেছেন, তেমনি মাতৃরূপ এই শিক্ষা প্রতিষ্ঠান প্রত্যেক Notredamian -কে অত্র কলেজের মূলমন্ত্রে দীক্ষিত হয়ে শিক্ষা লাভের মাধ্যমে প্রকৃত জ্ঞান অন্বেষণ করে মানবিক ও নৈতিক মূল্যবোধে উদ্বুদ্ধ হয়ে মানব সেবায় ব্রতী ব্যক্তিরূপে গড়ে তুলতে নিবেদিত।</p>
<p>&nbsp;</p>        </p>
    </div>
</section>
<!-- single page end -->

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
