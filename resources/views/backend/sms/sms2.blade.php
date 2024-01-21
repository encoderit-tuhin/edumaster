@extends('layouts.backend')

@section('styles')
    <style>
        .setting-tab {
            background: azure;
            border-bottom: none;
        }

        .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #5fa0eb;
            border-color: #5fa0eb #5fa0eb #fff;
        }

        .nav-tabs .nav-link:focus,
        .nav-tabs .nav-link:hover {
            color: #fff;
            background-color: #5fa0eb;
            border-color: #5fa0eb #5fa0eb #5fa0eb;
            isolation: isolate;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Send SMS (Person Wise)') }}
                    </div>
                </div>

                <div class="panel-body">
                    <ul class="nav nav-tabs setting-tab">
                        <li class="nav-item active">
                            <a class="nav-link" data-toggle="tab" href="#parent_class"
                                aria-expanded="true">{{ _lang('Parent(Class)') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#parent_section"
                                aria-expanded="false">{{ _lang('Parent(Section)') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#teacher" aria-expanded="false">
                                {{ _lang('Teacher') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#staff" aria-expanded="false">
                                {{ _lang('Staff') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#anyone" aria-expanded="false">
                                {{ _lang('Anyone') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#admin" aria-expanded="false">
                                {{ _lang('Admin') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="parent_class" class="tab-pane fade in active">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="class-select">
                                                <label class="control-label">{{ _lang('Select Class') }}</label>
                                                <select name="class_id" id='class-id-sms' class="form-control select2">
                                                    <option value="">{{ _lang('Select One') }}</option>
                                                    {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                                </select>
                                            </div>
                                        </div>
                                        <input hidden name="user_type" value="Parent">
                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'parent_class',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                        <div class="" id="parent-class-div">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="parent_section" class="tab-pane fade">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group" id="class-select">
                                                <label class="control-label">{{ _lang('Select Classss') }}</label>
                                                <select name="class_id_section" id='class-id-section'
                                                    class="form-control select2" onchange="getSection();">
                                                    <option value="">{{ _lang('Select One') }}</option>
                                                    {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                                </select>
                                            </div>
                                        </div>
                                        <input hidden name="user_type" value="Parent">
                                        <div class="col-sm-6  ">
                                            <div class="form-group">
                                                <label class="control-label">{{ _lang('Select Section') }}</label>
                                                <select name="section_id" onchange="get_students();" id="section_id_sms"
                                                    class="form-control select2">
                                                    <option value="">{{ _lang('Select One') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'parent_section',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="parent-section-div"></div>
                                </form>
                            </div>
                        </div>
                        <div id="teacher" class="tab-pane fade in">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post"
                                    accept-charset="utf-8">
                                    @csrf
                                    <input hidden name="user_type" value="Teacher">
                                    <div class="row">
                                        <div class="" style="margin: 10px!important">
                                            <button class=" btn-success btn-sm  btn" type="button"
                                                onclick="getUsers('Teacher')">Show All</button>
                                        </div>
                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'teacher',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Teacher-div"></div>
                                </form>
                            </div>
                        </div>
                        <div id="staff" class="tab-pane fade in">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <div style="margin: 10px!important"> <button class="btn btn-success btn-sm"
                                                type="button" onclick="getUsers('Staff')">Show All</button>
                                        </div>
                                        <input hidden name="user_type" value="Staff">
                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'staff',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="Staff-div"></div>
                                </form>
                            </div>
                        </div>
                        <div id="admin" class="tab-pane fade in">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post"
                                    accept-charset="utf-8">
                                    @csrf
                                    <div class="row">
                                        <div style="margin: 10px!important">
                                            <button class="btn btn-success btn-sm" type="button"
                                                onclick="getUsers('Admin')">Show All</button>
                                        </div>
                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'admin',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden name="user_type" value="Admin">
                                    <div id="Admin-div"></div>
                                </form>
                            </div>
                        </div>
                        <div id="anyone" class="tab-pane fade">
                            <div class="shadow p-4 mt-4">
                                <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post"
                                    accept-charset="utf-8">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 individual-number-show">
                                            <div class="form-group">
                                                <label>{{ _lang('Number') }}</label>
                                                <input type="number" name="individual_number" id="individual-number"
                                                    class="form-control " />
                                            </div>
                                        </div>

                                        @include('backend.sms.sms-template-layout', [
                                            'type' => 'anyone',
                                        ])
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        $('#class-id-sms').change(function() {
            var classId = $(this).val()
            console.log('id', classId)
            var link = "{{ url('students/get_students') }}" + '/' + classId
            console.log('link', link)
            // return 1;
            $.ajax({
                type: "get",
                url: link,
                classId: classId,
                success: function(data) {
                    console.log('data', data)
                    $('#parent-class-div').html(data);
                }
            });
        })

        function getSection() {

            if ($('select[name=class_id_section]').val() != "") {
                var _token = $('input[name=_token]').val();
                var class_id = $('select[name=class_id_section]').val();
                console.log('class_id', class_id)
                $.ajax({
                    type: "POST",
                    url: "{{ url('sections/section') }}",
                    data: {
                        _token: _token,
                        class_id: class_id
                    },
                    // beforeSend: function() {
                    //     $("#preloader").css("display", "block");
                    // },
                    success: function(data) {
                        console.log('data --', data)
                        // $("#preloader").css("display", "none");
                        $("#section_id_sms").html(data);
                    }
                });
            }
        }

        function get_students() {
            var class_id = "/" + $('select[name=class_id_section]').val();
            var section_id = "/" + $('select[name=section_id]').val();
            var link = "{{ url('students/get_students/sms') }}" + class_id + section_id;
            console.log('class_id', class_id)
            console.log('section_id', section_id)
            console.log('link', link)
            console.log('link', link)
            $.ajax({
                type: "get",
                url: link,

                success: function(data) {
                    // console.log('data', data)
                    // console.log('datadd 1', data)
                    $('#parent-section-div').html(data);

                }
            });
        }

        function getUsers(type) {
            $.ajax({
                url: "{{ url('users/get_users') }}/" + type,
                success: function(data) {
                    return $('#' + type + '-div').html(data);

                }
            });
        }
        $('.parent_class').change(function() {
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            $('#message_content_parent_class').val(templateDescription);

        });
        $('.parent_section').change(function() {
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            $('#message_content_parent_section').val(templateDescription);

        });
        $('.teacher').change(function() {
            console.log('object :>> ');
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            console.log('templateDescription', templateDescription);
            $('#message_content_teacher').val(templateDescription);

        });
        $('.staff').change(function() {

            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            $('#message_content_staff').val(templateDescription);

        });
        $('.anyone').change(function() {
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            console.log('templateDescription :>> ', templateDescription);
            $('#message_content_anyone').val(templateDescription);

        });
        $('.admin').change(function() {
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');
            $('#message_content_admin').val(templateDescription);
        });
    </script>
@stop
