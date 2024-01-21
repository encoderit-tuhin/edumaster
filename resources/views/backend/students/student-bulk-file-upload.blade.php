@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Students Bulk Upload') }}
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('students.bulk-upload') }}">
                            <i class="fa fa-upload"></i>
                            {{ _lang('Bulk Upload') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-6">

                        <form action="{{ route('students.bulk-file-upload.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label"
                                            style="margin: 5px 0;">{{ _lang('Academic Year') }}</label>
                                        <select class="form-control select2" name="academic_year" required>
                                            {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label" style="margin: 5px 0;">{{ _lang('Class') }}</label>
                                        <div class="">
                                            <select name="class" class="form-control select2" id="class" required>
                                                <option value="">{{ _lang('Select One') }}</option>
                                                {{ create_option('classes', 'id', 'class_name', old('class')) }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label" style="margin: 5px 0;">{{ _lang('Section') }}</label>
                                        <div class="">
                                            <select name="section" class="form-control select2" id="section"
                                                required>
                                                <option value="">{{ _lang('Select One') }}</option>
                                                @foreach ($sections as $data)
                                                    <option data-class="{{ $data->class_id }}"
                                                        value="{{ $data->id }}">
                                                        {{ $data->section_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label" style="margin: 5px 0;">{{ _lang('Group') }}</label>
                                        <div class="">
                                            <select name="group" class="form-control select2">
                                                <option value="">{{ _lang('Select One') }}</option>
                                                {{ create_option('student_groups', 'id', 'group_name', old('group')) }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label" style="margin: 5px 0;">
                                            {{ _lang('Excel File') }}
                                        </label>

                                        <div class="">
                                            <input type="file" class="form-control" name="xlsx_file" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default text-center">
                            <div class="panel-heading">
                                <h4>Sample Excel Format</h4>
                            </div>
                            <div class="panel-body" style="margin: 30px 0;">
                                <a href="{{ route('students.download.demo.file') }}">
                                    <i class="fa fa-file" style="font-size: 62px;"></i>

                                    <span style="display: block; margin: 15px 0;">File Type: (.xlsx, .csv)</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-script')
    <script>
        $(window).on('load', function() {
            $("#section").next().find("ul li").css("display", "none");
            $(document).on("change", "#class", function() {
                $("#section").next().find("ul li").css("display", "none");
                var class_id = $(this).val();
                $('#section option[data-class="' + class_id + '"]').each(function() {
                    var section_id = $(this).val();
                    $("#section").next().find("ul li[data-value='" + section_id + "']").css(
                        "display", "block");
                });
            });


            $(document).on('change', '#class', function() {
                load_option_subject();
            });

            function load_option_subject() {
                var class_id = $("#class").val();
                var link = "{{ url('students/get_subjects/') }}";
                $.ajax({
                    url: link + "/" + class_id,
                    success: function(data) {
                        $('#optional_subject').html(data);
                    }
                });
            }


            $('#guardian').select2({
                placeholder: "{{ _lang('Select One') }}",

                ajax: {
                    dataType: "json",
                    url: "{{ url('parents/get_parents') }}",
                    delay: 400,
                    data: function(params) {
                        return {
                            term: params.term
                        }
                    },
                    processResults: function(data, page) {
                        return {
                            results: data
                        };
                    },
                }
            });

        });
    </script>
@stop
