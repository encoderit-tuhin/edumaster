<style>
    .shadow {
        background: white;
    }

    .sub-section-header {
        background: #0c2340;
        color: white;
        padding: 10px 30px;
        display: inline-block;
        font-size: 16px;
        position: relative;
    }


    .sub-section-header::after {
        content: "";
        width: 0;
        height: 0;
        border-top: 20px solid transparent;
        border-bottom: 20px solid transparent;
        border-left: 20px solid #0c2340;
        position: absolute;
        top: 0;
        right: -20px;
        margin-left: 58px;
    }

    .sub-sub-section-header {
        font-size: 14px;
        background: #0c2340;
        color: white;
        padding: 5px 10px;
        display: inline-block;
    }

    .btn-online-submit {
        background: #0c2340;
        border: none;
        border-radius: 0px;
        color: white !important;
    }

    .btn-online-submit:hover {
        background: #0c2340;
        opacity: 0.8;
    }

    .label-control .required,
    .label-control .required,
    .label-control .required {
        display: none;
    }
</style>

@php
    $scienceOptionalSubjects = get_ssc_subjects('science_optional');
    $businessStudiesOptionalSubjects = get_ssc_subjects('business_studies_optional');
    $humanitiesOptionalSubjects = get_ssc_subjects('humanities_optional');

    $selectedSubjects = [];
    if ($isEdit || $isAdmin) {
        // Get selected subjects
        $sscGroup = get_old_value($student, 'ssc_group');

        if ($sscGroup == 1) {
            $selectedSubjects = $scienceOptionalSubjects;
        } elseif ($sscGroup == 2) {
            $selectedSubjects = $businessStudiesOptionalSubjects;
        } elseif ($sscGroup == 3) {
            $selectedSubjects = $humanitiesOptionalSubjects;
        }
    }
@endphp


<form action="{{ $route }}" autocomplete="off" class="form-horizontal form-groups-bordered validate"
    enctype="multipart/form-data" method="post" accept-charset="utf-8">
    @csrf

    @if ($isAdmin && $isEdit)
        @method($method)
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Has success show success alert --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row shadow p-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('General Information') }}
            </h2>
        </div>
        {{-- Student Main informations --}}
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="first_name">{{ __('Name of Student') }}
                            {{ __('(in English)') }} <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="first_name"
                            placeholder="{{ __('Name of Student') }} {{ __('(in English)') }}"
                            value="{{ get_old_value($student, 'first_name') }}" id="first_name" autocomplete="off"
                            required>

                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="bangla_name">
                            {{ __('Name of Student') }} (বাংলায়)<span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="bangla_name"
                            placeholder="{{ __('Name of Student') }} (বাংলায়)"
                            value="{{ get_old_value($student, 'bangla_name') }}" id="bangla_name" autocomplete="off"
                            required>

                        @error('bangla_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Nick Name') }} <span class="text-danger"> *</span></label>
                        <input type="text" class="form-control" name="nick_name"
                            value="{{ get_old_value($student, 'nick_name') }}"
                            placeholder="{{ __('Student\'s Nick Name') }}" required>

                        @error('nick_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @if ($isEdit || $isAdmin)
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">{{ __('Application No') }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="application_number"
                                value="{{ get_old_value($student, 'application_number') }}"
                                placeholder="{{ __('Student\'s Application No') }}">
                        </div>
                    </div>
                @endif
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Phone') }} <span class="text-danger"> *</span></label>
                        <input class="form-control" name="phone" value="{{ get_old_value($student, 'phone') }}"
                            pattern="[0-9]{11}" minlength="11" placeholder="{{ __('Student\'s Phone Number') }}"
                            autocomplete="off" required>
                        <p class="text-secondary" style="font-size: 12px;">
                            {{ __('11 Digit phone number. eg: 01951xxxx10') }}</p>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="gender" value="Male">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Birthdate') }} <span class="text-danger"> *</span></label>
                        <input type="date" class="form-control" name="birthday"
                            value="{{ get_old_value($student, 'birthday') }}" required>

                        @error('birthday')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {!! get_blood_groups_select('blood_group', __('Blood Group'), get_old_value($student, 'blood_group')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Religion') }} <span class="text-danger"> *</span></label>
                        <select name="religion" class="form-control wide" required>
                            <option value="">{{ __('--Select--') }}</option>
                            {{ create_option('picklists', 'value', 'value', get_old_value($student, 'religion'), ['type=' => 'Religion']) }}
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Sect') }}</label>
                        <input type="text" class="form-control" name="sect"
                            placeholder="Enter Sect, eg: Sunni, Shia, Others"
                            value="{{ get_old_value($student, 'sect') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Ethnic') }}</label>
                        <input type="text" class="form-control" name="ethnic" placeholder=""
                            value="{{ get_old_value($student, 'ethnic') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">{{ __('Birth Cetificate no') }}</label>
                        <input type="text" class="form-control" name="birth_certificate_no"
                            placeholder="eg: 200010xxx"
                            value="{{ get_old_value($student, 'birth_certificate_no') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <label class="control-label">
                {{ __('Profile Picture') }}
                ({{ __('300px X 300px') }})
                <span class="text-danger"> *</span>
            </label>
            <input type="file" class="form-control dropify" name="image"
                {{ empty(get_old_value($student, 'image')) ? 'required' : '' }}
                data-allowed-file-extensions="png jpg jpeg PNG JPG JPEG" {{-- width, height 300px --}} data-max-file-size="5M"
                data-height="300"
                data-default-file="{{ !empty(get_old_value($student, 'image')) ? asset('uploads/images/' . get_old_value($student, 'image')) : null }}" />
            <p class="text-secondary" style="font-size: 12px">
                {{ __('Max File Size') }}: 5MB | {{ __('Allowed File Extensions') }}: .png, .jpg,
                .jpeg
            </p>
        </div>
        {{-- End Student Main informations --}}
    </div>

    <div class="row shadow p-4 mt-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('Admission Information') }}
            </h2>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('Admission Class') }} <span class="text-danger"> *</span></label>
                <select name="class_id" class="form-control" id="class" required>
                    <option value="">{{ __('--Select--') }}</option>
                    {{ create_option('classes', 'id', 'class_name', get_old_value($student, 'class_id')) }}
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <label class="control-label">
                {{ __('Session') }} <span class="text-danger"> *</span>
            </label>
            <select class="form-control" name="session_id" required>
                @foreach (get_table('academic_years') as $session)
                    <option value="{{ $session->id }}"
                        {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                        {{ $session->year }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">
                    {{ __('Group to study') }}
                    <span class="text-danger"> *</span>
                </label>
                <select name="group_id" class="form-control" required>
                    <option value="">{{ __('--Select Group--') }}</option>
                    {{ create_option('student_groups', 'id', 'group_name', get_old_value($student, 'group_id')) }}
                </select>
            </div>
        </div>
        @if ($isEdit || $isAdmin)
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Section') }}
                        <span class="text-danger"> *</span>
                    </label>
                    <select name="section_id" class="form-control" required>
                        <option value="">{{ __('--Select Section--') }}</option>
                        {{ create_option('sections', 'id', 'section_name', get_old_value($student, 'section_id')) }}
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('College Roll No') }}
                        <span class="text-danger"> *</span>
                    </label>
                    <input type="number" class="form-control" name="roll"
                        placeholder="{{ __('College Roll No') }}" value="{{ get_old_value($student, 'roll') }}"
                        required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Date Of Admission') }}</label>
                    <input type="date" class="form-control" name="date_of_admission"
                        placeholder="{{ __('Date Of Admission') }}"
                        value="{{ get_old_value($student, 'date_of_admission') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Serial No') }}</label>
                    <input type="number" class="form-control" name="serial_no" placeholder="{{ __('Serial No') }}"
                        value="{{ get_old_value($student, 'serial_no') }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Place') }}</label>
                    <input type="text" class="form-control" name="admission_place"
                        placeholder="{{ __('Place') }}" value="{{ get_old_value($student, 'admission_place') }}">
                </div>
            </div>
        @endif
        <div class="col-md-12">
            <h3
                style="font-size: 16px;font-weight: bolder;border-bottom: 2px solid #ccc;padding-bottom: 10px;display: inline-block;background: #0c2340;padding: 4px 20px 4px 20px;color: #fff;margin-top: 20px;">
                {{ __('Subjects you wish to study at Notre Dame College Mymensingh') }}
            </h3>
            <span>{{ __('Please select both class and group to get list.') }}</span>
            <div id="subject-choicer">
                @if (!empty($student) && !empty($student->class_id) && !empty($student->group_id))
                    @include('partials.subject-chooser', [
                        'student' => $student,
                        'compulsory_subjects' => App\Subject::getCompulsorySubjects(1, $student->group_id),
                        'elective_or_optional_subjects' => App\Subject::getElectiveOrOptionalSubjects(1),
                    ])
                @endif
            </div>
        </div>
    </div>

    {{-- Student SSC Information --}}
    <div class="row shadow p-4 mt-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('SSC Information') }}
            </h2>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('SSC Group') }} <span class="text-danger"> *</span></label>
                <select name="ssc_group" class="form-control" required onchange="selectSSCGroup()" id="groupSelect">
                    <option value="">{{ __('--Select Group--') }}</option>
                    {{ create_option('student_groups', 'id', 'group_name', get_old_value($student, 'ssc_group')) }}
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('School Name') }} <span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="school_name" placeholder="{{ __('School Name') }}"
                    value="{{ get_old_value($student, 'school_name') }}" required>
                @error('school_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('School Address') }} <span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="school_address"
                    placeholder="{{ __('School Address') }}" value="{{ get_old_value($student, 'school_address') }}"
                    required>

                @error('school_address')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('Board') }} <span class="text-danger"> *</span></label>
                <select name="board" class="form-control" required>
                    <option value="">{{ __('---Select Board---') }}</option>
                    @foreach ($boards as $item)
                        <option value="{{ $item }}"
                            {{ get_old_value($student, 'board') == $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>

                @error('board')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('Exam Center') }} <span class="text-danger"> *</span></label>
                <input type="text" class="form-control" name="center" placeholder="Exam Center"
                    value="{{ get_old_value($student, 'center') }}" required>

                @error('center')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! get_year_select('passing_year', __('Passing year'), get_old_value($student, 'passing_year'), true) !!}

                @error('passing_year')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {!! generate_select(
                    'ssc_session',
                    [
                        '2018-2019' => '2018-2019',
                        '2019-2020' => '2019-2020',
                        '2021-2022' => '2021-2022',
                        '2022-2023' => '2022-2023',
                    ],
                    __('Registration Year/Session'),
                    get_old_value($student, 'ssc_session'),
                    true,
                    __('--Select Year/Session--'),
                    'form-control',
                ) !!}

                @error('ssc_session')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('SSC Roll No') }} <span class="text-danger"> *</span></label>
                <input type="number" class="form-control" name="board_roll" placeholder="Enter SSC Roll No"
                    value="{{ get_old_value($student, 'board_roll') }}" required>

                @error('board_roll')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label">{{ __('Registration No.') }} <span class="text-danger">
                        *</span></label>
                <input type="number" class="form-control" name="registration_number"
                    placeholder="Board Registration No" value="{{ get_old_value($student, 'registration_number') }}"
                    required>

                @error('registration_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-control">{{ __('GPA (with additional subject)') }}</label>
                <input type="number" step="any" name="gpa_with_4th" class="form-control" placeholder="eg: 5.0"
                    value="{{ get_old_value($student, 'gpa_with_4th') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-control">{{ __('GPA (without additional subject)') }}</label>
                <input type="number" step="any" name="gpa_without_4th" class="form-control"
                    placeholder="eg: 4.5" value="{{ get_old_value($student, 'gpa_without_4th') }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="label-control">{{ __('No. of A+') }}</label>
                <input type="number" step="any" name="total_a_plus" class="form-control" placeholder="eg: 4"
                    value="{{ get_old_value($student, 'total_a_plus') }}">
            </div>
        </div>
        {{-- <div class="col-lg-6">
                <div class="form-group">
                    <label class="control-label">{{ __('Vital 201') }}</label>
                    <input type="text" class="form-control" name="vital_201" placeholder="Vital 201"
                        value="{{ get_old_value($student, 'vital_201') }}" required>

                    @error('vital_201')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div> --}}
    </div>

    <div class="row shadow p-4 mt-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('SSC Letter Grades') }}
            </h2>
            <br>
            <h3 class="sub-sub-section-header">
                {{ __('General Compulsory Subjects') }}
            </h3>
        </div>

        @foreach (get_ssc_subjects('compulsory') as $subject => $subjectLabel)
            <div class="col-md-3">
                <div class="form-group">
                    {!! get_grades_select($subject, $subjectLabel, get_old_value($student, $subject)) !!}
                </div>
            </div>
        @endforeach

        <div class="col-md-12">
            <h3 class="sub-sub-section-header">
                {{ __('Group Compulsory Subjects') }}
            </h3>
            @foreach (['science', 'business_studies', 'humanities'] as $group)
                <div class="row mt-2 {{ $group }}" style="display: none">
                    @foreach (get_ssc_subjects($group) as $subject => $subjectLabel)
                        <div class="col-md-3">
                            <div class="form-group">
                                {!! get_grades_select($subject, $subjectLabel, get_old_value($student, $subject)) !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="col-md-12">
            <h3 class="sub-sub-section-header">
                {{ __('Additional Subject') }}
            </h3>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                {!! generate_select(
                    'subject_4th',
                    $selectedSubjects,
                    __('Optional Subject'),
                    get_old_value($student, 'subject_4th'),
                    false,
                    __('--Select Subject--'),
                    'form-control',
                ) !!}
            </div>
        </div>

        <div class="col-md-3 grade_4th_sub" style="display: none">
            <div class="form-group">
                {!! get_grades_select('grade_4th_sub', __('4th Subject Grade'), get_old_value($student, 'grade_4th_sub')) !!}
            </div>
        </div>
    </div>

    {{-- Student Parent Information --}}
    <div class="row shadow p-4 mt-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('Parent & Address Information') }}
            </h2>
        </div>
        <div class="row p-4">
            <div class="col-md-6 p-0 m-0">
                <div class="border-right shadow mr-2">
                    <h3 class="sub-sub-section-header">
                        {{ __('Father\'s Information') }}
                    </h3>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __("Father's Name") }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="father_name"
                                    placeholder="Father's Name" value="{{ get_old_value($student, 'father_name') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">{{ __("Father's Phone Number") }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="father_phone_no"
                                    placeholder="Father's Phone No." pattern="[0-9]{11}" minlength="11"
                                    maxlength="11" value="{{ get_old_value($student, 'father_phone_no') }}"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __("Father's occupation") }} <span class="text-danger"> *</span>
                                </label>
                                <input type="text" class="form-control" name="father_occupation"
                                    placeholder="Father's Occupation"
                                    value="{{ get_old_value($student, 'father_occupation') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __("Father's Designation") }}
                                </label>
                                <input type="text" class="form-control" name="father_designation"
                                    placeholder="Father's Designation"
                                    value="{{ get_old_value($student, 'father_designation') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __("Father's Office Address") }}
                                </label>
                                <input type="text" class="form-control" name="father_office_address"
                                    placeholder="{{ __("Father's Office Address") }}"
                                    value="{{ get_old_value($student, 'father_office_address') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('Father NID') }}
                                </label>
                                <input type="text" class="form-control" name="father_nid"
                                    placeholder="{{ __('Father NID') }}"
                                    value="{{ get_old_value($student, 'father_nid') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('Monthly Income of Parents (Tk)') }}
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="number" class="form-control" name="monthly_income_parents"
                                    placeholder="eg: 10000"
                                    value="{{ get_old_value($student, 'monthly_income_parents') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('Total Monthly Income of Family (Tk)') }}
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="number" class="form-control" name="monthly_income_family"
                                    placeholder="eg: 20000"
                                    value="{{ get_old_value($student, 'monthly_income_family') }}" required>

                                @error('monthly_income_family')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-right shadow">
                <h3 class="sub-sub-section-header">
                    {{ __('Mother\'s Information') }}
                </h3>
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">{{ __("Mother's Name") }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mother_name"
                                placeholder="Mother's Name" value="{{ get_old_value($student, 'mother_name') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">{{ __("Mother's Phone Number") }} <span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="mother_phone_no"
                                placeholder="Mother's Phone No."
                                value="{{ get_old_value($student, 'mother_phone_no') }}" pattern="[0-9]{11}"
                                minlength="11" maxlength="11" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                {{ __("Mother's occupation") }} <span class="text-danger"> *</span>
                            </label>
                            <input type="text" class="form-control" name="mother_occupation"
                                placeholder="Mother's Occupation"
                                value="{{ get_old_value($student, 'mother_occupation') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                {{ __("Mother's Designation") }}
                            </label>
                            <input type="text" class="form-control" name="mother_designation"
                                placeholder="eg: Housewife"
                                value="{{ get_old_value($student, 'mother_designation') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                {{ __("Mother's Office Address") }}
                            </label>
                            <input type="text" class="form-control" name="mother_office_address"
                                placeholder="Mother Office Address"
                                value="{{ get_old_value($student, 'mother_office_address') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                {{ __('Mother NID') }}
                            </label>
                            <input type="text" class="form-control" name="mother_nid"
                                placeholder="{{ __('Mother NID') }}"
                                value="{{ get_old_value($student, 'mother_nid') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-0 m-0 mt-4">
                <div class="border-right shadow mr-2">
                    <h3 class="sub-sub-section-header">
                        {{ __('Present Address') }}
                    </h3>
                    <div class="row p-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="present_address">
                                    {{ __('Present Address') }}
                                    <span class="text-danger"> *</span>
                                </label>
                                <textarea type="text" class="form-control" name="present_address" id="present_address"
                                    placeholder="{{ __('Present Address') }}" required>{{ get_old_value($student, 'present_address') }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">
                                    {{ __('Phone (Res)') }}
                                    <span class="text-danger"> *</span>
                                </label>
                                <input type="text" class="form-control" name="present_address_phone"
                                    placeholder="eg: 019xx" pattern="[0-9]{11}" minlength="11" maxlength="11"
                                    value="{{ get_old_value($student, 'present_address_phone') }}" required>

                                @error('present_address_phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 border-right shadow mt-4">
                <h3 class="sub-sub-section-header">
                    {{ __('Permanent Information') }}
                </h3>
                <label class="float-right" style="font-size: 12px;">
                    <input type="checkbox" onchange="sameAsPresentAddress(this)" id="sameAsPresentAddress" />
                    {{ __('Same as Present Address') }}
                </label>

                <div class="clearfix"></div>
                <div class="row p-2">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                {{ __('Permanent Address') }}
                                <span class="text-danger"> *</span>
                            </label>
                            <textarea type="text" class="form-control" name="permanent_address" id="permanent_address"
                                placeholder="Permanent Address" required>{{ get_old_value($student, 'permanent_address') }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {!! get_districts_select(
                                'permanent_district',
                                __('Home District'),
                                get_old_value($student, 'permanent_district'),
                                true,
                            ) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row shadow p-4 mt-4">
        <div class="col-md-12">
            <h2 class="sub-section-header">
                {{ __('Local Guardian Information') }}
            </h2>
        </div>
        <div class="row p-4">
            <div class="col-md-3">
                <div class="form-group">
                    {!! get_relations_select(
                        'local_guardian_relation',
                        __('Relation'),
                        get_old_value($student, 'local_guardian_relation'),
                    ) !!}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="local_guardian_name"
                        placeholder="{{ __('Name') }}"
                        value="{{ get_old_value($student, 'local_guardian_name') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Occupation') }}</label>
                    <input type="text" class="form-control" name="local_guardian_occupation"
                        placeholder="{{ __('Occupation') }}"
                        value="{{ get_old_value($student, 'local_guardian_occupation') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Designation') }}</label>
                    <input type="text" class="form-control" name="local_guardian_designation"
                        placeholder="{{ __('Designation') }}"
                        value="{{ get_old_value($student, 'local_guardian_designation') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Phone Residence') }}</label>
                    <input type="text" class="form-control" name="local_guardian_phone_res"
                        placeholder="{{ __('Phone Residence') }}" pattern="[0-9]{11}" minlength="11"
                        maxlength="11" value="{{ get_old_value($student, 'local_guardian_phone_res') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Phone Office') }}</label>
                    <input type="text" class="form-control" name="local_guardian_phone_office"
                        placeholder="{{ __('Phone Office') }}" pattern="[0-9]{11}" minlength="11" maxlength="11"
                        value="{{ get_old_value($student, 'local_guardian_phone_office') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('NID') }}</label>
                    <input type="text" class="form-control" name="local_guardian_nid"
                        placeholder="{{ __('NID') }}"
                        value="{{ get_old_value($student, 'local_guardian_nid') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Organization') }}</label>
                    <input type="text" class="form-control" name="local_guardian_organization"
                        placeholder="{{ __('Organization') }}"
                        value="{{ get_old_value($student, 'local_guardian_organization') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control" name="local_guardian_address"
                        placeholder="{{ __('Address') }}"
                        value="{{ get_old_value($student, 'local_guardian_address') }}">
                </div>
            </div>
        </div>
    </div>

    @if ($isEdit || $isAdmin)
        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('Information Sent to (Via SMS)') }}
                </h2>
            </div>
            <div class="row p-4">
                <div class="col-md-3">
                    <div class="form-group">
                        {!! get_relations_select(
                            'information_sent_to_relation',
                            __('Relation'),
                            get_old_value($student, 'information_sent_to_relation'),
                            true,
                        ) !!}
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">
                            {{ __('Name') }}
                            <span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" name="information_sent_to_name"
                            placeholder="{{ __('Name') }}"
                            value="{{ get_old_value($student, 'information_sent_to_name') }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">
                            {{ __('Phone') }}
                            <span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" name="information_sent_to_phone"
                            placeholder="{{ __('Phone') }}"
                            value="{{ get_old_value($student, 'information_sent_to_phone') }}" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">
                            {{ __('Address') }}
                            <span class="text-danger"> *</span></label>
                        <textarea type="text" class="form-control" name="information_sent_to_address" placeholder="{{ __('Address') }}"
                            required>{{ get_old_value($student, 'information_sent_to_address') }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('Co-Curricular Activities') }}
                </h2>
            </div>
            <div class="row p-4">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Sports') }}</label>
                        <input type="text" class="form-control" name="co_curricular_activities_sports"
                            placeholder="{{ __('Sports') }}"
                            value="{{ get_old_value($student, 'co_curricular_activities_sports') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Clubs') }}</label>
                        <input type="text" class="form-control" name="co_curricular_activities_clubs"
                            placeholder="{{ __('Clubs') }}"
                            value="{{ get_old_value($student, 'co_curricular_activities_clubs') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Others') }}</label>
                        <input type="text" class="form-control" name="co_curricular_activities_others"
                            placeholder="{{ __('Others') }}"
                            value="{{ get_old_value($student, 'co_curricular_activities_others') }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('Vital Sports Information Set') }}
                </h2>
            </div>
            <div class="row p-4">
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Sports') }}</label>
                        <input type="text" class="form-control" name="vital_sports"
                            placeholder="{{ __('Sports') }}"
                            value="{{ get_old_value($student, 'vital_sports') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('College Team') }}</label>
                        <input type="text" class="form-control" name="vital_sports_college_team"
                            placeholder="{{ __('College Team') }}"
                            value="{{ get_old_value($student, 'vital_sports_college_team') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Inter-Class') }}</label>
                        <input type="text" class="form-control" name="vital_sports_inter_class"
                            placeholder="{{ __('Inter-Class') }}"
                            value="{{ get_old_value($student, 'vital_sports_inter_class') }}">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{{ __('Details/Awards') }}</label>
                        <textarea type="text" class="form-control" name="vital_sports_awards" placeholder="{{ __('Details/Awards') }}">{{ get_old_value($student, 'vital_sports_awards') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($isEdit || $isAdmin)
        {{-- Add More Student's Information. --}}
        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('Add More Student`s Information.') }}
                </h2>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Dropped Date') }}
                    </label>
                    <input type="date" class="form-control" name="dropped_date"
                        placeholder="{{ __('Dropped Date') }}"
                        value="{{ get_old_value($student, 'dropped_date') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Recommendation Gives On') }}
                    </label>
                    <input type="text" class="form-control" name="recommendation_gives_on"
                        placeholder="{{ __('Recommendation Gives On') }}"
                        value="{{ get_old_value($student, 'recommendation_gives_on') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Reason') }}
                    </label>
                    <input type="text" class="form-control" name="reason" placeholder="{{ __('Reason') }}"
                        value="{{ get_old_value($student, 'reason') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Remarks') }}
                    </label>
                    <input type="text" class="form-control" name="remarks" placeholder="{{ __('Remarks') }}"
                        value="{{ get_old_value($student, 'remarks') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Scholarship Type') }}</label>
                    <input type="number" step="any" class="form-control" name="scholarship_type"
                        placeholder="{{ __('Scholarship Type') }}"
                        value="{{ get_old_value($student, 'scholarship_type') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Annual lump grant 1st year (tk)') }}</label>
                    <input type="number" step="1" class="form-control" name="annual_lump_grant_1st_year_tk"
                        placeholder="{{ __('Annual lump grant 1st year (tk)') }}"
                        value="{{ get_old_value($student, 'annual_lump_grant_1st_year_tk') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Annual lump grant 2nd year (tk)') }}</label>
                    <input type="number" step="1" class="form-control" name="annual_lump_grant_2nd_year_tk"
                        placeholder="{{ __('Annual lump grant 2nd year (tk)') }}"
                        value="{{ get_old_value($student, 'annual_lump_grant_2nd_year_tk') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Monthly Tk') }}</label>
                    <input type="number" class="form-control" name="monthly_tk"
                        placeholder="{{ __('Monthly Tk') }}" value="{{ get_old_value($student, 'monthly_tk') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('Period total months') }}</label>
                    <input type="number" class="form-control" name="period_total_months"
                        placeholder="{{ __('Period total months') }}"
                        value="{{ get_old_value($student, 'period_total_months') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('From') }}</label>
                    <input type="number" class="form-control" name="from_year" placeholder="{{ __('From') }}"
                        value="{{ get_old_value($student, 'from_year') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('To') }}</label>
                    <input type="number" class="form-control" name="to_year" placeholder="{{ __('To') }}"
                        value="{{ get_old_value($student, 'to_year') }}">
                </div>
            </div>
        </div>

        {{-- Period(Total Months) --}}
        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('Outstanding Achivements') }}
                </h2>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Tc Date') }}
                    </label>
                    <input type="date" class="form-control" name="tc_date" placeholder="{{ __('Tc Date') }}"
                        value="{{ get_old_value($student, 'tc_date') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Field one') }}
                    </label>
                    <input type="text" class="form-control" name="field_one"
                        placeholder="{{ __('Field one') }}" value="{{ get_old_value($student, 'field_one') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Field Two') }}
                    </label>
                    <input type="text" class="form-control" name="field_two"
                        placeholder="{{ __('Field Two') }}" value="{{ get_old_value($student, 'field_two') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Promoted to class xii') }}
                    </label>
                    <input type="text" class="form-control" name="promoted_to_class_xll"
                        placeholder="{{ __('Promoted to class xii') }}"
                        value="{{ get_old_value($student, 'promoted_to_class_xll') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Science Club') }}
                    </label>
                    <input type="text" class="form-control" name="science_club"
                        placeholder="{{ __('Science Club') }}"
                        value="{{ get_old_value($student, 'science_club') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Science club awards') }}
                    </label>
                    <input type="text" class="form-control" name="science_club_awards"
                        placeholder="{{ __('Science club awards') }}"
                        value="{{ get_old_value($student, 'science_club_awards') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Science fair') }}
                    </label>
                    <input type="text" class="form-control" name="science_fair"
                        placeholder="{{ __('Science fair') }}"
                        value="{{ get_old_value($student, 'science_fair') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Science fair awards') }}
                    </label>
                    <input type="text" class="form-control" name="science_fair_awards"
                        placeholder="{{ __('Science fair awards') }}"
                        value="{{ get_old_value($student, 'science_fair_awards') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Com/Arts/Sci club') }}
                    </label>
                    <input type="text" class="form-control" name="com_arts_sci_club"
                        placeholder="{{ __('Com/Arts/Sci club') }}"
                        value="{{ get_old_value($student, 'com_arts_sci_club') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Com/Arts/Sci awards') }}
                    </label>
                    <input type="text" class="form-control" name="com_arts_sci_awards"
                        placeholder="{{ __('Com/Arts/Sci awards') }}"
                        value="{{ get_old_value($student, 'com_arts_sci_awards') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Notre dame volunteers alliance') }}
                    </label>
                    <input type="text" class="form-control" name="notre_dame_volunteers_alliance"
                        placeholder="{{ __('Notre dame volunteers alliance') }}"
                        value="{{ get_old_value($student, 'notre_dame_volunteers_alliance') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Notre dame volunteers alliance awards') }}
                    </label>
                    <input type="text" class="form-control" name="notre_dame_volunteers_alliance_awards"
                        placeholder="{{ __('Notre dame volunteers alliance awards') }}"
                        value="{{ get_old_value($student, 'notre_dame_volunteers_alliance_awards') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Debate collage') }}
                    </label>
                    <input type="text" class="form-control" name="debate_collage"
                        placeholder="{{ __('Debate collage') }}"
                        value="{{ get_old_value($student, 'debate_collage') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Inter collage') }}
                    </label>
                    <input type="text" class="form-control" name="inter_collage"
                        placeholder="{{ __('Inter collage') }}"
                        value="{{ get_old_value($student, 'inter_collage') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('Inter collage awards') }}
                    </label>
                    <input type="text" class="form-control" name="inter_collage_awards"
                        placeholder="{{ __('Inter collage awards') }}"
                        value="{{ get_old_value($student, 'inter_collage_awards') }}">
                </div>
            </div>
        </div>
    @endif

    @if ($isEdit || $isAdmin)
        <div class="row shadow p-4 mt-4">
            <div class="col-md-12">
                <h2 class="sub-section-header">
                    {{ __('HSC Result') }}
                </h2>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">
                        {{ __('HSC Roll') }}
                    </label>
                    <input type="number" class="form-control" name="hsc_roll" placeholder="{{ __('HSC Roll') }}"
                        value="{{ get_old_value($student, 'hsc_roll') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! get_year_select('hsc_year', __('HSC Year'), get_old_value($student, 'hsc_year')) !!}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Registration') }}</label>
                    <input type="number" class="form-control" name="hsc_reg"
                        placeholder="{{ __('HSC Registration') }}"
                        value="{{ get_old_value($student, 'hsc_reg') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    {!! generate_select(
                        'hsc_session',
                        [
                            '2018-2019' => '2018-2019',
                            '2019-2020' => '2019-2020',
                            '2021-2022' => '2021-2022',
                            '2022-2023' => '2022-2023',
                            '2023-2024' => '2023-2024',
                        ],
                        __('Registration Year/Session'),
                        get_old_value($student, 'hsc_session'),
                        false,
                        __('--Select Year/Session--'),
                        'form-control',
                    ) !!}
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC GPA') }}</label>
                    <input type="number" step="any" class="form-control" name="hsc_gpa"
                        placeholder="{{ __('HSC GPA') }}" value="{{ get_old_value($student, 'hsc_gpa') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Total A Plus') }}</label>
                    <input type="number" step="1" class="form-control" name="hsc_total_a_plus"
                        placeholder="{{ __('HSC Total A Plus') }}"
                        value="{{ get_old_value($student, 'hsc_total_a_plus') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Total Appeared') }}</label>
                    <input type="number" class="form-control" name="hsc_total_appeared"
                        placeholder="{{ __('HSC Total Appeared') }}"
                        value="{{ get_old_value($student, 'hsc_total_appeared') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Total Passed') }}</label>
                    <input type="number" class="form-control" name="hsc_total_passed"
                        placeholder="{{ __('HSC Total Passed') }}"
                        value="{{ get_old_value($student, 'hsc_total_passed') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Percentage') }}</label>
                    <input type="number" class="form-control" name="hsc_percentage"
                        placeholder="{{ __('HSC Percentage') }}"
                        value="{{ get_old_value($student, 'hsc_percentage') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Tec') }}</label>
                    <input type="text" class="form-control" name="hsc_tec" placeholder="{{ __('HSC Tec') }}"
                        value="{{ get_old_value($student, 'hsc_tec') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Subject') }}</label>
                    <input type="text" class="form-control" name="hsc_subject"
                        placeholder="{{ __('HSC Subject') }}"
                        value="{{ get_old_value($student, 'hsc_subject') }}">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">{{ __('HSC Total Combined') }}</label>
                    <input type="text" class="form-control" name="hsc_total_combined"
                        placeholder="{{ __('HSC Total Combined') }}"
                        value="{{ get_old_value($student, 'hsc_total_combined') }}">
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <input type="hidden" class="form-control" name="country" value="Bangladesh">
        <input type="hidden" class="form-control" name="state" value="Bangladesh">
    </div>

    <div class="mt-4">
        <button type="submit" class="btn btn-primary btn-lg btn-online-submit">
            <i class="fa fa-check-circle"></i>
            @if ($isEdit || $isAdmin)
                {{ __('Save Application') }}
            @else
                {{ __('Submit Application') }}
            @endif
        </button>
    </div>
</form>


@section('scripts')
    <!-- aos animate js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- include js -->
    <script>
        var selectedValue = {{ $student->ssc_group ?? 0 }};
        if (!!selectedValue) {
            selectSSCGroup();

            // Trigger change event to 'ssc_group')[0] with value empty first
        }

        function selectSSCGroup() {
            var selectElement = document.getElementById("groupSelect");
            if (!!selectElement?.value) {
                selectedValue = selectElement.value;
            }

            if (!!selectedValue) {
                $('.grade_4th_sub').show();
            } else {
                $('.grade_4th_sub').hide();
            }

            if (selectedValue == 1) {
                $('.science').show();
                $('.business_studies').hide();
                $('.humanities').hide();
                return false;
            }
            if (selectedValue == 2) {
                $('.science').hide();
                $('.business_studies').show();
                $('.humanities').hide();
                return false;
            }
            if (selectedValue == 3) {
                $('.science').hide();
                $('.business_studies').hide();
                $('.humanities').show();
                return false;
            }
        }

        function sameAsPresentAddress(checkbox) {
            if (checkbox.checked) {
                document.getElementById('permanent_address').value = document.getElementById('present_address')
                    .value;
            } else {
                document.getElementById('permanent_address').value = '';
            }
        }

        // listen change for select by name 'subject_4th'
        document.getElementsByName('ssc_group')[0].addEventListener('change', function() {
            var selectedSubject = this.value;
            var optionalSubjects = [];

            if (selectedSubject == 1) {
                optionalSubjects = {!! json_encode($scienceOptionalSubjects) !!};
            } else if (selectedSubject == 2) {
                optionalSubjects = {!! json_encode($businessStudiesOptionalSubjects) !!};
            } else if (selectedSubject == 3) {
                optionalSubjects = {!! json_encode($humanitiesOptionalSubjects) !!};
            }

            // make object to array.
            optionalSubjects = Object.keys(optionalSubjects).map(function(key) {
                return {
                    value: key,
                    text: optionalSubjects[key]
                }
            });

            // Add subject_4th field with optionalSubject values.
            var subject_4th = document.getElementsByName('subject_4th')[0];
            subject_4th.innerHTML = '';

            // add empty option
            var option = document.createElement('option');
            option.value = '';
            option.text = '--Select Subject--';
            subject_4th.appendChild(option);

            // Add options from optionalSubject
            optionalSubjects.forEach(function(item) {
                var option = document.createElement('option');
                option.value = item.value;
                option.text = item.text;
                subject_4th.appendChild(option);
            });

            // Add selected attribute to selectedSubject
            // if only one option then select it.
            if (optionalSubjects.length == 1) {
                subject_4th.value = optionalSubjects[0].value;
            } else {
                subject_4th.value = '';
            }
        });

        // Also do for this local_guardian_relation
        try {
            document.getElementsByName('local_guardian_relation')[0].addEventListener('change', function() {
                var relation = this.value;
                var name = '';
                var phone = '';
                var address = '';
                var nid = ''
                var designation = '';
                var occupation = '';

                if (relation == 'Father') {
                    name = document.getElementsByName('father_name')[0].value;
                    phone = document.getElementsByName('father_phone_no')[0].value;
                    address = document.getElementsByName('father_office_address')[0].value;
                    nid = document.getElementsByName('father_nid')[0].value;
                    designation = document.getElementsByName('father_designation')[0].value;
                    occupation = document.getElementsByName('father_occupation')[0].value;
                } else if (relation == 'Mother') {
                    name = document.getElementsByName('mother_name')[0].value;
                    phone = document.getElementsByName('mother_phone_no')[0].value;
                    address = document.getElementsByName('mother_office_address')[0].value;
                    nid = document.getElementsByName('mother_nid')[0].value;
                    designation = document.getElementsByName('mother_designation')[0].value;
                    occupation = document.getElementsByName('mother_occupation')[0].value;
                }

                document.getElementsByName('local_guardian_name')[0].value = name;
                document.getElementsByName('local_guardian_phone_res')[0].value = phone;
                document.getElementsByName('local_guardian_address')[0].value = address;
                document.getElementsByName('local_guardian_nid')[0].value = nid;
                document.getElementsByName('local_guardian_designation')[0].value = designation;
                document.getElementsByName('local_guardian_occupation')[0].value = occupation;
            });
        } catch (error) {

        }

        try {
            // On change, input type information_sent_to_relation, Father or Mother,
            // then set value to information_sent_to_name
            document.getElementsByName('information_sent_to_relation')[0].addEventListener('change',
                function() {
                    var relation = this.value;
                    var name = '';
                    var phone = '';
                    var address = '';

                    if (relation == 'Father') {
                        name = document.getElementsByName('father_name')[0].value;
                        phone = document.getElementsByName('father_phone_no')[0].value;
                        address = document.getElementsByName('father_office_address')[0].value;
                    } else if (relation == 'Mother') {
                        name = document.getElementsByName('mother_name')[0].value;
                        phone = document.getElementsByName('mother_phone_no')[0].value;
                        address = document.getElementsByName('mother_office_address')[0].value;
                    }

                    document.getElementsByName('information_sent_to_name')[0].value = name;
                    document.getElementsByName('information_sent_to_phone')[0].value = phone;
                    // document.getElementsByName('information_sent_to_address')[0].value = address;
                });
        } catch (error) {

        }

        try {
            // On change, ssc_roll and registration_number, fill out hsc_roll and hsc_reg
            document.getElementsByName('board_roll')[0].addEventListener('change', function() {
                var ssc_roll = this.value;
                document.getElementsByName('hsc_roll')[0].value = ssc_roll;
            });

            document.getElementsByName('registration_number')[0].addEventListener('change', function() {
                var registration_number = this.value;
                document.getElementsByName('hsc_reg')[0].value = registration_number;
            });

        } catch (error) {

        }


        try {
            document.getElementsByName('class_id')[0].addEventListener('change', function() {
                var class_id = this.value;
                var group_id = document.getElementsByName('group_id')[0].value;

                if (!!class_id && !!group_id) {
                    getSubjectChooser(class_id, group_id);
                }
            });

            document.getElementsByName('group_id')[0].addEventListener('change', function() {
                var class_id = document.getElementsByName('class_id')[0].value;
                var group_id = this.value;

                if (!!class_id && !!group_id) {
                    getSubjectChooser(class_id, group_id);
                }
            });
        } catch (error) {

        }


        // on change class_id and group_id call ajax.
        function getSubjectChooser(class_id, group_id) {
            if (!class_id || !group_id) {
                return;
            }

            var url = "{{ route('student-online-registration.get-subjects') }}";
            var data = {
                class_id: class_id,
                group_id: group_id,
            };

            $.ajax({
                url: url,
                data: data,
                success: function(response) {
                    $('#subject-choicer').html(response);
                }
            });
        }
    </script>


    <link rel="stylesheet" href="{{ asset('frontend/js/parsley.css') }}">
    <script src="{{ asset('frontend/js/parsley.min.js') }}"></script>

    @if (Request::is('student-online-registration'))
        <link rel="stylesheet" href="{{ asset('backend') }}/css/dropify.min.css" />
        <script type="text/javascript" src="{{ asset('backend') }}/js/dropify.min.js"></script>
        <script>
            $('.dropify').dropify();
        </script>
    @endif
@endsection

<!-- Your Blade file -->
@if (session('success'))
    <div id="success-alert" class="hidden">{{ session('success') }}</div>
@endif
