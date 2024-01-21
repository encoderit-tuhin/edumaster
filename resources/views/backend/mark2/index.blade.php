@extends('layouts.backend') @section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Add Or Update Mark') }}
                    </div>
                    {{-- <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('update-input-mark') }}">
                            {{ _lang('View Mark') }}
                        </a>
                    </div> --}}
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-12">
                        <form id="addorupdateMark" action="{{ route('add-or-update-mark-input.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="form-group col-md-6" id="exam-select">
                                <label class="col-sm-2 control-label">{{ _lang('Exam') }}</label>
                                <div class="col-md-10">
                                    <select name="exam_id" id="exam-id" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('exams', 'id', 'name', old('exam_id')) }}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Session') }}</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="session_id" required id="session_id">
                                        @foreach (get_table('academic_years') as $session)
                                            <option value="{{ $session->id }}"
                                                {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                                                {{ $session->year }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Class') }}</label>
                                <div class="col-sm-10">
                                    <select name="class" class="form-control select2" id="class" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name') }}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Section') }}</label>
                                <div class="col-sm-10">
                                    <select name="section" class="form-control select2" id="section" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        @foreach ($sections as $data)
                                            <option data-class="{{ $data->class_id }}" value="{{ $data->id }}">
                                                {{ $data->section_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Group') }}</label>
                                <div class="col-sm-10">
                                    <select name="group" id="group" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('student_groups', 'id', 'group_name') }}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Subject') }}</label>
                                <div class="col-sm-10">
                                    <select name="subject_id" id="subject_id" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('subjects', 'id', 'subject_name') }}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-sm-2 control-label">{{ _lang('Paper') }}</label>
                                <div class="col-sm-10">
                                    <select name="paper" id="paper_id" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        <option value="1st">{{ _lang('First Paper') }}</option>
                                        <option value="2nd">{{ _lang('Second Paper') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6 text-right  mr-2">
                                <div class="">
                                    <button id="viewButton" type="button" class="btn btn-info"> <i class="fa fa-search"
                                            aria-hidden="true"></i> View</button>
                                </div>
                            </div>
                            <hr />
                            <hr />


                            <div id="filtered-mark-input-div" class="col-md-12"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection @section('js-script')

    <script>
        $(window).on("load", function() {
            $("#section").next().find("ul li").css("display", "none");
            $(document).on("change", "#class", function() {
                $("#section").next().find("ul li").css("display", "none");
                var class_id = $(this).val();
                $('#section option[data-class="' + class_id + '"]').each(function() {
                    var section_id = $(this).val();
                    $("#section")
                        .next()
                        .find("ul li[data-value='" + section_id + "']")
                        .css("display", "block");
                });
            });

            $(document).on("change", "#class", function() {
                load_option_subject();
            });

            function load_option_subject() {
                var class_id = $("#class").val();
                var link = "{{ url('students/get_subjects/') }}";
                $.ajax({
                    url: link + "/" + class_id,
                    success: function(data) {
                        $("#optional_subject").html(data);
                    },
                });
            }
        });
    </script>
    <script>
        $("#viewButton").click(function() {
            var class_id = $("#class").val();
            var section_id = $("#section").val();
            var group_id = $("#group").val();
            var subject_id = $("#subject_id").val();
            var session_id = $("#session_id").val();
            var paper_id = $("#paper_id").val();
            var exam_id = $("#exam-id").val();
            $.ajax({
                url: "{{ route('search-student-or-show-mark') }}",
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    group_id: group_id,
                    class_id: class_id,
                    section_id: section_id,
                    subject_id: subject_id,
                    session_id: session_id,
                    paper_id: paper_id,
                    exam_id: exam_id,
                },
                beforeSend: function() {
                    $("#preloader").css("display", "block");
                },

                success: function(data) {
                    $("#preloader").css("display", "none");
                    console.log("data :>> ", data);
                    $("#filtered-mark-input-div").html(data);
                },
            });
        });
    </script>

@stop
