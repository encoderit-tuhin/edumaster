@extends('theme.default.layout')

@section('content')
    <!-- second header start -->
    <header class="second_header">
        <div class="cover">
            <div class="container">
                <div class="header_content">
                    <h2>{{ __('Class routine') }}</h2>
                    <ul>
                        <li><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                        <li>{{ __('Class routine') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- second header end -->

    <!--  department section start  -->
    <section class="single_page">
        <div class="container">
        </div>

        <div class="container">
            <div class="page_article">
                <h2>{{ __('Class Routines') }}</h2>
                <p>{{ __('Select classes and section to view routine') }}</p>

                <div class="form-group">
                    @foreach ($classes as $class)
                        <button class="btn btn-light border class-button px-5 py-3 mx-2"
                            data-class-id="{{ $class->id }}">{{ __($class->class_name) }}</button>
                    @endforeach

                    <div class="form-group mt-3" id="section-buttons-container">
                    </div>

                    <div id="section-routine">
                        <div class="panel panel-default mt-2" data-collapsed="0">
                            <div class="panel-heading my-3">
                                <span class="panel-title" id="class_section_info"></span>
                            </div>
                            <div class="panel-body" id="routine-view">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('.class-button').click(function() {
            var classId = $(this).data('class-id');

            // Add active class to the clicked button
            $('.class-button').removeClass('active');
            $(this).addClass('active');

            $.ajax({
                url: '/get-sections/' + classId,
                method: 'GET',
                success: function(data) {
                    $('#section-buttons-container').empty();

                    $.each(data.buttons, function(index, button) {
                        var sectionButton = $('<button>', {
                            class: button.class,
                            'data-section': button.id,
                            text: button.text
                        });

                        $('#section-buttons-container').append(sectionButton);

                        sectionButton.click(function() {
                            var sectionId = button.id;

                            // Add active class to the clicked button
                            $('.section-button').removeClass('active');
                            $(this).addClass('active');

                            $.ajax({
                                url: '/get-section-routine/' + classId + '/' +
                                    sectionId,
                                method: 'GET',
                                success: function(data) {
                                    $('#routine-view').html(data);
                                },
                                error: function(error) {
                                    console.error(error);
                                }
                            });
                        });
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    </script>
@endsection
