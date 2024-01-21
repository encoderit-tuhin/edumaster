<!-- mujib slider section start -->
<section class="notice_section" id="mujib_slider" data-ride="carousel"
    style="background: {{ $section['background'] }} !important">
    <div class="container my-2 py-2 ">
        <div class="row ">
            <div class="col-md-6">
                <div class="section_title">
                    <h3>{{ __('Mujib Gallery') }}</h3>
                </div>

                <div id="carouselMujibSectionIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselMujibSectionIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselMujibSectionIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselMujibSectionIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @foreach ($mujibGalleries as $key => $slider)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img src="{{ $slider->file != '' ? asset('uploads/media_files/' . $slider->file) : asset('uploads/no_file.jpg') }}"
                                    alt="{{ $slider->file }}" style="height: 270px;" />
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselMujibSectionIndicators" role="button"
                        data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselMujibSectionIndicators" role="button"
                        data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="section_title">
                    <h3>{{ __('Sheikh Russell Quiz Competition') }}</h3>
                </div>

                <div class="">
                    @isset($quizCompetition->page_content)
                        {!! $quizCompetition->page_content !!}
                    @endisset
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mujib slider section end -->
