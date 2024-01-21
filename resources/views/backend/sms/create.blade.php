@extends('layouts.backend')
@section('content')
    <div class="row">
        <form action="{{ url('sms/send') }}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
            <div class="container card">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                {{ _lang('Compose SMS Text') }}
                            </div>
                        </div>
                        <div class="panel-body">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('User Type') }}</label>
                                    <select name="user_type" id="user_type" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        <option value="Admin">{{ _lang('Admin') }}</option>
                                        <option value="Staff">{{ _lang('Staff') }}</option>
                                        <option value="Parent">{{ _lang('Parent') }}</option>
                                        <option value="Teacher">{{ _lang('Teacher') }}</option>
                                        <option value="Accountant">{{ _lang('Accountant') }}</option>
                                        <option value="Librarian">{{ _lang('Librarian') }}</option>
                                        <option value="Employee">{{ _lang('Employee') }}</option>
                                        <option value="PhoneBook">{{ _lang('Phone Book') }}</option>
                                        <option value="Any">{{ _lang('Any') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" style="display: none" id="class-select">
                                    <label class="control-label">{{ _lang('Select Class') }}</label>
                                    <select name="class_id" id='class-id' class="form-control select2"
                                        onchange="getSection();">
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="student-section" style="display: none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Class') }}</label>
                                    <select name="class_id" onchange="getSection();" class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name', old('class_id')) }}
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-sm-12 student-section " style="display: none">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Section') }}</label>
                                    <select name="section_id" onchange="get_students();" id="section_id"
                                        class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-12 student-group">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Student') }}</label>
                                    <select name="student_id" id="student_id" onchange="get_all_students();"
                                        class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="col-sm-12 general-group">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Select Receiver') }}</label>
                                    <select name="user_id" id="user_id" onchange="get_all_users();"
                                        class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>
                                    </select>
                                </div>
                            </div> --}}

                            <div class="col-md-12 individual-number-show" style="display: none">
                                <div class="form-group">
                                    <label>{{ _lang('Individual Number') }}</label>
                                    <input type="number" name="individual_number" id="individual-number"
                                        class="form-control " />

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ _lang('SMS Template') }}</label>
                                    <select name="" id="sms-template" class="form-control select2" required>
                                        <option value="">{{ _lang('--Select--') }}</option>
                                        @foreach ($smsTemplates as $item)
                                            <option data-template="{{ $item->description }}" value="{{ $item->id }}">
                                                {{ _lang($item->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">{{ _lang('Message') }} ( {{ _lang('MAX 300') }}
                                        )</label>
                                    <textarea id="message-content" class="form-control" name="body" required>{{ old('body') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">{{ _lang('Send SMS') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ _lang('User List') }}</div>
                    <div class="panel-body" id="user_list">
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@section('js-script')
    <script type="text/javascript">
        $(document).on('change', '#user_type', function() {
            var user_type = $(this).val();
            // if (user_type == "Student") {
            //     $(".student-group").fadeIn();
            //     $(".general-group").css("display", "none");
            //     $("#student_id").prop("required", true);
            //     $("#user_id").prop("required", false);
            //     $("#class-select").css("display", "none");
            //     $(".student-section").css("display", "none");
            //     $(".student-section").prop("required", false);
            //     $("#individual-number").prop("required", false);
            //     $(".individual-number-show").css("display", "none");
            // }
            if (user_type == "Parent") {
                console.log('parent', user_type)
                $("#class-id").prop("required", true);
                $("#class-select").css("display", "block");
                $(".student-section").prop("required", true);
                $(".student-section").css("display", "block");
                $("#individual-number").prop("required", false);
                $(".individual-number-show").css("display", "none");
                return 1;

                // getUsers(user_type);

            }
            if (user_type == "Any") {
                console.log('first', user_type)
                $("#individual-number").prop("required", true);
                $(".individual-number-show").css("display", "block");
                $("#class-select").css("display", "none");
                $(".student-section").css("display", "none");
                $(".student-section").prop("required", false)
                // $(".student-section").prop("required", true);
                // $(".student-section").css("display", "block");
                return getUsers(user_type);
            }
            if (user_type == "PhoneBook") {
                console.log('first', user_type)
                $("#individual-number").prop("required", false);
                $(".individual-number-show").css("display", "none");
                $("#class-select").css("display", "none");
                $(".student-section").css("display", "none");
                $(".student-section").prop("required", false)

                return phoneBook(user_type);
            } else {
                $(".student-group").css("display", "none");
                $(".general-group").fadeIn();
                $("#student_id").prop("required", false);
                $("#user_id").prop("required", true);
                $("#class-select").css("display", "none");
                $(".student-section").css("display", "none");
                $(".student-section").prop("required", false)
                $("#individual-number").prop("required", false);
                $(".individual-number-show").css("display", "none");
                return getUsers(user_type);
            }
        });

        function getUsers(type) {
            console.log('type- mm', type)
            $.ajax({
                url: "{{ url('users/get_users') }}/" + type,

                success: function(data) {
                    console.log('get_users', data)
                    return $('#user_list').html(data);

                }
            });
        }

        function phoneBook(type) {
            console.log('type', type)


            $.ajax({
                url: "{{ route('sms.phoneBook') }}",

                success: function(data) {
                    console.log('phonebook', data)

                    return $('#user_list').html(data);

                }
            });
        }

        function getSection() {

            if ($('select[name=class_id]').val() != "") {
                var _token = $('input[name=_token]').val();
                var class_id = $('select[name=class_id]').val();
                $.ajax({
                    type: "POST",
                    url: "{{ url('sections/section') }}",
                    data: {
                        _token: _token,
                        class_id: class_id
                    },
                    beforeSend: function() {
                        $("#preloader").css("display", "block");
                    },
                    success: function(data) {
                        $("#preloader").css("display", "none");
                        $('select[name=section_id]').html(data);
                    }
                });
            }
        }


        function get_students() {
            // console.log('link', link)

            // if ($("#user_type").val() == "Student" && $('select[name=section_id]').val() != "") {
            var class_id = "/" + $('select[name=class_id]').val();
            var section_id = "/" + $('select[name=section_id]').val();
            var link = "{{ url('students/get_students/sms') }}" + class_id + section_id;
            console.log('link', link)
            $.ajax({
                type: "get",
                url: link,
                // beforeSend: function() {
                //     $("#preloader").css("display", "block");
                // },
                success: function(data) {
                    console.log('datadd 1', data)
                    $('#user_list').html(data);
                    // $("#preloader").css("display", "none");
                    // var json = JSON.parse(data);
                    // $('select[name=student_id]').html("");
                    // $('#user_list').html("");

                    // jQuery.each(json, function(i, val) {
                    //     $('select[name=student_id]').append("<option value='" + val['phone'] +
                    //         "'>" + val['roll'] + " - " + val['first_name'] + " " + val[
                    //             'last_name'] + "</option>");
                    // });

                    // if ($('#student_id').has('option').length > 0) {
                    //     $('select[name=student_id]').prepend(
                    //         "<option value='all'>{{ _lang('All Student') }}</option>");
                    // }
                }
            });
            // }
        }

        // function get_all_students() {
        //     if ($("#student_id").val() == "all") {
        //         var class_id = "/" + $('select[name=class_id]').val();
        //         var section_id = "/" + $('select[name=section_id]').val();
        //         var link = "{{ url('students/get_students') }}" + class_id + section_id;
        //         $.ajax({
        //             url: link,
        //             // beforeSend: function() {
        //             //     $("#preloader").css("display", "block");
        //             // },
        //             success: function(data) {
        //                 console.log('datadd 2', data)
        //             $('#user_list').html(data);
        //                 // $("#preloader").css("display", "none");
        //                 // var json = JSON.parse(data);
        //                 // $('#user_list').html("");
        //                 // console.log(json)

        //                 // jQuery.each(json, function(i, val) {
        //                 //     $('#user_list')
        //                 //         .append('<div class="col-md-12">' +
        //                 //             '<label class="c-container">' +
        //                 //             '<input type="checkbox" value="' + val['phone'] +
        //                 //             '" name="students[]" checked="true">' + val['roll'] + " - " + val[
        //                 //                 'first_name'] + " " + val['last_name'] +
        //                 //             '<span class="checkmark"></span>' +
        //                 //             '</label>' +
        //                 //             '</div>');
        //                 // });

        //             }
        //         });
        //     } else {
        //         $('#user_list').html("");
        //     }
        // }

        function get_all_users() {
            if ($("#user_id").val() == "all") {
                var user_type = "/" + $('select[name=user_type]').val();
                console.log('user_type', user_type)
                var link = "{{ url('users/get_users') }}" + user_type;
                $.ajax({
                    url: link,
                    beforeSend: function() {
                        $("#preloader").css("display", "block");
                    },
                    success: function(data) {
                        $("#preloader").css("display", "none");
                        var json = JSON.parse(data);
                        $('#user_list').html("");

                        jQuery.each(json, function(i, val) {
                            $('#user_list')
                                .append('<div class="col-md-12">' +
                                    '<label class="c-container">' +
                                    '<input type="checkbox" value="' + val['phone'] +
                                    '" name="users[]" checked="true">' + val['name'] +
                                    '<span class="checkmark"></span>' +
                                    '</label>' +
                                    '</div>');
                        });

                    }
                });
            } else {
                $('#user_list').html("");
            }
        }
        $('#sms-template').change(function() {
            var selectedOption = $(this).find(':selected');
            var templateDescription = selectedOption.data('template');

            console.log('Template Description:', templateDescription);
            $('#message-content').val(templateDescription);
        });
        $('#class-id').change(function() {
            var classId = $(this).val()
            // var id = classId.data('template');
            console.log('id', classId)
            var link = "{{ url('students/get_students') }}" + '/' + classId
            console.log('link', link)
            // return 1;
            $.ajax({
                type: "get",
                url: link,
                classId: classId,
                success: function(data) {
                    $('#user_list').html(data);
                }
            });
            

        });


        function checkAllInput() {
            var checkboxes = document.getElementsByClassName("user-checkbox");
            console.log('checkboxes', checkboxes)

            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        }
    </script>


@stop
