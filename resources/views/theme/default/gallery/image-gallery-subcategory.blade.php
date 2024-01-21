@extends('theme.default.layout')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/gallery.css') }}">
@endsection

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ __('Images Gallery') }}</h2>
                    <ul>
                        <li><a href="">{{ __('Home') }}</a></li>
                        <li>{{ __('Images Gallery') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- gallery section start -->
    <section class="gallery_section">
        <div class="container">
            <div class="row g-3">

                @if ($medias->isEmpty())
                    <div class="col-12">
                        <h4 class="text-danger text-center">No Sub-Category Found</h4>
                    </div>
                @else
                    @foreach ($medias as $media)
                        <div class="col-lg-4 col-sm-6">
                            <div class="gallery_content">
                                <div class="gallery_img">
                                    <img src="{{ asset('uploads/media_files/' . $media->file) }}" alt="">
                                    <a href="{{ asset('uploads/media_files/' . $media->file) }}" data-lightbox="image-1">
                                        <i class="icon ion-md-add"></i>
                                    </a>
                                </div>
                                <h5 class="gallery_title">{{ optional($media->mediaSubCategory)->name }}</h5>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
@endsection
