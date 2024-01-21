@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Teachers Bulk Upload') }}
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('teachers.bulk-file-upload') }}">
                            <i class="fa fa-upload"></i>
                            {{ _lang('Bulk Upload File') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-12">

                        <form action="{{ route('teachers.bulk-upload.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label">{{ _lang('Designation') }}</label>
                                        <select class="form-control select2" name="designation" required>
                                            <option value="designation">{{ _lang('Select Designation') }}</option>
                                            {{ create_option('picklists', 'value', 'value', old('designation'), ['type=' => 'Designation']) }}
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group" style="padding: 0 15px;">
                                        <label class="control-label">{{ _lang('Department') }}</label>
                                        <select class="form-control select2" name="department_id" required>
                                            <option value="">{{ _lang('Select Department') }}</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">
                                                    {{ $department->department_name }}</option>
                                            @endforeach
                                        </select>
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
                                                name="number_of_teacher" value="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-info" type="button" id="clickBtn"
                                        style="margin-top: 30px;">Process</button>
                                </div>
                            </div>

                            <div class="panel-body">
                                <table class="table table-bordered" id="teacherTable">
                                    <!-- Table headers here -->
                                    <thead>
                                        <th>
                                            <input class="checkbox" type="checkbox">
                                        </th>
                                        <th>{{ _lang('SL No') }}</th>
                                        <th>{{ _lang('Teacher Name') }}</th>
                                        <th>{{ _lang('Gender') }}</th>
                                        <th>{{ _lang('Religion') }}</th>
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
                var link = "{{ url('teachers/get_subjects/') }}";
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
                var tableBody = $('#teacherTable tbody');

                // Clear existing rows
                tableBody.empty();

                // Loop to generate rows
                for (var i = 1; i <= rowInputNumber; i++) {
                    var newRow = $('<tr>');

                    // Add checkbox column
                    newRow.append('<td><input class="checkbox" type="checkbox"></td>');

                    // Add sl_no column with input
                    newRow.append(
                        '<td><input type="number" class="form-control" name="sl_no[]" placeholder="Sl No"></td>'
                    );

                    // Add name column with input
                    newRow.append(
                        '<td><input type="text" class="form-control" name="name[]" placeholder="Teacher`s Name"></td>'
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
