@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title pull-left">
                        {{ _lang('Add New Student') }}
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('students.bulk-upload') }}">
                            <i class="fa fa-upload"></i>
                            {{ _lang('Bulk Student Upload') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <div class="col-md-10">
                        <form action="{{ route('students.store') }}" autocomplete="off"
                            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
                            method="post" accept-charset="utf-8">
                            @csrf

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('First Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        value="{{ old('first_name', $studentData ? $studentData->first_name : '') }}"
                                        required>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Last Name') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        value="{{ old('last_name', $studentData ? $studentData->last_name : '') }}"
                                        required>
                                </div>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Guardian') }}</label>
                                <div class="col-sm-7">
                                    <select name="parent_id" id="guardian" class="form-control" required>
                                    </select>
                                </div>
                                <a href="{{ route('parents.create') }}" data-title="{{ _lang('Add New Parent') }}"
                                    class="btn btn-primary btn-sm ajax-modal"><i class="fa fa-plus"></i>Quick Guardian
                                    Add</a>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Birthdate') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control datepicker" id="birthday" name="birthday"
                                        value="{{ old('birthday', $studentData ? $studentData->birthday : '') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Gender') }}</label>
                                <div class="col-sm-9">
                                    <select name="gender" id="gender" class="form-control wide" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        <option value="Male"
                                            {{ old('gender', $studentData && $studentData->gender === 'Male' ? 'selected' : '') }}>
                                            {{ _lang('Male') }}</option>
                                        <option value="Female"
                                            {{ old('gender', $studentData && $studentData->gender === 'Female' ? 'selected' : '') }}>
                                            {{ _lang('Female') }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Blood Group') }}</label>
                                <div class="col-sm-9">
                                    <select name="blood_group" id="blood_group" class="form-control select2" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'A+' ? 'selected' : '') }}
                                            value="A+">N/A</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'A+' ? 'selected' : '') }}
                                            value="A+">A+</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'A-' ? 'selected' : '') }}
                                            value="A-">A-</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'B+' ? 'selected' : '') }}
                                            value="B+">B+</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'B-' ? 'selected' : '') }}
                                            value="B-">B-</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'AB+' ? 'selected' : '') }}
                                            value="AB+">AB+</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'AB-' ? 'selected' : '') }}
                                            value="AB-">AB-</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'O+' ? 'selected' : '') }}
                                            value="O+">O+</option>
                                        <option
                                            {{ old('blood_group', $studentData && $studentData->blood_group === 'O-' ? 'selected' : '') }}
                                            value="O-">O-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Religion') }}</label>
                                <div class="col-sm-9">
                                    <select name="religion" id="religion" class="form-control wide" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('picklists', 'value', 'value', old('religion', $studentData ? $studentData->religion : ''), ['type=' => 'Religion']) }}
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="phone" id="phone"
                                        value="{{ old('phone', $studentData ? $studentData->phone : '') }}" required>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm" id="autoFillButton">
                                    <i class="fa fa-plus"></i>
                                    Auto-fill
                                </button>
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Address') }}</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id='address'> {{ old('address', $studentData ? $studentData->address : '') }}</textarea>
                                </div>
                            </div> --}}

                            <div class="row">
                                <input type="hidden" class="form-control" name="country" value="Bangladesh">
                                <input type="hidden" class="form-control" name="state" value="Bangladesh">
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Class') }}</label>
                                <div class="col-sm-9">
                                    <select name="class" class="form-control select2" id="class" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('classes', 'id', 'class_name', old('class', $studentData ? $studentData->class_id : '')) }}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Section') }}</label>
                                <div class="col-sm-9">
                                    <select name="section" class="form-control wide" id="section" required>
                                        <option value="">{{ _lang('Select One') }}</option>
                                        @foreach ($sections as $data)
                                            <option data-class="{{ $data->class_id }}" value="{{ $data->id }}"
                                                {{ old('section', $studentData ? $studentData->section_id : '') == $data->id ? 'selected' : '' }}>
                                                {{ $data->section_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Group') }}</label>
                                <div class="col-sm-9">
                                    <select name="group" id="group" class="form-control">
                                        <option value="">{{ _lang('Select One') }}</option>
                                        {{ create_option('student_groups', 'id', 'group_name', old('group', $studentData ? $studentData->group_id : '')) }}
                                    </select>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Optional Subject') }}</label>
                                <div class="col-sm-9">
                                    <select name="optional_subject" id="optional_subject" class="form-control select2">
                                        <option value="">{{ _lang('Select One') }}</option>

                                    </select>
                                </div>
                            </div> --}}
                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Register NO') }}</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="register_no"
                                        value="{{ old('register_no') }}" required>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Roll No.') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="roll"
                                        value="{{ old('roll') }}" required>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Extra Curricular Activities ') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="activities"
                                        value="{{ old('activities') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Remarks') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="remarks"
                                        value="{{ old('remarks') }}">
                                </div>
                            </div> --}}
                            <span id='ssc-details' style=" display:none">
                                <div class="card-header text-center">
                                    <h2>Student Academic Information</h2>
                                </div>

                                <div class="row p-2">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Nick Name') }}</label>
                                            <input type="text" class="form-control" name="nick_name"
                                                value="{{ old('nick_name') }}">

                                            @error('nick_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('School Name') }}</label>
                                            <input type="text" class="form-control" name="school_name"
                                                placeholder="School Name" value="{{ old('school_name') }}" required>

                                            @error('school_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('School address') }}</label>
                                            <input type="text" class="form-control" name="school_address"
                                                placeholder="School address" value="{{ old('school_address') }}"
                                                required>

                                            @error('school_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Board Name') }}</label>
                                            <input type="text" class="form-control" name="board"
                                                placeholder="board" value="{{ old('board') }}" required>

                                            @error('board')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Center') }}</label>
                                            <input type="text" class="form-control" name="center"
                                                placeholder="center" value="{{ old('center') }}" required>

                                            @error('center')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Passing year') }}</label>
                                            <input type="text" class="form-control" name="passing_year"
                                                placeholder="Passing year" value="{{ old('passing_year') }}" required>

                                            @error('passing_year')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Board roll') }}</label>
                                            <input type="text" class="form-control" name="board_roll"
                                                placeholder="Board roll" value="{{ old('board_roll') }}" required>

                                            @error('board_roll')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Board Registration') }}</label>
                                            <input type="text" class="form-control" name="registration_number"
                                                placeholder="Board Registration" value="{{ old('registration_number') }}"
                                                required>

                                            @error('registration_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="control-label">{{ _lang('Vital 201') }}</label>
                                            <input type="text" class="form-control" name="vital_201"
                                                placeholder="Vital 201" value="{{ old('vital_201') }}" required>

                                            @error('vital_201')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4 class="text-center"
                                        style="border-bottom: 2px dashed #ddd; padding-bottom: 10px; ">SSC
                                        Subject Grade</h4>
                                </div>
                                <div class="form-group row p-2">
                                    <div class="col-md-6">
                                        <label class="label-control">Bengali: </label>
                                        <input type="number" step="any" name="bangla" class="form-control"
                                            placeholder="Bengali">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">English: </label>
                                        <input type="number" step="any" name="english" class="form-control"
                                            placeholder="English">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">Math: </label>
                                        <input type="number" step="any" name="math" class="form-control"
                                            placeholder="Math">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">Higher Math: </label>
                                        <input type="number" step="any" name="highter_math" class="form-control"
                                            placeholder="Higher Math">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">BK: </label>
                                        <input type="text" name="bk" class="form-control" placeholder="BK">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">GPA+add: </label>
                                        <input type="number" step="any" name="gpa_with_4th" class="form-control"
                                            placeholder="GPA+Add">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">GPA-add: </label>
                                        <input type="number" step="any" name="gpa_without_4th" class="form-control"
                                            placeholder="GPA-Add">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">Total A+: </label>
                                        <input type="number" step="any" name="total_a_plus" class="form-control"
                                            placeholder="Total A+">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="label-control">4th Subject Grade: </label>
                                        <input type="number" step="any" name="grade_4th_sub" class="form-control"
                                            placeholder="4th Subject Grade">
                                    </div>
                                </div>
                            </span>

                            <hr>
                            <div class="page-header">
                                <h4>Login Details</h4>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Email') }}
                                    <span class="text-info">(optional)</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Phone no') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone"
                                        value="{{ old('phone', $studentData->phone ?? '') }}" id="user_phone"
                                        autocomplete="off" required>
                                </div>
                            </div>
                            @php
                                $random6DigitPassword = rand(100000, 999999);
                            @endphp
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Password') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password"
                                        value="{{ old('password', $random6DigitPassword) }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Confirm Password') }}</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="password_confirmation"
                                        value="{{ old('password_confirmation', $random6DigitPassword) }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">{{ _lang('Profile Picture') }}</label>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control dropify" name="image"
                                        @isset($studentData->image) data-default-file="{{ asset('uploads/images/' . $studentData->image) }}"     @endisset
                                        data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                </div>
                                {{-- @isset($studentData->image)
                                    <div class="col-sm-3">
                                        <img src="{{ asset('uploads/images/' . $studentData->image) }}" class="img-fluid"
                                            alt="">
                                    </div>
                                @endisset --}}
                            </div>
                            <input type="number" hidden id='onlineRegisterInfoId'>
                            <input type="number" id='is_online' name="is_online" hidden
                                value="{{ old('is_online', $studentData ? 1 : 0) }}">
                            <input type="number" hidden id='online-form-id' name="online_form_id"
                                value="{{ old('online_form_id', $studentData ? $studentData->id : 0) }}">

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-5">
                                    <button type="submit" class="btn btn-info">Add Student</button>
                                </div>
                            </div>
                            <input hidden type="text" name="physics" class="form-control" placeholder="Physics"
                                value="{{ $studentData->physics ?? '' }}">
                            <input hidden type="text" name="chemistry" class="form-control" placeholder="Chemistry"
                                value="{{ $studentData->chemistry ?? '' }}">
                            <input hidden type="text" name="biology" class="form-control" placeholder="Biology"
                                value="{{ $studentData->biology ?? '' }}">
                            <input hidden type="text" name="higherMath" class="form-control"
                                placeholder="Higher Math" value="{{ $studentData->higherMath ?? '' }}">
                            <input hidden type="text" name="bangladeshWorld" class="form-control"
                                placeholder="Bangladesh World" value="{{ $studentData->bangladeshWorld ?? '' }}">
                            <input hidden type="text" name="agricultureStudies" class="form-control"
                                placeholder="Agriculture Studies" value="{{ $studentData->agricultureStudies ?? '' }}">
                            <input hidden type="text" name="homeScience" class="form-control"
                                placeholder="Home Science" value="{{ $studentData->homeScience ?? '' }}">
                            <input hidden type="text" name="other" class="form-control" placeholder="Other"
                                value="{{ $studentData->other ?? '' }}">
                            <input hidden type="text" name="financeBanking" class="form-control"
                                placeholder="Finance & Banking" value="{{ $studentData->financeBanking ?? '' }}">
                            <input hidden type="text" name="accounting" class="form-control" placeholder="Accounting"
                                value="{{ $studentData->accounting ?? '' }}">
                            <input hidden type="text" name="businessEnt" class="form-control"
                                placeholder="Business Ent" value="{{ $studentData->businessEnt ?? '' }}">
                            <input hidden type="text" name="generalScience" class="form-control"
                                placeholder="General Science" value="{{ $studentData->generalScience ?? '' }}">
                            <input hidden type="text" name="music" class="form-control" placeholder="Music"
                                value="{{ $studentData->music ?? '' }}">
                            <input hidden type="text" name="geography" class="form-control" placeholder="Geography"
                                value="{{ $studentData->geography ?? '' }}">
                            <input hidden type="text" name="civicCitizenship" class="form-control"
                                placeholder="Civic Citizenship" value="{{ $studentData->civicCitizenship ?? '' }}">
                            <input hidden type="text" name="economics" class="form-control" placeholder="Economics"
                                value="{{ $studentData->economics ?? '' }}">
                            <input hidden type="text" name="historyBangladesh" class="form-control"
                                placeholder="History Bangladesh" value="{{ $studentData->historyBangladesh ?? '' }}">


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

            $('#autoFillButton').click(function() {
                var phone = $('#phone').val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('fetch-student-data') }}',
                    data: {
                        phone: phone,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        console.log('data :>> ', data);
                        $('#is_online').val(1);
                        // basic
                        // $('#ssc-details').show();
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#birthday').val(data.birthday);
                        $('#address').val(data.address);
                        $('#gender').val(data.gender).trigger('change');
                        $('#blood_group').val(data.blood_group).trigger('change');
                        $('#religion').val(data.religion).trigger('change');
                        $('#class').val(data.class_id).trigger('change');
                        $('#group').val(data.group).trigger('change');
                        // ssc details
                        $('input[name="bangla"]').val(data.bangla);
                        $('input[name="english"]').val(data.english);
                        $('input[name="math"]').val(data.math);
                        $('input[name="highter_math"]').val(data.highter_math);
                        $('input[name="bk"]').val(data.bk);
                        $('input[name="gpa_with_4th"]').val(data.gpa_with_4th);
                        $('input[name="gpa_without_4th"]').val(data.gpa_without_4th);
                        $('input[name="total_a_plus"]').val(data.total_a_plus);
                        $('input[name="grade_4th_sub"]').val(data.grade_4th_sub);
                        // academic
                        $('#online-form-id').val(data.id);
                        $('select[name="class_id"]').val(data.class_id);
                        $('input[name="Roll Number"]').val(data.roll_number);
                        $('input[name="Nice Name"]').val(data.nick_name);
                        $('select[name="group"]').val(data.group);
                        $('input[name="school_name"]').val(data.school_name);
                        $('input[name="school_address"]').val(data.school_address);
                        $('input[name="board"]').val(data.board);
                        $('input[name="center"]').val(data.center);
                        $('input[name="passing_year"]').val(data.passing_year);
                        $('input[name="board_roll"]').val(data.board_roll);
                        $('input[name="registration_number"]').val(data.registration_number);
                        $('input[name="vital_201"]').val(data.vital_201);
                        $('#onlineRegisterInfoId').val(data.phone);
                        $('#user_phone').val(data.phone);
                        $('#online-form-id').val(data.id);


                    },
                    error: function(xhr, status, error) {
                        // Handle error case
                        console.error('Error s:', error);
                        alert(error)
                        // You can show an error message to the user or perform other actions in case of an error
                    }
                });
            });


        });
    </script>
@stop
