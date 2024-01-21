<!-- speech section start -->
<section class="speech_section" style="background: {{ $section['background'] }}">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="designation_box" data-aos="fade-right">
                    <img src="{{ asset('uploads/images/teachers/principal.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="speech_content" data-aos="fade-left">
                    <div class="speech_header">
                        <h4>{{ __('Fr. Thadeus Hembrom, CSC') }}</h4>
                        <p>{{ __('Principal') }} </p>
                    </div>
                    <div class="speech_article">
                        @isset($principalSpeech->page_content)
                            {!! substr($principalSpeech->page_content, 0, 1000) !!}...
                        @endisset
                        <div>
                            <a class='read_more' href={{ url('page/principal-speech') }}>
                                {{ __('Read more') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- speech section end -->
