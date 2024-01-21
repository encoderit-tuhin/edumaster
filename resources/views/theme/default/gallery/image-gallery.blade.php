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
                @if ($groupedMedias->isEmpty())
                    <div class="col-12">
                        <h4 class="text-danger text-center">No Image Found</h4>
                    </div>
                @else
                    @foreach ($groupedMedias as $year => $images)
                        <div class="col-lg-3">
                            <a class="text-center" href="{{ route('image-gallery.show', $year) }}">
                                <div class="card bg-primary text-white" style="border-radius: 30px;">
                                    <div class="card-body">
                                        <h5 class="card-title" style="font-size: 48px; bold-weight: bold;">
                                            {{ $year }}
                                        </h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- gallery section end -->
@endsection
