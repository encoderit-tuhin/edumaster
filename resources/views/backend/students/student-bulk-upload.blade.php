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
                        <a class="btn btn-primary btn-sm" href="{{ route('students.bulk-file-upload') }}">
                            <i class="fa fa-upload"></i>
                            {{ _lang('Bulk Upload File') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-12">

                        <form action="{{ route('students.bulk-upload.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label">{{ _lang('Academic Year') }}</label>
                                        <select class="form-control select2" name="academic_year" required>
                                            {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label">{{ _lang('Class') }}</label>
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
                                        <label class="control-label">{{ _lang('Section') }}</label>
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
                                        <label class="control-label">{{ _lang('Group') }}</label>
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
                                        <label class="control-label">
                                            {{ _lang('No. of Rows') }} *
                                            <span>(Maximum Rows 50)</span>
                                        </label>

                                        <div class="">
                                            <input type="number" id="rowInputNumber" class="form-control"
                                                name="number_of_student" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-info" type="button" id="clickBtn"
                                        style="margin-top: 30px;">Process</button>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table class="table table-bordered" id="studentTable">
                                    <!-- Table headers here -->
                                    <thead>
                                        <th>
                                            <input class="checkbox" type="checkbox">
                                        </th>
                                        <th>{{ _lang('Roll No') }}</th>
                                        <th>{{ _lang('Name') }}</th>
                                        <th>{{ _lang('Gender') }}</th>
                                        <th>{{ _lang('Religion') }}</th>
                                        <th>{{ _lang('Father`s Name') }}</th>
                                        <th>{{ _lang('Mother`s Name') }}</th>
                                        <th>{{ _lang('Mobile No.') }}</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">{{ __('Submit') }}</button>
                                </div>
                            </div>
                        </form>
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

    <script>
        $(document).ready(function() {
            $('#clickBtn').on('click', function() {
                var rowInputNumber = $('#rowInputNumber').val();
                var tableBody = $('#studentTable tbody');

                // Clear existing rows
                tableBody.empty();

                // Loop to generate rows
                for (var i = 1; i <= rowInputNumber; i++) {
                    var newRow = $('<tr>');

                    // Add checkbox column
                    newRow.append('<td><input class="checkbox" type="checkbox"></td>');

                    // Add roll_no column with input
                    newRow.append(
                        '<td><input type="number" class="form-control" name="roll_no[]" placeholder="Student Roll No"></td>'
                    );

                    // Add name column with input
                    newRow.append(
                        '<td><input type="text" class="form-control" name="name[]" placeholder="Student`s Name"></td>'
                );

                // Add gender column with select dropdown
                newRow.append('<td>' +
                    '<select name="gender[]" class="form-control select2">' +
                    '<option value="">Select Gender</option>' +
                    '<option value="Male">Male</option>' +
                    '<option value="Female">Female</option>' +
                    '</select>' +
                    '</td>'
                );

                // Add religion column with select dropdown
                newRow.append('<td>' +
                    '<select name="religion[]" class="form-control select2">' +
                    '<option value="">Select Religion</option>' +
                    '<option value="Islam">Islam</option>' +
                    '<option value="Christian">Christian</option>' +
                    '<option value="Hindu">Hindu</option>' +
                    '<option value="Buddhism">Buddhism</option>' +
                    '</select>' +
                    '</td>'
                );

                // Add father's name column with input
                newRow.append(
                    '<td><input type="text" class="form-control" name="father_name[]" placeholder="Father`s Name"></td>'
                    );

                    // Add mother's name column with input
                    newRow.append(
                        '<td><input type="text" class="form-control" name="mother_name[]" placeholder="Mother`s Name"></td>'
                    );

                    // Add mobile no column with input
                    newRow.append(
                        '<td><input type="number" class="form-control" name="mobile_no[]" placeholder="Enter Mobile No"></td>'
                    );

                    // Append the new row to the table body
                    tableBody.append(newRow);
                }
            });
        });
    </script>
@stop
