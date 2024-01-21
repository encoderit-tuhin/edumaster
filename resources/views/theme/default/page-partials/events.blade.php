<!-- events section start -->
<section class="notice_section" style="background: {{ $section['background'] }}">
    <div class="container">
        <div class="section_title">
            <h3>{{ __('News & Events') }}</h3>
            <a href="{{ route('allNews') }}" class="btn"><i class="fas fa-plus"></i> {{ __('View all') }}</a>
        </div>
        <div class="row">
            @foreach ($news as $item)
                <div class="col-lg-4 col-sm-6">
                    <div class="notice_content aos-init aos-animate" data-aos="fade-up">
                        <img src="{{ asset('uploads/media/' . $item->featured_image) }}">
                        <div class="notice_article">
                            <a href="{{ route('singlePost', $item->slug) }}" class="link_cover"></a>
                            <div class="bottom_text">
                                <h3>{{ $item->content[0]->post_title }}</h3>
                                {!! substr(strip_tags($item->content[0]->post_content), 0, 200) !!}...
                                <span class="read_more">
                                    <i class="fas fa-arrow-right"></i>
                                    <span>{{ __('Read more') }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- events section end -->
