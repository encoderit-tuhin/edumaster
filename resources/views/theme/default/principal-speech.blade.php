@extends('theme.default.layout')

@section('content')
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ $page->data->page_title }}</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">{{ trans('Home') }}</a></li>
                        <li>{{ $page->data->page_title }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <section class="teacher_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="teacher_box">
                        <img src="{{ asset('uploads/images/teachers/principal.jpg') }}" alt="">
                        <h5>{{ __('Fr. Thadeus Hembrom, CSC') }}</h5>
                        <p>{{ __('Principal') }} </p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="teacher_info">
                        {!! $page->data->page_content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
