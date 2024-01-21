@extends('theme.default.layout')

@section('content')





<!-- second header start -->
<header class="second_header">
    <div class="cover">
        <div class="container">
            <div class="header_content">
                <h2>Explanation of Nomenclature</h2>
                <ul>
                    <li><a href="{{route('index')}}">{{__("Home")}}</a></li>
                    <li>Explanation of Nomenclature</li>
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
                                                                    <p><span  #000080;"><strong>নামকরণ ও প্রতীকের ব্যাখ্যা (Explanation of Nomenclature)</strong></span></p>
<p><br />যে কোন প্রতিষ্ঠানের নামকরনের পিছনে কোন ইতিহাস বা উদ্দেশ্য নিহিত থাকে। প্রতিষ্ঠানের উদ্দেশ্য, নীতি ও আদর্শ নামকরণের মধ্য দিয়েই প্রকাশ পায়। নটর ডেম (Notre Dame) শব্দ দুটি ফরাসি ভাষা থেকে নেওয়া। ইংরেজিতে-এর অনুবাদ হয় Our Lady। রোমান ক্যাথলিক খ্রিস্টানগণের মতে Our Lady বলতে যিশু খ্রিস্টের জননী মরিয়ম বা মাতা মেরীকে বুঝানো হয়। নটর ডেম কলেজ সেই মহীয়সী নারী মাতা মেরীর নামে উৎসর্গীকৃত। যিশু খ্রিস্টের জ্ঞানে ও বয়সে, ঈশ্বর&nbsp;ও মানুষের ভালোবাসা এবং মানবিক বিকাশ লাভে মাতা মেরীর ভূমিকা ছিল অনন্য।</p>
<p>নটর ডেম কলেজের মূল নীতিকে যে কথার দ্বারা প্রকাশ করা হয়েছে তা হল Diligite Lumen Sapientiae এ হচ্ছে ল্যাটিন ভাষা, যার ইংরেজি অনুবাদ হচ্ছে, Love the light of wisdom, অর্থাৎ জ্ঞানের আলোকে ভালোবাসা। সৃষ্টিকর্তা ঈশ্বর হচ্ছেন সকল জ্ঞানের উৎস। জ্ঞান (Sapientiae) শব্দটি কলেজের আসল উদ্দেশ্য প্রকাশ করে। শুধু বই পুস্তক পড়ে তত্ত্ব আহরণ করা নয় বরং জ্ঞানের উৎস স্রস্টাকে অর্থাৎ পরম করুণাময় ঈশ্বরকে&nbsp;লাভ করার উপায় জানতে সহায়তা করাও নটর ডেম কলেজের অন্যতম উদ্দেশ্য। Lumen শব্দটি অর্থ হচ্ছে আলো। আলো অন্ধকারকে দূরীভূত করে মানুষকে পথ চলার দৃষ্টিশক্তি দান করে এবং ভালোমন্দের পার্থক্য বোঝার ক্ষমতা দেয়। Diligite শব্দটি হচ্ছে অনুজ্ঞাসূচক, যার অর্থ ভালোবাসা। জ্ঞান যেহেতু কল্যাণকর, যেহেতু ভালোবাসা নিয়ে জ্ঞান আহরণ করতে হবে।</p>
<p>কলেজের প্রতীকের মাঝখানে রয়েছে একটি খোলা পুস্তক, যার এক পৃষ্ঠায় লেখা রয়েছে আলফা অর্থাৎ গ্রিক বর্ণমালার আদি অক্ষর এবং অপর পৃষ্ঠায় লেখা রয়েছে ওমেগা অর্থাৎ বর্ণমালার অন্ত অক্ষর। ঈশ^র হচ্ছেন সব কিছুর আদি ও অন্ত। তাঁকে জানাটাই হচ্ছে প্রকৃত জ্ঞান। বই হচ্ছে জ্ঞানের বাহক বা প্রতিনিধি।</p>
<p>কলেজের প্রতীকে রয়েছে তিনটি ক্ষেত্র। বাম দিকের ক্ষেত্রটিতে দেখা যায় ৭টি ফুলের চিত্র। এখানে ফুল হচ্ছে বিশুদ্ধতার প্রতীক । ডান দিকের ক্ষেত্রটি বাংলাদেশের ভ&rsquo;মিতে কলেজটির অবস্থানের প্রতীক। আমদের এই দেশটি সবুজে-শ্যামলে সুন্দর। উদীয়মান সূর্য নতুন দিনের নতুন আশার প্রতীক। নিচের ক্ষেত্রটিতে আড়াআড়িভাবে বসানো নোঙরদ্বয়ের মাঝখানে স্থাপিত ক্রুশটি হলিক্রস সংঘের প্রতীক।</p>        </p>
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
