<!-- header slider start -->
<header class="header_slider carousel slide carousel-fade" id="header_slider" data-ride="carousel"
    style="background: {{ $section['background'] }}">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}"  style="max-height:{{ get_option('frontend_slider_height') == '' ? '500px' : get_option('frontend_slider_height') }}" >
                <img src="{{ $slider->image != '' ? asset('uploads/media/' . $slider->image) : asset('uploads/no_image.jpg') }}"
                    alt="{{ $slider->image }}">
                <div class="carousel_cover">
                    <div class="container">
                        <article class="header_article animate__animated animate__slideInUp">
                            <h2>{{ $slider->title }}</h2>
                          
                        </article>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</header>
<!-- header slider end -->
