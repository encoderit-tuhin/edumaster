@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Teacher') }}
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">

                        <form action="{{ route('teachers.update', $teacher->id) }}" autocomplete="off"
                            class="form-horizontal validate" autocomplete="off" method="post" accept-charset="utf-8"
                            enctype="multipart/form-data"
                            data-parsley-validate
                        >
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            {{-- <label class="col-sm-3 control-label">{{ _lang('Profile Picture') }}</label> --}}
                                            <div class="col-sm-12">
                                                <input type="file" class="form-control dropify" name="image"
                                                    data-default-file="{{ asset('uploads/images/' . $teacher->image) }}"
                                                    data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: -16px;">
                                        <div class="row">
                                            <div class="col-sm-12" id="teacherProfileActive">
                                                <div class="list-group" id="list-tab" role="tablist">
                                                    <a class="list-group-item list-group-item-action teacher-profile active"
                                                        id="list-home-list" href="#basic">Basic</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-profile-list" href="#personal">Personal</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-messages-list" href="#address">Address</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#education">Educational</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#experience">Experience</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#training">Training</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#bank">Bank</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#reference">Reference</a>
                                                    <a class="list-group-item list-group-item-action teacher-profile"
                                                        id="list-settings-list" href="#login_details">Login Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 shadow p-3 mb-5 bg-white rounded"
                                style="overflow-y: auto; max-height: 700px; overflow-x: hidden;">
                                <div class="row">

                                    <div class="col-sm-12" id="basic">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Basic Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $teacher->name }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Designation') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="designation" required>
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            {{ create_option('picklists', 'value', 'value', $teacher->designation, ['type=' => 'Designation']) }}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- abc --}}
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Department') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="department_id" required>
                                                            <option value="">{{ _lang('Select Department') }}
                                                            </option>
                                                            @foreach ($departments as $department)
                                                                <option value="{{ $department->id }}"
                                                                    {{ $department->id === $teacher->department_id ? 'selected' : '' }}>
                                                                    {{ $department->department_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Birthday') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="birthday" value="{{ $teacher->birthday }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Gender') }}</label>
                                                    <div class="col-sm-12">
                                                        <select name="gender" class="form-control select2" required>
                                                            <option @if ($teacher->gender == 'Male') selected @endif
                                                                value="Male">Male
                                                            </option>
                                                            <option @if ($teacher->gender == 'Female') selected @endif
                                                                value="Female">Female
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Religion') }}</label>
                                                    <div class="col-sm-12">
                                                        <select name="religion" class="form-control select2"
                                                            required>
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            {{ create_option('picklists', 'value', 'value', $teacher->religion, ['type=' => 'Religion']) }}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Phone (Primary)') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="phone"
                                                            value="{{ $teacher->phone }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Phone (Optional)') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="mobile_no"
                                                            value="{{ $teacher->mobile_no }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Email') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="email" class="form-control" name="email"
                                                            value="{{ $teacher->email }}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Blood Group') }}</label>
                                                    <div class="col-sm-12">

                                                        <select name="blood" class="form-control select2">
                                                            <option value=""> Select Blood Group</option>
                                                            @foreach ($bloods as $blood)
                                                                <option value="{{ $blood }}"
                                                                    {{ $blood === $teacher->blood ? 'selected' : '' }}>
                                                                    {{ $blood }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">SL</label>
                                                    <div class="col-sm-12">
                                                        <input type="number" class="form-control" name="sl"
                                                            value="{{ $teacher->sl }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('HR ID') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="user_id"
                                                            value="{{ $teacher->user_id }}" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Marital Status') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="marital_status">
                                                            <option value="">{{ _lang('Select Marital Status') }}
                                                            </option>
                                                            <option value="Single"
                                                                {{ 'Single' === $teacher->marital_status ? 'selected' : '' }}>
                                                                Single</option>
                                                            <option value="Married"
                                                                {{ 'Married' === $teacher->marital_status ? 'selected' : '' }}>
                                                                Married</option>
                                                            <option value="Divorce"
                                                                {{ 'Divorce' === $teacher->marital_status ? 'selected' : '' }}>
                                                                Divorce</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Joining Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="joining_date" value="{{ $teacher->joining_date }}"
                                                            >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Resign Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="resign_date" value="{{ $teacher->resign_date }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Resign Note') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="resign_note"
                                                            value="{{ $teacher->resign_note }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Category') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="category"
                                                            value="{{ $teacher->category }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label"
                                                        for="exampleCheck1">{{ _lang('Is Administrator') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="exampleCheck1" name="is_administrator" value="1"
                                                            {{ $teacher->is_administrator == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="personal">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Personal Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Fathers Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="father_name"
                                                            value="{{ $teacher->father_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Mothers Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="mother_name"
                                                            value="{{ $teacher->mother_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Nationality') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="nationality"
                                                            value="{{ $teacher->nationality }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('National ID') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="national_id"
                                                            value="{{ $teacher->national_id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Spouse Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="spouse_name"
                                                            value="{{ $teacher->spouse_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Passport No') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="passport_no"
                                                            value="{{ $teacher->passport_no }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('No of Child') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="no_of_child"
                                                            value="{{ $teacher->no_of_child }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Tin No') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="tin_no"
                                                            value="{{ $teacher->tin_no }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Specialization') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="specialization"
                                                            value="{{ $teacher->specialization }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('MPO ID') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="mpo_id"
                                                            value="{{ $teacher->mpo_id }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Hobby') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="hobby"
                                                            value="{{ $teacher->hobby }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Index No') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="index_no"
                                                            value="{{ $teacher->index_no }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Language') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="language"
                                                            value="{{ $teacher->language }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Extra Curriculum') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="extra_curriculum"
                                                            value="{{ $teacher->extra_curriculum }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="address">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Address Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Present Address') }}</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" name="address">{{ $teacher->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Permanent Address') }}</label>
                                                    <div class="col-sm-12">
                                                        <textarea class="form-control" name="permanent_address">{{ $teacher->permanent_address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="education">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Education Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Level of Education') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="education">
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            <option value="1"
                                                                {{ '1' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Primary Education') }}</option>
                                                            <option value="2"
                                                                {{ '2' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Junior Secondary Education') }}</option>
                                                            <option value="3"
                                                                {{ '3' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Secondary Education') }}</option>
                                                            <option value="4"
                                                                {{ '4' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Diploma') }}</option>
                                                            <option value="5"
                                                                {{ '5' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Higher Secondary') }}</option>
                                                            <option value="6"
                                                                {{ '6' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Bachelor/Honors') }}</option>
                                                            <option value="7"
                                                                {{ '7' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Fazil') }}</option>
                                                            <option value="8"
                                                                {{ '8' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Kamil') }}</option>
                                                            <option value="9"
                                                                {{ '9' === $teacher->education ? 'selected' : '' }}>
                                                                {{ _lang('Higher Education') }}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('CGPA/GPA') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="cgpa_gpa"
                                                            value="{{ $teacher->cgpa_gpa }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Institue Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="institute_name"
                                                            value="{{ $teacher->institute_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Out of GPA') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="out_of_cgpa_gpa"
                                                            value="{{ $teacher->out_of_cgpa_gpa }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Board') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="board">
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            <option value="1"
                                                                {{ '1' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Dhaka') }}</option>
                                                            <option value="2"
                                                                {{ '2' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Rajshahi') }}</option>
                                                            <option value="3"
                                                                {{ '3' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Dinajpur') }}</option>
                                                            <option value="4"
                                                                {{ '4' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Chattogram') }}</option>
                                                            <option value="5"
                                                                {{ '5' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Cumilla') }}</option>
                                                            <option value="6"
                                                                {{ '6' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Sylhet') }}</option>
                                                            <option value="7"
                                                                {{ '7' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Jessore') }}</option>
                                                            <option value="8"
                                                                {{ '8' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Barisal') }}</option>
                                                            <option value="9"
                                                                {{ '9' === $teacher->board ? 'selected' : '' }}>
                                                                {{ _lang('Madrasah') }}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Passing Year') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="passing_year"
                                                            value="{{ $teacher->passing_year }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Group') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="group">
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            <option value="1"
                                                                {{ '1' === $teacher->group ? 'selected' : '' }}>
                                                                {{ _lang('Science') }}</option>
                                                            <option value="2"
                                                                {{ '2' === $teacher->group ? 'selected' : '' }}>
                                                                {{ _lang('Humanities') }}</option>
                                                            <option value="3"
                                                                {{ '3' === $teacher->group ? 'selected' : '' }}>
                                                                {{ _lang('B. Studies') }}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Duration') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="edu_duration"
                                                            value="{{ $teacher->edu_duration }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Subject') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="subject"
                                                            value="{{ $teacher->subject }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Achivement') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="achivement"
                                                            value="{{ $teacher->achivement }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Marks') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="marks"
                                                            value="{{ $teacher->marks }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Division') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="division_grade">
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            <option value="1"
                                                                {{ '1' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('First Division') }}</option>
                                                            <option value="2"
                                                                {{ '2' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('Second Division') }}</option>
                                                            <option value="3"
                                                                {{ '3' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('Third Division') }}</option>
                                                            <option value="4"
                                                                {{ '4' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('A+') }}</option>
                                                            <option value="5"
                                                                {{ '5' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('A') }}</option>
                                                            <option value="6"
                                                                {{ '6' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('A-') }}</option>
                                                            <option value="7"
                                                                {{ '7' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('B') }}</option>
                                                            <option value="8"
                                                                {{ '8' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('C') }}</option>
                                                            <option value="9"
                                                                {{ '9' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('D') }}</option>
                                                            <option value="10"
                                                                {{ '10' === $teacher->division_grade ? 'selected' : '' }}>
                                                                {{ _lang('F') }}</option>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Attachment') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="file" class="form-control dropify"
                                                            name="attachment"
                                                            data-default-file="{{ asset('uploads/images/' . $teacher->attachment) }}"
                                                            data-allowed-file-extensions="doc pdf docx zip">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="experience">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Experience Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Organization Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="organization_name"
                                                            value="{{ $teacher->organization_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Organization Type') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="organization_type"
                                                            value="{{ $teacher->organization_type }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Joining Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="exp_joining_date"
                                                            value="{{ $teacher->exp_joining_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Resign Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="exp_resign_date"
                                                            value="{{ $teacher->exp_resign_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Designation') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="exp_designation"
                                                            value="{{ $teacher->exp_designation }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Duration') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="exp_duration"
                                                            value="{{ $teacher->exp_duration }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Department') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="exp_department"
                                                            value="{{ $teacher->exp_department }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Location') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="location"
                                                            value="{{ $teacher->location }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Responsibility') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="responsibility"
                                                            value="{{ $teacher->responsibility }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Attachment') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="file" class="form-control dropify"
                                                            name="exp_attachment"
                                                            data-default-file="{{ asset('uploads/images/' . $teacher->exp_attachment) }}"
                                                            data-allowed-file-extensions="doc pdf docx zip">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="training">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Trainging Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Title') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="training_title"
                                                            value="{{ $teacher->training_title }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Location') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="trainging_location"
                                                            value="{{ $teacher->trainging_location }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Institute') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="trainging_institute"
                                                            value="{{ $teacher->trainging_institute }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Country') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="trainging_country"
                                                            value="{{ $teacher->trainging_country }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Topic') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="trainging_topic"
                                                            value="{{ $teacher->trainging_topic }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Achivement') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="trainging_achivement"
                                                            value="{{ $teacher->trainging_achivement }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Duration') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="trainging_duration"
                                                            value="{{ $teacher->trainging_duration }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Note') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="trainging_note"
                                                            value="{{ $teacher->trainging_note }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Joining Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="trainging_join_date"
                                                            value="{{ $teacher->trainging_join_date }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('End Date') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control datepicker"
                                                            name="trainging_end_date"
                                                            value="{{ $teacher->trainging_end_date }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Attachment') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="file" class="form-control dropify"
                                                            name="trainging_attachment"
                                                            data-default-file="{{ asset('uploads/images/' . $teacher->trainging_attachment) }}"
                                                            data-allowed-file-extensions="doc pdf docx zip">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="bank">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Bank Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Account Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="bank_account_name"
                                                            value="{{ $teacher->bank_account_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Account Number') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="bank_account_number"
                                                            value="{{ $teacher->bank_account_number }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Primary Status') }}</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control select2" name="bank_status">
                                                            <option value="">{{ _lang('Select One') }}</option>
                                                            <option value="1"
                                                                {{ '1' === $teacher->bank_status ? 'selected' : '' }}>
                                                                {{ _lang('Active') }}</option>
                                                            <option value="2"
                                                                {{ '2' === $teacher->bank_status ? 'selected' : '' }}>
                                                                {{ _lang('Inactive') }}</option>
                                                        </select>
                                                    </div>
                                                    {{-- {!! generate_select(
                                                        'bank_status',
                                                        ['1'=>'yes', '2'=>'No'],
                                                        __('Primary Status'),
                                                        $teacher->bank_status,
                                                        false,
                                                        __('--Select Subject--'),
                                                        'form-control',
                                                    ) !!} --}}
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Bank Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="bank_name"
                                                            value="{{ $teacher->bank_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Account Type') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="bank_account_type"
                                                            value="{{ $teacher->bank_account_type }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Branch') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="bank_account_branch"
                                                            value="{{ $teacher->bank_account_branch }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="reference">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Reference Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Name') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="reference_name"
                                                            value="{{ $teacher->reference_name }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Organization') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="reference_organization"
                                                            value="{{ $teacher->reference_organization }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Designation') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="reference_designation"
                                                            value="{{ $teacher->reference_designation }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Relation') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="reference_relation"
                                                            value="{{ $teacher->reference_relation }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Phone') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="reference_mobile"
                                                            value="{{ $teacher->reference_mobile }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Address') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control"
                                                            name="reference_address"
                                                            value="{{ $teacher->reference_address }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">{{ _lang('Email') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="text" class="form-control" name="reference_email"
                                                            value="{{ $teacher->reference_email }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-12" id="login_details">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h2 class="sub-section-header">Login Info</h2>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Password') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control" name="password" autocomplete="new-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label
                                                        class="col-sm-12 control-label">{{ _lang('Confirm Password') }}</label>
                                                    <div class="col-sm-12">
                                                        <input type="password" class="form-control"
                                                            name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 mt-2">
                                <div class="form-group float-end">
                                    <div class="col-sm-3">
                                        <button type="submit"
                                            class="btn btn-info">{{ _lang('Update Teacher') }}</button>
                                    </div>
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
        $(document).ready(function() {
            $('.list-group-item').on('click', function() {
                // Remove active class from all links
                $('.list-group-item').removeClass('active');

                // Add active class to the clicked link
                $(this).addClass('active');
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scroll to the target div with a transition delay
            document.querySelectorAll('a.teacher-profile').forEach(function(anchor) {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default anchor behavior

                    var targetDivId = this.getAttribute(
                        'href'); // Get the target div ID from the href attribute
                    var targetDiv = document.querySelector(targetDivId); // Select the target div

                    if (targetDiv) {
                        // Scroll to the target div with a smooth transition
                        targetDiv.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Optional: Add a class for transition effect
                        targetDiv.classList.add('scroll-transition');

                        // Remove the class after the transition period
                        setTimeout(function() {
                                targetDiv.classList.remove('scroll-transition');
                            },
                            500
                            ); // Adjust the duration (in milliseconds) to match your CSS transition duration
                    }
                });
            });
        });
    </script>
@endsection
