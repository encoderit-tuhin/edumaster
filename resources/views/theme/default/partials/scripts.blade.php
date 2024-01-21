
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>-->
<!-- youbube popup -->

<!-- aos animate js -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

<script>
    flatpickr("#from-datepicker", {
        dateFormat: "Y-m-d",
    });

    flatpickr("#to-datepicker", {
        dateFormat: "Y-m-d",
    });
</script>