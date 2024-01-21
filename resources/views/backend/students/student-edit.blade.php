@extends('layouts.backend')
@section('content')
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'firstTab')" id="defaultOpen">Basic Info</button>
        <button class="tablinks" onclick="openTab(event, 'secondTab')">Address & Progress Card </button>
        <button class="tablinks" onclick="openTab(event, 'fifthTab')">Gurdian Information</button>
        <button class="tablinks" onclick="openTab(event, 'thirdTab')">Academic Information</button>
        <button class="tablinks" onclick="openTab(event, 'fourthTab')">Local Gurdian Information</button>
    </div>
    <div id="firstTab" class="tabcontent">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default" data-collapsed="0">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <i class="entypo-plus-circled"></i>{{ _lang('Update  Student') }}
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-10">
                            <form action="{{ route('students.update', $data->student->id) }}"
                                class="form-horizontal form-groups-bordered" enctype="multipart/form-data" method="post"
                                accept-charset="utf-8">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('First Name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $data->student->first_name }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Last Name') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $data->student->last_name ?? '' }}" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Guardian') }}</label>
                                    <div class="col-sm-9">
                                        <select name="parent_id" class="form-control select2">
                                            <option value="">{{ _lang('Select One') }}</option>
                                            {{ create_option('parents', 'id', 'parent_name', $data->student->parent_id ?? '') }}
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Birthdate') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control datepicker" name="birthday"
                                            value="{{ $data->student->birthday ?? '' }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Gender') }}</label>
                                    <div class="col-sm-9">
                                        <select name="gender" class="form-control select2" required>
                                            <option @if ($data->student->gender == 'Male') selected @endif value="Male">Male
                                            </option>
                                            <option @if ($data->student->gender == 'Female') selected @endif value="Female">Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Blood Group') }}</label>
                                    <div class="col-sm-9">
                                        <select name="blood_group" class="form-control select2" required>
                                            <option value="">{{ _lang('Select One') }}</option>
                                            <option @if ($data->student->blood_group == 'N/A') selected @endif value="N/A">N/A
                                            </option>
                                            <option @if ($data->student->blood_group == 'A+') selected @endif value="A+">A+
                                            </option>
                                            <option @if ($data->student->blood_group == 'A-') selected @endif value="A-">A-
                                            </option>
                                            <option @if ($data->student->blood_group == 'B+') selected @endif value="B+">B+
                                            </option>
                                            <option @if ($data->student->blood_group == 'B-') selected @endif value="B-">B-
                                            </option>
                                            <option @if ($data->student->blood_group == 'AB+') selected @endif value="AB+">AB+
                                            </option>
                                            <option @if ($data->student->blood_group == 'AB-') selected @endif value="AB-">AB-
                                            </option>
                                            <option @if ($data->student->blood_group == 'O+') selected @endif value="O+">O+
                                            </option>
                                            <option @if ($data->student->blood_group == 'O+') selected @endif value="O-">O-
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Religion') }}</label>
                                    <div class="col-sm-9">
                                        <select name="religion" class="form-control select2" required>
                                            <option value="">{{ _lang('Select One') }}</option>
                                            {{ create_option('picklists', 'value', 'value', $data->student->religion, ['type=' => 'Religion']) }}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ $data->student->phone }}" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Address') }}</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="address">{{ $data->student->address ?? '' }}</textarea>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <input type="hidden" class="form-control" name="session_id"
                                        value="{{ $data->id }}">
                                    <input type="hidden" class="form-control" name="country" value="Bangladesh">
                                    <input type="hidden" class="form-control" name="state" value="Bangladesh">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Class') }}</label>
                                    <div class="col-sm-9">
                                        <select name="class" class="form-control select2" id="class" required>
                                            <option value="">{{ _lang('Select One') }}</option>
                                            {{ create_option('classes', 'id', 'class_name', $data->class_id) }}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Section') }}</label>
                                    <div class="col-sm-9">
                                        <select name="section" class="form-control select2" id="section"
                                            required>
                                            <option value="">{{ _lang('Select One') }}</option>
                                            @foreach ($sections as $section)
                                                <option data-class="{{ $data->class_id }}"
                                                    @if ($data->section_id == $section->id) selected @endif
                                                    value="{{ $section->id }}">{{ $section->section_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Group') }}</label>
                                    <div class="col-sm-9">
                                        <select name="group" class="form-control select2">
                                            <option value="">{{ _lang('Select One') }}</option>
                                            {{ create_option('student_groups', 'id', 'group_name', $data->student->group) }}
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Optional Subject') }}</label>
                                    <div class="col-sm-9">
                                        <select name="optional_subject" id="optional_subject"
                                            class="form-control select2">
                                            <option value="">{{ _lang('Select One') }}</option>
                                        </select>
                                    </div>
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Register No.') }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="register_no"
                                            value="{{ $data->student->register_no ?? '' }}" required>
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Roll No.') }}</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="roll"
                                            value="{{ $data->roll }}" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group">
                                    <label
                                        class="col-sm-3 control-label">{{ _lang('Extra Curricular Activities ') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="activities"
                                            value="{{ $data->student->activities ?? '' }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">{{ _lang('Remarks') }}</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="remarks"
                                            value="{{ $data->student->remarks ?? '' }}">
                                    </div>
                                </div> --}}
                                <hr>
                                @if (isset($data->student->user->image))
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">{{ _lang('Profile Picture') }}</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control dropify"
                                                data-default-file="{{ asset('uploads/images/' . $data->student->user->image) }}"
                                                name="image" data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-5">
                                        <button type="submit" class="btn btn-info">Update Student</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('vital.update', $student->studentId) }}" method="POST">
        @csrf
        @method('PUT')
        <div id="secondTab" class="tabcontent form-horizontal form-groups-bordered">

            <h3 class="text-center">Address </h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Permanent Address (Home)') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="permanent_address"
                        value="{{ $student->permanent_address }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Post Office') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="post_office" value="{{ $student->post_office }}"
                        style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Police Station') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="police_station"
                        value="{{ $student->police_station }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="permanent_address_phone"
                        value="{{ $student->permanent_address_phone }}" style="border:none;">
                </div>
            </div>
            <!-- Second Section -->
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Present Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="present_address"
                        value="{{ $student->present_address }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="present_address_phone"
                        value="{{ $student->present_address_phone }}" style="border:none;">
                </div>
            </div>
            <!-- Third Section -->
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Permanent District (Home)') }}:&nbsp;</label>
                <div class="col-sm-9"> <input type="text" class="form-control" name="permanent_district"
                        value="{{ $student->permanent_district }}" style="border:none;">
                </div>
            </div>
            <!-- Fourth Section -->
            <hr>
            <h3 class="text-center">Progress Card receiver Information</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('PROGRESS REPORT & LETTER TO BE SENT TO') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="progress_report_sent_to_relation"
                        value="{{ $student->progress_report_sent_to_relation }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Name') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="progress_report_sent_to_name"
                        value="{{ $student->progress_report_sent_to_name }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="progress_report_sent_to_address"
                        value="{{ $student->progress_report_sent_to_address }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Phone') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="progress_report_sent_to_phone"
                        value="{{ $student->progress_report_sent_to_phone }}" style="border:none;width:100%;">
                </div>
            </div>
            <hr>

            <button class="btn btn-success float-right " type="submit">Update</button>

        </div>
        <div id="thirdTab" class="tabcontent form-horizontal form-groups-bordered">
            <h3 cla4>Academic Information</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('School Name') }}</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ $student->institute_name }}" name="institute_name"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('School Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ $student->institute_address }}" name="institute_address"
                        class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('SSC board') }}</label>
                <div class="col-sm-9">
                    {{-- <input type="text" class="form-control" name="ssc_board" value="{{ $student->ssc_board }}"> --}}
                    <select name="board" class="form-control select2">
                        <option value="">---Select---</option>
                        @foreach (get_board_name() as $item)
                            <option value="{{ $item }}" {{ $item == $student->ssc_board ? 'selected' : '' }}>
                                {{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('SSC Group') }}</label>
                <div class="col-sm-9">
                    {{-- <input type="text" class="form-control" name="ssc_board" value="{{ $student->ssc_board }}"> --}}
                    <select name="ssc_group" class="form-control select2" onchange="selectSSCGroup()"
                    id="groupSelect">
                        <option value="">{{ _lang('Select One') }}</option>
                        {{ create_option('student_groups', 'id', 'group_name', $student->ssc_group) }}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Centre') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="center" value="{{ $student->center }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('SSC Roll No') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ssc_roll_no" value="{{ $student->ssc_roll_no }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('SSC Passing Year') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ssc_passing_year"
                        value="{{ $student->ssc_passing_year }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Reg. No.') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ssc_registration"
                        value="{{ $student->ssc_registration }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Session') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ssc_session" value="{{ $student->ssc_session }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Bangla Grade') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="bangla" value="{{ $student->bangla }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('English Grade') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="english" value="{{ $student->english }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Math Grade') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="math" value="{{ $student->math }}">
                </div>
            </div>
            <div class=" row  mt-2 scienceGroup  m-1 "style="display:none ">
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Physics') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="physics" value="{{ $student->ssc_physics }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Chemistry') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="chemistry" value="{{ $student->ssc_chemistry }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Biology') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="biology" value="{{ $student->ssc_biology }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Higher Math') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="higherMath" value="{{ $student->ssc_higherMath }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Bangladesh and Global Studies') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="bangladeshWorld" value="{{ $student->ssc_bangladeshWorld }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Agriculture Studies') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="agricultureStudies" value="{{ $student->ssc_agricultureStudies }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Home Science') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="homeScience" value="{{ $student->ssc_homeScience }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Other') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="other" value="{{ $student->ssc_other }}">
                    </div>
                </div>

            </div>
            <div class=" row  commerceGroup m-1" style="display: none">
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Finance & Banking') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="financeBanking" value="{{ $student->ssc_ssc_financeBanking }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Accounting') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="accounting" value="{{ $student->ssc_accounting }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Business Ent.') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="businessEnt" value="{{ $student->ssc_businessEnt }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('General Science') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="generalScience" value="{{ $student->ssc_generalScience }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Agricultural Studies') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="agricultureStudies" value="{{ $student->ssc_agricultureStudies }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Home Science') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="homeScience" value="{{ $student->ssc_homeScience }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Music') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="music" value="{{ $student->ssc_music }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Other') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="other" value="{{ $student->ssc_other }}">
                    </div>
                </div>

            </div>
            <div class="row   humanitiesGroup m-1" style="display: none">
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Geography') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="geography" value="{{ $student->ssc_geography }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Civic & Citizenship') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="civicCitizenship" value="{{ $student->ssc_civicCitizenship }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Economics') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="economics" value="{{ $student->ssc_economics }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('General Science') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="generalScienceOther" value="{{ $student->ssc_generalScience }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('History of Bangladesh') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="historyBangladesh" value="{{ $student->ssc_historyBangladesh }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Agriculture Studies') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="agricultureStudiesOther" value="{{ $student->ssc_agricultureStudies }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Home Science') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="homeScienceOther" value="{{ $student->ssc_homeScience }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">{{ _lang('Music') }}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="musicOther" value="{{ $student->ssc_music }}">
                    </div>
                </div>

            </div>
            {{-- <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Higher Math Grade') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="higher_math" value="{{ $student->higher_math }}">
                </div>
            </div> --}}
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('GPA Without 4th Subject') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="gpa_without_4th"
                        value="{{ $student->gpa_without_4th }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('GPA With 4th Subject') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="gpa_with_4th"
                        value="{{ $student->gpa_with_4th }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Total A+ Grades') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="total_a_plus"
                        value="{{ $student->total_a_plus }}">
                </div>
            </div>
            <button class="btn btn-success float-right " type="submit">Update</button>

        </div>
        <div id="fourthTab" class="tabcontent form-horizontal form-groups-bordered">
            <h3 class="text-center">Local Gurdian Information</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('LOCAL GUARDIAN\'S NAME') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_name"
                        value="{{ $student->local_guardian_name }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('LOCAL GUARDIAN\'S NID') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_nid"
                        value="{{ $student->local_guardian_nid }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Occupation') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_occupation"
                        value="{{ $student->local_guardian_occupation }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Residance Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_address"
                        value="{{ $student->local_guardian_address }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Phone (Home)') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_phone"
                        value="{{ $student->local_guardian_phone }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Relationship') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_relationship"
                        value="{{ $student->local_guardian_relationship }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Designation') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_designation"
                        value="{{ $student->local_guardian_designation }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Office Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_office_address"
                        value="{{ $student->local_guardian_office_address }}" style="border:none;width:100%;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Phone (Office)') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="local_guardian_office_phone"
                        value="{{ $student->local_guardian_office_phone }}" style="border:none;width:100%;">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <button type="submit" class="btn btn-info">Update Student</button>
                </div>
            </div>
        </div>
        <div id="fifthTab" class="tabcontent form-horizontal form-groups-bordered">
            <h3 class="text-center"> Gurdian Information</h3>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang("Father's NID") }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="father_nid" value="{{ $student->father_nid }}"
                        style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Father Designation') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="father_designation"
                        value="{{ $student->father_designation }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Father Office Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="father_office_address"
                        value="{{ $student->father_office_address }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Monthly Income of Parents') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="monthly_income_parents"
                        value="{{ $student->monthly_income_parents }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Total Monthly Income of Family') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="monthly_income_family"
                        value="{{ $student->monthly_income_family }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Mother\'s Name') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="m_name" value="{{ $student->m_name }}"
                        style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Mother\'s NID') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mother_nid" value="{{ $student->mother_nid }}"
                        style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Occupation') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="m_profession"
                        value="{{ $student->m_profession }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Mother\'s Designation') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mother_designation"
                        value="{{ $student->mother_designation }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Mother\'s Office Address') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mother_office_address"
                        value="{{ $student->mother_office_address }}" style="border:none;">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">{{ _lang('Mobile (Office)') }}</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="mother_phone"
                        value="{{ $student->mother_phone }}" style="border:none;">
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <button type="submit" class="btn btn-info">Update Student</button>
                </div>
            </div>
        </div>

    </form>

    <style>
        .tab {
            float: left;
            border: 1px solid #ccc;
            background-color: #dfe8eb;
            width: 15%;
            height: 300px;
            border-radius: 10px 0 0 10px;
        }

        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            /* padding: 22px 16px; */
            width: 90%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
            font-size: 17px;
            margin: 5%;
            border-radius: 4px;
        }

        .tab button:hover {
            background-color: #bee9f7;
        }

        .tab button.active {
            background-color: #6398a8;
        }

        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 80%;
            border-left: none;
            height: 400px;
            border-radius: 0 10px 10px 0;
        }
    </style>
@endsection
@section('js-script')
    <script>
        $(window).on('load', function() {
            //$("#section").next().find("ul li").css("display","none");
            var class_id = $("#class").val();
            $('#section option[data-class="' + class_id + '"]').each(function() {
                var section_id = $(this).val();
                $("#section").next().find("ul li[data-value='" + section_id + "']").css("display", "block");
            });

            load_option_subject();

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
                        var selectedValue = "{{ $data->optionalSubjectData->subject_name ?? '' }}";
                        $('#optional_subject option').filter(function() {
                            return $(this).text() === selectedValue;
                        }).attr('selected', true);
                    }
                });
            }

            $(document).on("change", "#class", function() {
                $("#section").val("");
                $("#section").next().find(".current").html("{{ _lang('Select One') }}");
                $("#section").next().find("ul li:not(:first-child)").css("display", "none");

                var class_id = $(this).val();
                $('#section option[data-class="' + class_id + '"]').each(function() {
                    var section_id = $(this).val();
                    $("#section").next().find("ul li[data-value='" + section_id + "']").css(
                        "display", "block");
                });
                //$("#section").next().find("ul li").css("display","none");
                //$("#section").val("");
            });
        });
    </script>
    <script>
        function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.getElementById("defaultOpen").click();

        $(document).ready(function() {
            selectSSCGroup()
        })

        function selectSSCGroup(){
            var stu = {!! json_encode($student) !!};
            var selectedValue = stu.ssc_group;
            console.log('selectedValue', selectedValue)
            if (selectedValue == 1) {
                $('.scienceGroup').show();
                $('.commerceGroup').hide();
                $('.humanitiesGroup').hide();
                console.log('scienceGroup');
                return false;

            }
            if (selectedValue == 2) {
                console.log('selectedValue', selectedValue)
                $('.scienceGroup').hide();
                $('.commerceGroup').show();
                $('.humanitiesGroup').hide();
                console.log('commerce');
                return false;


            }
            if (selectedValue == 3) {
                $('.scienceGroup').hide();
                $('.commerceGroup').hide();
                $('.humanitiesGroup').show();
                console.log('arts');
                return false;

            }
        }
    </script>
@stop
