@extends('theme.default.layout')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ __('Student Online Application') }}</h2>
                    <ul>
                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Student Online Application') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!-- student section start -->
    <section class="teacher_section">
        <div class="container">
            <div class="">
                @include('partials.student-online-application-part', [
                    'route' => route('student-online-registration.store'),
                    'method' => 'POST',
                    'student' => null,
                    'isEdit' => false,
                    'isAdmin' => false,
                ])
            </div>
        </div>
    </section>
    <!-- student section end -->
@endsection
