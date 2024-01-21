<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Of @isset($student->first_name)
            {{ $student->first_name }} {{ $student->last_name }}
        @endisset
    </title>

    @include('backend.students.student_reports.quick_search.print_css')
</head>

<body style="width: 100%; margin: 0 auto; padding: 0;">

    {{-- Institute Info Start --}}
    <table style="background: #0000A0; color: #fff; margin-bottom: 30px; width: 100%;">
        <tr>
            <td style="width: 10%">
                {{-- <img src="{{ get_logo() }}" alt="institute-logo" style="width: 100px; padding: 10px 15px;"> --}}
            </td>
            <td style="width: 90%">
                <table>
                    <tr>
                        <td>
                            <h4 style="font-size: 24px; font-weight: 700; padding-bottom: 10px;">
                                {{ get_option('school_name') }}</h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 style="font-size: 18px; font-weight: 500;">{{ get_option('address') }}
                            </h5>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Institute Info End --}}

    {{-- Student Info Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #0000A0; width: 40%; border: none; text-align:left;">
        <tr>
            <th style="background: #0000A0; color: #fff; padding: 10px 15px; font-size: 18px; font-weight: bold;">
                @isset($student->first_name)
                    {{ $student->first_name }} {{ $student->last_name }}
                @endisset
            </th>
        </tr>
    </table>
    <table style="width: 100%; margin-bottom: 15px;">
        <tr>
            <td style="width: 40%">
                <table
                    style="background: #fff; color: #000; border: 3px solid #0000A0; width: 100%; font-size: 16px; line-height: 24px; font-weight: 500; padding: 5px;">
                    <tr>
                        <td>Class</td>
                        <td> <span>:</span>
                            @isset($student->class_name)
                                {{ $student->class_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>Shift</td>
                        <td> <span>:</span>
                            ---
                        </td>
                    </tr>

                    <tr>
                        <td>Section</td>
                        <td> <span>:</span>
                            @isset($student->section_name)
                                {{ $student->section_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>Roll</td>
                        <td> <span>:</span>
                            @isset($student->roll)
                                {{ $student->roll }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>Group</td>
                        <td> <span>:</span>
                            @isset($student->studentGroup)
                                {{ $student->studentGroup->group_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>Academic Year</td>
                        <td> <span>:</span>
                            2023
                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 40%">

            </td>

            <td style="width: 20%; text-align: right">
                {{-- <img src="{{ asset('uploads/images/' . $student->image) }}" style="width: 150px;" alt="profile-image"> --}}
            </td>
        </tr>
    </table>
    {{-- Student Info End --}}

    {{-- Basic Info Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Basic Information</th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>ID</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->id)
                                {{ $student->id }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Name</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->first_name)
                                {{ $student->first_name }} {{ $student->last_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Gender</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->gender)
                                {{ $student->gender }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Religion</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->religion)
                                {{ $student->religion }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Date of Birth</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->birthday)
                                {{ $student->birthday }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Mobile</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->phone)
                                {{ $student->phone }}
                            @endisset
                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>Father's Name</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->father_name)
                                {{ $student->father_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Father's NID</li>
                        </td>
                        <td> <span>:</span>
                            ---
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Morher's Name</li>
                        </td>

                        <td> <span>:</span>
                            @isset($student->mother_name)
                                {{ $student->mother_name }}
                            @endisset
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Mother's NID</li>
                        </td>
                        <td> <span>:</span>
                            ---
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Gurdian Mobile</li>
                        </td>
                        <td> <span>:</span>
                            ---
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Student Email</li>
                        </td>
                        <td> <span>:</span>
                            @isset($student->email)
                                {{ $student->email }}
                            @endisset
                        </td>
                    </tr>
                </table>
            </td>

        </tr>
    </table>
    {{-- Basic Info End --}}

    {{-- Address Information Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Address Information
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>
                                <strong>Address Type</strong>
                            </li>
                        </td>
                        <td> <span>:</span>
                            <strong>Present</strong>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Address Details</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Post Office</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Thana/Upazila</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>District</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Division</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>
                                <strong>Address Type</strong>
                            </li>
                        </td>
                        <td> <span>:</span>
                            <strong>Permanent</strong>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Address Details</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Post Office</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Thana/Upazila</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>District</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Division</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Address Information End --}}

    {{-- Guardian Information Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Guardian Information
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Guardian Name</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Mobile</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Email</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Education</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Occupation</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Monthly Income</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Relation</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Guardian Information End --}}

    {{-- Medical Information Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Medical Information
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Height</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Weight</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Blood Group</li>
                        </td>
                        <td> <span>:</span>
                            {{ $student->blood_group }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Special Disease</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Medical Information End --}}

    {{-- Admission Information Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Admission Information
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Category</li>
                        </td>
                        <td> <span>:</span>
                            {{ $student->student_category_id }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Date</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Year</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Birth Certificate :</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>TC No</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Nationality</li>
                        </td>
                        <td> <span>:</span>
                            Bangladeshi
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Admission Information End --}}

    {{-- Previous Institution Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Previous Institution
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Institute Code</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Institute Name</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Address</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Mobile</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>Phone</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Email</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Time Period</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Last Education</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Previous Institution End --}}

    {{-- Previous Exam Start --}}
    <table style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; border: none;">
        <tr>
            <th
                style="background: #0000A0; color: #fff; width: 30%; text-align:left; padding: 5px; 10px; font-size: 18px; font-weight: bold;">
                Previous Exam
            </th>
            <th style="width: 70%;">
                <hr>
            </th>
        </tr>
    </table>
    <table
        style="background: #fff; color: #000; border: 2px solid #282828; width: 100%; font-size: 16px; line-height: 32px; font-weight: 500;">
        <tr>
            <td style="width: 50%">
                <table>

                    <tr>
                        <td>
                            <li>Exam Name</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Group</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Board</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Roll</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Registration</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>

            <td style="width: 50%">
                <table>
                    <tr>
                        <td>
                            <li>Session</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Exam Grade</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Exam Point</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>

                    <tr>
                        <td>
                            <li>Passing Year</li>
                        </td>
                        <td> <span>:</span>

                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    {{-- Previous Exam End --}}

    <hr style="border: 1px solid #000000">

    <table>
        <tr>
            <td style="text-align:start">Powered by ---</td>
            <td style="text-align:center">Page 1 of 1</td>
            @php
                $currentDate = date('M d,Y');
            @endphp
            <td style="text-align:end">{{ $currentDate }}</td>
        </tr>
    </table>
</body>

</html>
