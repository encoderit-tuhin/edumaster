@extends('theme.default.layout')

@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}">
@endsection

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ __('Video Gallery') }}</h2>
                    <ul>
                        <li><a href="https://ndcm.edu.bd/">{{ __('Home') }}</a></li>
                        <li>{{ __('Video Gallery') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- gallery section start -->
    <section class="gallery_section">
        <div class="container">
            <div class="row">

                @if ($medias->isEmpty())
                    <div class="col-12">
                        <h4 class="text-danger text-center">No Video Found</h4>
                    </div>
                @else
                    @foreach ($medias as $media)
                        <div class="col-lg-4 col-sm-6">
                            <figure class="gallery_content">
                                <div class="gallery_video">
                                    <iframe width="100%" height="100%" src="{{ $media->file }}" frameborder="0"
                                        allowfullscreen=""></iframe>
                                </div>
                                <h5 class="gallery_title"></h5>
                            </figure>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection
