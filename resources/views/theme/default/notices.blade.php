@extends('theme.default.layout')

@section('content')
    <!-- header slider start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ _lang('Notice') }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ trans('Home') }}</a></li>
                        <li>{{ _lang('Notice') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="notice_section">
        <div class="container">
            <div class="section_title">
                <h3>{{ _lang('Notice') }}</h3>

            </div>
            <div class="row">
                @foreach ($notices as $notice)
                    <div class="col-lg-4 col-sm-6">
                        <div class="notice_content aos-init aos-animate" data-aos="fade-up">
                            <img src="{{ asset('uploads/media/' . $notice->featured_image) }}">
                            <div class="notice_article">
                                <a href="{{ route('singlePost', $notice->slug) }}" class="link_cover"></a>
                                <div class="bottom_text">
                                    <h3>{{ $notice->content[0]->post_title }}</h3>
                                    {!! substr(strip_tags($notice->content[0]->post_content), 0, 200) !!}...<span class="read_more">

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
@endsection
