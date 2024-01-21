@extends('theme.default.layout')

@section('content')
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ __('Contact') }}</h2>
                    <ul>
                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Contact') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ __('Message sent successfully!') }}
        </div>
    @endif

    <!--map section start-->
    <section class="map_section">
        <div class="container">
            {!! get_option('google_map') !!}
        </div>
    </section>
    <!--maps section end-->



    <!-- contact section strat -->
    <section class="contact_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact_info">
                        <div class="address">
                            <h2>{{ __('Where to Find Us') }}</h2>
                            <p> {!! get_option('google_map') !!}</p>
                            <a href="{!! get_option('on_google_map') !!}" target="_blank">{{ __('On Google Map') }}</a>
                        </div>
                        <article>
                            <h3>{{ __('Hear our voice') }}</h3>
                            <p>{{ __('Say hello') }} <a href="tel:{!! get_option('phone') !!}">{!! get_option('phone') !!}</a></p>
                        </article>
                        <article>
                            <h3>{{ __('Information') }}</h3>
                            <p><a href="mailto:{!! get_option('email') !!}">{!! get_option('email') !!}</a></p>
                        </article>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="request_form">
                        <h2>
                            {{ __('Reach out to us') }}</h2>


                        <form action="{{ route('contact.store') }}" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 required">
                                    <label for="first_name"> {{ __('Name') }}</label>
                                    <input type="text" id="first_name" name="name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 required">
                                    <label for="email">{{ __('Email') }}</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6 required">
                                    <label for="phone_number">{{ __('Phone') }}</label>
                                    <input type="text" id="phone_number" name="phone" class="form-control" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="description">{{ __('Your Message') }}</label>
                                    <textarea id="description" name="message" class="form-control" rows="5" required></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <div class="g-recaptcha" data-sitekey="6Ldc9DsjAAAAAOcawrln1Ft70zjOW46dDWuemSo1">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" name="msg_submit" value="Send"
                                        class="btn btn-primary">{{ __('Send Message') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.onload = function() {
            var $recaptcha = document.querySelector('#g-recaptcha-response');
            if ($recaptcha) {
                $recaptcha.setAttribute("required", "required");
            }
        };
    </script>
@endsection
