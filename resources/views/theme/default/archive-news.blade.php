@extends('theme.default.layout')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@section('content')
    <!-- header slider start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ _lang('News') }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ _lang('Home') }}</a></li>
                        <li>{{ _lang('News') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <section class="notice_section">
        <div class="container">
            <form action="{{ route('archiveNews.search') }}" method="post" class="hidden ng-pristine ng-valid">
                @csrf
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">

                            <input required type="text" class="form-control" name="from_date" id="from-datepicker"
                                placeholder="{{ __('From Date') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">

                            <input required type="text" class="form-control" name="to_date" id="to-datepicker"
                                placeholder="{{ __('To Date') }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input required type="text" class="form-control" name="searchKeyWord"
                                placeholder="{{ __('Search by title, description...') }}">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group p-1">

                            <button type="submit" class="btn btn-search btn-sm  btn btn-success"><i class="fa fa-search"
                                    aria-hidden="true"></i> {{ __('Search') }}</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Initialize Flatpickr -->
            <div class="section_title">
                <h3>{{ _lang('News') }}</h3>

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
                                    {!! substr(strip_tags($item->content[0]->post_content), 0, 200) !!}...<span class="read_more">

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
