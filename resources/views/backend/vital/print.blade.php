<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @include('backend.vital.style')
    @include('backend.vital.script')

    {{-- Page title --}}
    <title>
        {{ __('Vital of ') }}
        #{{ $stOnline->roll ?? '' }}
        {{ $stOnline->first_name ?? '' }}
    </title>
</head>

<body>
    <div class="noprint print-download-buttons">
        @include('layouts.pdf.download-button')
        @include('layouts.pdf.print-button')
    </div>
    <div style="clear: both;"></div>

    <div id="print-full-area">
        <div class="vital-form-view" id="print_vh">
            <div style="background: white!important;">
                <div style="width: 100%">
                    <div style="float: left; width: 350px;">
                        <table class="table1 m-0">
                            <tbody>
                                <tr>
                                    <td style="width: 140px;">
                                        <label class="e" style="font-weight:700 !important;">Session
                                        </label>
                                    </td>
                                    <td width="10px"> :</td>
                                    <td style="min-width: 120px; font-size: 14px;">
                                        {{ $studentSession->session->year ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="e" style="font-weight:700 !important; width: 140px;">
                                            Name of Student(E)
                                        </label>
                                    </td>
                                    <td>: </td>
                                    <td style="min-width: 120px; font-size: 14px;">{{ $stOnline->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="e" style="font-weight:700 !important; width: 140px;">
                                            Name of Student(B)
                                        </label>
                                    </td>
                                    <td>: </td>
                                    <td style="min-width: 120px; font-size: 14px;" class="Kalpurush">
                                        {{ $stOnline->bangla_name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="float: left; width: 400px;">
                        <table class="table1 m-0">
                            <tbody>
                                <tr>
                                    <td width="49%">
                                        <label class="e" style="font-weight:700 !important;">College
                                            Roll
                                        </label>
                                    </td>
                                    <td width="2%"> :</td>
                                    <td width="49%" style="font-size: 14px;">{{ $stOnline->roll }}</td>
                                </tr>
                                <tr>
                                    <td><label class="e" style="font-weight:700 !important;">Nickname</label>
                                    </td>
                                    <td> :</td>
                                    <td style="font-size: 14px;">
                                        {{ $stOnline->nick_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="e" style="font-weight:700 !important;">
                                            Birth Certificate
                                        </label>
                                    </td>
                                    <td> :</td>
                                    <td style="font-size: 14px;">
                                        {{ $stOnline->birth_certificate_no }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div style="width: 100%; margin-top: 10px;">
                    <div style="float: left; width: 220px;">
                        <div class="box" style="height: 1000px">
                            <span class="__im_st">
                                @if (!empty($stOnline->base64))
                                    <img class="img-thumbnail" src="data:image/png;base64,{{ $stOnline->base64 }}"
                                        alt="" style="width: 210px; height: 210px;" />
                                @endif
                            </span>
                            <div class="border-bottom my-1" style="margin-bottom: 0px;"></div>
                            <div>
                                <h3 class="text-center my-1">
                                    <span style="font-size: 22px; font-weight: bolder; color: #4d54a6;" class="b">
                                        SCHOLASTIC
                                        RECORD
                                    </span>
                                    <span
                                        style="font-size: 20px; color: #333; display: block; margin: 5px auto 10px auto;">
                                        {{ $stOnline->studentGroup->group_name ?? '' }}
                                    </span>
                                </h3>
                            </div>
                            <!--<div><h3 class="text-center my-2">SCIENCE</h3></div>-->
                            <div style="margin-top: 20px;">
                                @if (!empty($stOnline->logo))
                                    <div style="margin-bottom: 20px;">
                                        <img class="img-thumbnail" src="data:image/png;base64,{{ $stOnline->logo }}"
                                            alt="" style="width: 80px; height: 80px; margin-left: 70px;" />
                                    </div>
                                @endif
                                <h4 class="text-center b" style="margin-top: 4px;">
                                    <small class="b" style="font-size: 14px;">
                                        Notre Dame College Mymensingh <br>And<br>
                                        Board of Intermediate and Secondary Education
                                        Mymensingh
                                    </small>
                                </h4>
                            </div>
                            <div class="border-bottom"></div>
                            <div class="over-flow" style="margin-top: 10px; margin-bottom: 10px;">
                                <p class="b text-truncate">Dropped [ ] Date: .................. </p>
                                <p class="b text-truncate">Reason: ..................</p>
                                <p class="b text-truncate">Recommendation Gives on: ..................</p>
                                <p class="b text-truncate">Remarks: ..................</p>
                            </div>
                            <div class="border-bottom"></div>
                            <div>
                                <h3 style="font-size: 16px;font-weight: bold; margin-top: 4px; margin-botttom: 10px;"
                                    class="text-center b my-1">
                                    NOTRE DAME COLLEGE MYMENSINGH
                                </h3>
                            </div>
                            <table class="an__T__b">
                                <tbody>
                                    <tr>
                                        <td>(1)&nbsp;</td>
                                        <td>
                                            <div class="text-justify">
                                                <label class="d">Classes:&nbsp;</label>
                                                <span class="b" style="font-size: 12px;">
                                                    In each subject 45 minute class are held 4 times weekly. In each
                                                    science
                                                    subject
                                                    a 90 minute weekly laboratory or problem lession.
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(2)&nbsp;</td>
                                        <td>
                                            <div>
                                                <label class="d">HSC Grades &amp; Equivalent Marks:&nbsp;</label>
                                                <table class="table myTable table-bordered letter_table">
                                                    <tbody>
                                                        <tr>
                                                            <th class="b">Letter Grade</th>
                                                            <th class="b">Grade Interval</th>
                                                            <th class="b">Grade Point</th>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">A+</td>
                                                            <td class="b">80-100</td>
                                                            <td class="b">5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">A</td>
                                                            <td class="b">70-89</td>
                                                            <td class="b">4</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">A-</td>
                                                            <td class="b">60-69</td>
                                                            <td class="b">3.5</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">B</td>
                                                            <td class="b">50-59</td>
                                                            <td class="b">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">C</td>
                                                            <td class="b">40-49</td>
                                                            <td class="b">2</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">D</td>
                                                            <td class="b">33-39</td>
                                                            <td class="b">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="b">F</td>
                                                            <td class="b">0-32</td>
                                                            <td class="b">0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>(3)&nbsp;</td>
                                        <td>
                                            <div class="text-justify">
                                                <label class="d">Optional (4<sup>th</sup>) Subject:&nbsp;</label>
                                                <span class="b" style="font-size: 12px;">
                                                    In the HSC exam the optional subject grade point is shown
                                                    separately.
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="float: left; margin-left: 15px; width: 500px;">
                        <div>
                            <table class="table " style="width: 500px;">
                                <tbody>
                                    <tr>
                                        <th colspan="8" class="p-0">
                                            <h4 class="box-back text-center m-0">SSC</h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="b">Group</th>
                                        <td>
                                            {{ $stOnline->ssc_group == 1 ? 'Science' : '' }}
                                            {{ $stOnline->ssc_group == 2 ? 'Business Studies' : '' }}
                                            {{ $stOnline->ssc_group == 3 ? 'Humanities' : '' }}
                                        </td>
                                        <th class="b">School</th>
                                        <td colspan="3">{{ $stOnline->school_name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="min-width: 100px;" class="b">School Address</th>
                                        <td colspan="5">{{ $stOnline->school_address }}</td>
                                    </tr>
                                    <tr>
                                        <th class="b">Board</th>
                                        <td>{{ $stOnline->board }}</td>
                                        <th class="b">Centre</th>
                                        <td style="width: 100px;">{{ $stOnline->center }}</td>
                                        <th style="width: 70px;" class="b">SSC Roll</th>
                                        <td style="width: 70px;">{{ $stOnline->board_roll }}</td>
                                    </tr>
                                    <tr>
                                        <th class="b">Passing Year</th>
                                        <td>{{ $stOnline->passing_year }}</td>
                                        <th style="min-width: 80px;" class="b">Reg. No.</th>
                                        <td>{{ $stOnline->registration_number }}</td>
                                        <th class="b">Session</th>
                                        <td>{{ $stOnline->ssc_session }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table myTable" style="margin-top: 15px;">
                                <tbody>
                                    <tr>
                                        <th colspan="8">
                                            <h4 class="box-back text-center m-0">SSC Sub. Grade</h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="b">Bengali</th>
                                        <th class="b">Eng</th>
                                        <th class="b">Math</th>

                                        @if ($stOnline->ssc_group == 1)
                                            {{-- Science --}}
                                            <th class="b">H. Math</th>
                                            <th class="b">BK</th>
                                        @elseif ($stOnline->ssc_group == 2)
                                            {{-- Business studies --}}
                                            <th class="b">Acc</th>
                                            <th class="b">Fin</th>
                                        @elseif ($stOnline->ssc_group == 3)
                                            {{-- Humanities --}}
                                            <th class="b">His</th>
                                            <th class="b">Geo</th>
                                        @endif

                                        <th style="min-width: 120px;" colspan="3" class="b">
                                            4<sup>th</sup>
                                            Subject &amp; Grade
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            {{ $stOnline->bangla ?? '--' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $stOnline->english ?? '--' }}
                                        </td>
                                        <td class="text-center">
                                            {{ $stOnline->math ?? '--' }}
                                        </td>

                                        @if ($stOnline->ssc_group == 1)
                                            {{-- Science --}}
                                            <td class="text-center">
                                                {{ $stOnline->higher_math ?? '--' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $stOnline->bk ?? '--' }}
                                            </td>
                                        @elseif ($stOnline->ssc_group == 2)
                                            {{-- Business studies --}}
                                            <td class="text-center">
                                                {{ $stOnline->accounting ?? '--' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $stOnline->financeBanking ?? '--' }}
                                            </td>
                                        @elseif ($stOnline->ssc_group == 3)
                                            {{-- Humanities --}}
                                            <td class="text-center">
                                                {{ $stOnline->historyBangladesh ?? '--' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $stOnline->geography ?? '--' }}
                                            </td>
                                        @endif

                                        <td class="text-center" colspan="3">
                                            {{ $stOnline->grade_4th_sub }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="b">GPA Without Additional</th>
                                        <th colspan="3" class="b">GPA With Additional</th>
                                        <th colspan="2" class="b">No. Of A+</th>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            {{ $stOnline->gpa_without_4th }}
                                        </td>
                                        <td colspan="3" class="text-center">
                                            {{ $stOnline->gpa_with_4th }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->total_a_plus }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="b">Date Of Birth</th>
                                        <th colspan="2" class="b">Religion</th>
                                        <th colspan="2" class="b">Section</th>
                                        <th colspan="2" class="b">Ethnic</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->birthday }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->religion }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->section->section_name ?? 'N/A' }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->ethnic ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="8" class="p-0">
                                            <h4 class="box-back text-center m-0">Admission Information</h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="b">Application No</th>
                                        <th colspan="2" class="b">Date Of Admission</th>
                                        <th colspan="2" class="b" style="min-width: 50px;">Serial No</th>
                                        <th colspan="2" class="b">Place</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->application_number ?? '--' }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->date_of_admission ?? '--' }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->serial_no ?? '--' }}
                                        </td>
                                        <td colspan="2" class="text-center">
                                            {{ $stOnline->admission_place ?? '--' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table class="table table-bordered myTable" style="margin-top: 15px;">
                                <tbody>
                                    <tr>
                                        <th colspan="7" class="p-0">
                                            <h4 class="box-back text-center m-0"
                                                style="font-size: 12px !important; padding: 7px 0;">
                                                NOTRE DAME COLLEGE
                                                MYMENSINGH
                                                ACADEMIC RECORD
                                            </h4>
                                        </th>
                                        <th class="p-0">
                                            <h4 class="box-back text-center m-0">HSC</h4>
                                        </th>
                                    </tr>
                                    <tr class="text-danger">
                                        <td rowspan="2" class="b">Subject &amp; Class</td>
                                        <td rowspan="2"></td>
                                        @foreach ($exams as $exam)
                                            <td rowspan="2" class="b">{{ $exam->name }}</td>
                                        @endforeach
                                        {{--
                                        <td rowspan="2" class="b">1<sup>st</sup>Term Marks-100</td>
                                        <td rowspan="2" class="b">Promotion Marks-100 (i)</td>
                                        <td rowspan="2" class="b">Sent-Up Marks-100 (ii)</td>
                                        --}}
                                        <td rowspan="2"></td>
                                        <td colspan="2" class="b">Attendance</td>
                                        <td rowspan="2" class="b">Theory Marks 100/75/60 Lab. Marks 25/40</td>
                                    </tr>
                                    <tr>
                                        <th class="b">Delivered</th>
                                        <th class="b">Attended</th>
                                    </tr>
                                    @php $total = 0; @endphp
                                    @php $total_subject = 0; @endphp
                                    @foreach ($subjects as $subject)
                                        @php $total = 0; @endphp
                                        @php $total_subject = 0; @endphp
                                        @php $row_total=0; @endphp
                                        @php $point=0; @endphp
                                        <tr>
                                            <td>{{ $subject->subject_name }}</td>
                                            <td></td>
                                            @foreach ($exams as $exam)
                                                @foreach ($mark_details[$subject->id][$exam->exam_id] ?? [] as $md)
                                                    @php
                                                        $row_total = $row_total + $md->mark_value;
                                                        $point = get_point($row_total);
                                                        $grade = get_grade($row_total);
                                                    @endphp
                                                    <td style="text-align:center">{{ $md->mark_value }}</td>
                                                @endforeach
                                                @php $total_subject = count($exams)  @endphp
                                            @endforeach
                                            <td></td>
                                            <td>{{ $row_total }}</td>
                                            <td>{{ $point }}</td>
                                        </tr>
                                        @php $total = $total + $row_total; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table table-bordered myTable">
                                <tbody>
                                    <tr>
                                        <th colspan="5" class="p-0">
                                            <h4 class="box-back text-center m-0">HSC Result</h4>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="b text-center">Roll No</th>
                                        <th class="b text-center">Year</th>
                                        <th class="b text-center" style="min-width: 80px;">Reg. no.</th>
                                        <th class="b text-center">Session</th>
                                        <th class="b text-center">GPA</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{ $stOnline->hsc_roll ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_year ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_reg ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_session ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_gpa ?? '--' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="b text-center">No. of A+</th>
                                        <th class="b text-center" style="min-width: 80px;">Total Appeared</th>
                                        <th class="b text-center">Total Passed</th>
                                        <th class="b text-center" colspan="2">Percentage</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center">{{ $stOnline->hsc_total_a_plus ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_total_appeared ?? '--' }}</td>
                                        <td class="text-center">{{ $stOnline->hsc_total_passed ?? '--' }}</td>
                                        <td class="text-center" colspan="2">
                                            {{ $stOnline->hsc_percentage ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="b" title="Examiness Combined" style="min-width: 200px;">
                                            HSC Total Examinees (Combined) </th>
                                        <td colspan="4" class="text-center">
                                            {{ $stOnline->hsc_total_combined ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="b">Subject A+</th>
                                        <td colspan="4" class="text-center">
                                            {{ $stOnline->hsc_subject ?? '--' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="b" colspan="5">
                                            <p class="remarks">Discipline/Remarks</p>
                                            <p class="hsc_tec">
                                                {{ $stOnline->hsc_tec ?? '--' }}
                                            </p>
                                        </th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>
            </div>

            {{-- Page 2 --}}
            <div class="" style="background-color: #fff!important; margin-top: 30px;">
                {{-- <div class="col-xs-12">
                <hr class="none">
            </div> --}}
                <div style="width: 740px;">
                    <p class="box-back e text-center" style="border: 1px solid #4d54a6; font-size: 18px;">
                        Others Details
                    </p>
                </div>
                <div style="width: 100%;">
                    <div style="float: left; width: 365px;">
                        <div>
                            <table class="table1" style="height: 190px; border: 1px solid #4d54a6; margin-top: 5px;">
                                <tbody>
                                    <tr>
                                        <td width="49%"><label class="e">Father's Name</label></td>
                                        <td width="2%"> : </td>
                                        <td width="49%">{{ $stOnline->father_name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="49%"><label class="e">Father's NID</label></td>
                                        <td width="2%"> : </td>
                                        <td width="49%">{{ $stOnline->father_nid }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Occupation&nbsp;</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->father_occupation }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Designation</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->father_designation }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Office Address</label></td>
                                        <td> : </td>
                                        <td> {{ $stOnline->father_office_address }} </td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Monthly Income of Parents</label></td>
                                        <td> : </td>
                                        <td> {{ $stOnline->monthly_income_parents }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e" style="white-space: nowrap;">Total Monthly Income of
                                                Family</label>
                                        </td>
                                        <td> : </td>
                                        <td>{{ $stOnline->monthly_income_family }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="float: left; width: 365px;">
                        <div>
                            <table class="table1"
                                style="height: 190px; margin-left: 10px; border: 1px solid #4d54a6; margin-top: 5px;">
                                <tbody>
                                    <tr>
                                        <td width="49%"><label class="e">Mother's Name</label></td>
                                        <td width="2%"> : </td>
                                        <td width="49%">{{ $stOnline->mother_name }}</td>
                                    </tr>
                                    <tr>
                                        <td width="49%"><label class="e">Mother's NID</label></td>
                                        <td width="2%"> : </td>
                                        <td width="49%">{{ $stOnline->mother_nid }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Occupation</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->father_occupation }} </td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Designation</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->mother_designation }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Office Address</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->mother_office_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Mobile(Office)</label></td>
                                        <td> : </td>
                                        <td>{{ $stOnline->mother_phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div style="width: 100%; margin-top: 5px;">
                    <div style="float: left; width: 365px;">
                        <div>
                            <table class="table1" style="height: 100px; border: 1px solid #4d54a6; margin-top: 5px;">
                                <tbody>
                                    <tr>
                                        <td width="49%"><label class="e">Permanent Addres (Home)</label></td>
                                        <td width="2%"> :</td>
                                        <td width="49%">
                                            {{ $stOnline->permanent_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Post Office</label></td>
                                        <td> :</td>
                                        <td>{{ $stOnline->post_office }}</td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Police Station</label></td>
                                        <td> :</td>
                                        <td>
                                            {{ $stOnline->police_station }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Phone</label></td>
                                        <td> :</td>
                                        <td>{{ $stOnline->permanent_address_phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="float: left; width: 365px;">
                        <div>
                            <table class="table1"
                                style="height: 100px; border: 1px solid #4d54a6; margin-left: 10px; margin-top: 5px;">
                                <tbody>
                                    <tr>
                                        <td width="49%"><label class="e">Present Address </label></td>
                                        <td width="2%"> : </td>
                                        <td width="49%">
                                            {{ $stOnline->present_address }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><label class="e">Phone</label></td>
                                        <td>:</td>
                                        <td>{{ $stOnline->present_address_phone }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>


                <div>
                    <div style="width: 735px; margin-top: 5px;" class="box text-center">
                        <label class="e">Permanent Dist. (Home):&nbsp;</label>
                        {{ $stOnline->permanent_district }}
                    </div>
                </div>
                <div class="box" style="width: 735px; margin-top: 4px;">
                    <table class="table1 m-0">
                        <tbody>
                            <tr>
                                <td width="52%"><label class="e">PROGRESS REPORT &amp; LETTER TO BE SENT
                                        TO</label>
                                </td>
                                <td width="2%"> :</td>
                                <td width="46%"> {{ $stOnline->information_sent_to_relation }}
                                </td>
                            </tr>
                            <tr>
                                <td width="52%"><label class="e">Name</label></td>
                                <td width="2%"> :</td>
                                <td width="46%"> {{ $stOnline->information_sent_to_name }}</td>
                            </tr>
                            <tr>
                                <td><label class="e">Address</label></td>
                                <td> :</td>
                                <td>{{ $stOnline->information_sent_to_phone }}</td>
                            </tr>
                            <tr>
                                <td><label class="e">Phone</label></td>
                                <td> :</td>
                                <td>{{ $stOnline->information_sent_to_address }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="box" style="margin-top: 5px; width: 735px;">
                    <div style="float: left; width: 365px;">
                        <table class="table1 m-0">
                            <tbody>
                                <tr>
                                    <td width="49%"><label class="e">LOCAL GUARDIAN'S NAME</label>
                                    </td>
                                    <td width="2%"> :</td>
                                    <td width="49%">
                                        {{ $stOnline->local_guardian_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td width="49%"><label class="e">LOCAL GUARDIAN'S NID</label></td>
                                    <td width="2%"> :</td>
                                    <td width="49%">{{ $stOnline->local_guardian_nid }}</td>
                                </tr>
                                <tr>
                                    <td><label class="e">Occupation</label></td>
                                    <td> :</td>
                                    <td>
                                        {{ $stOnline->local_guardian_occupation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="min-width: 200px;">
                                        <label class="e border-bottom">Mymensingh Residence Address:</label>
                                    </td>
                                    <td> :</td>
                                    <td>{{ $stOnline->local_guardian_address }}</td>
                                </tr>
                                <tr>
                                    <td><label class="e">Phone (Home)</label></td>
                                    <td> :</td>
                                    <td>{{ $stOnline->local_guardian_phone_res }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div style="float: left; width: 365px;">
                        <table class="table1 m-0">
                            <tbody>
                                <tr>
                                    <td width="49%"><label class="e">Relationship</label></td>
                                    <td width="2%"> :
                                    </td>
                                    <td width="49%">
                                        {{ $stOnline->local_guardian_relation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="e">Designation</label></td>
                                    <td> : </td>
                                    <td>
                                        {{ $stOnline->local_guardian_designation }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="e">Office Address</label></td>
                                    <td> : </td>
                                    <td>
                                        {{ $stOnline->local_guardian_organization }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="e">Phone (Office)</label></td>
                                    <td> : </td>
                                    <td>
                                        {{ $stOnline->local_guardian_phone_office }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div class="" style="width: 740px; margin-top: 5px;">
                    <div style="float: left; width: 367px; padding-right: 0px !important">
                        <div class="box" style="min-height: 205px;">
                            <div class="box-back text-center" style="1px solid #4d54a6;">
                                CO-CURRICULAR ACTIVITIES
                            </div>
                            <div style="width: 360px;">
                                <div style="float: left; width: 140px;">
                                    <div>
                                        <span class="space e">
                                            <span class="border-bottom">Member of:</span>
                                        </span>
                                        <span class="space c">
                                            <span>Science Club:</span>
                                        </span>
                                        <span class="space c">
                                            <span>Science Fair:</span>
                                        </span>
                                        <span class="space c">
                                            <span>Commerce/Arts/Science Club:</span>
                                        </span>
                                        <span class="space c">
                                            <span>Notre Dame Volunteer's Alliance:</span>
                                        </span>
                                    </div>
                                </div>
                                <div style="float: left; width: 120px;">
                                    <div>
                                        <span class="border-bottom">Office or Details:</span>
                                    </div>
                                    <div style="margin-top: 4px;">
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->science_club ?? '..................' }}
                                            </span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->science_fair ?? '..................' }}
                                            </span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->com_arts_sci_club ?? '..................' }}
                                            </span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->notre_dame_volunteers_alliance ?? '..................' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div style="float: left; width: 100px;">
                                    <div>
                                        <span class="border-bottom">
                                            Awards:
                                        </span>
                                    </div>
                                    <div style="margin-top: 4px;">
                                        <div class="space c" style="margin-top: 1px;">
                                            <span> {{ $stOnline->science_club_awards ?? '..................' }}</span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->science_fair_awards ?? '..................' }}
                                            </span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->com_arts_sci_awards ?? '..................' }}
                                            </span>
                                        </div>
                                        <div class="space c" style="margin-top: 1px;">
                                            <span>
                                                {{ $stOnline->notre_dame_volunteers_alliance_awards ?? '..................' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div style="clear: both;"></div>
                                <div style="margin-top: 0px;">
                                    <span class="b">Debate</span>
                                    <span class="b" style="margin-left: 70px;">
                                        College&nbsp;
                                        {{ $stOnline->inter_collage ?? '.............' }}
                                    </span>
                                    <span class="b" style="margin-left: 60px;">
                                        Inter College&nbsp;
                                        {{ $stOnline->inter_collage_awards ?? '.............' }}
                                    </span>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="border-bottom"></div>
                            <div style="margin-top: 5px;">
                                <span class="e">Outstanding achivements: Honorable Mention, Man of the year,
                                    National Prize Winner, etc.</span>
                                <br>
                                <span class="e" style="font-size: 12px!important;">
                                    1. {{ $stOnline->field_one ?? '..................' }}
                                </span>
                                <br>
                                <span class="e" style="font-size: 12px!important;">
                                    2. {{ $stOnline->field_two ?? '..................' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div style="float: left; width: 368px; margin-left: 5px;">
                        <div class="box" style="min-height: 205px;">
                            <div class="box-back text-center" style="1px solid #4d54a6;">Govt. Scholarship
                            </div>
                            <div>
                                <span class="e">Type:&nbsp;</span><br>
                                a) [{{ $stOnline->scholarship_type === 'Talent Pool' ? '✓' : '✗' }}] Talent Pool
                                <br>
                                b) [{{ $stOnline->scholarship_type === 'General' ? '✓' : '✗' }}] General
                            </div>
                            <div style="margin-top: 5px;">
                                <span class="e">Annual:&nbsp;</span><br>
                                <span class="e">A) Lump Grant:&nbsp;</span><br>
                                Tk {{ $stOnline->annual_lump_grant_1st_year_tk ?? '..................' }}
                                1<sup>st</sup> Year.
                                <br>
                                Tk {{ $stOnline->annual_lump_grant_2nd_year_tk ?? '..................' }}
                                2<sup>nd</sup> Year.
                            </div>
                            <div style="margin-top: 5px;">
                                <span class="e">Monthly:&nbsp;</span>
                                <br>Tk
                                {{ !empty($stOnline->monthly_tk) ? $stOnline->monthly_tk : '..................' }}
                                Month.
                                <br>Period
                                {{ !empty($stOnline->period_total_months) ? $stOnline->period_total_months : '..................' }}
                                Months
                                <br>July
                                {{ !empty($stOnline->from_year) ? $stOnline->from_year : '..................' }} to
                                June
                                {{ !empty($stOnline->to_year) ? $stOnline->to_year : '..................' }}
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                </div>

                <div style="width: 740px; margin-top: 30px;">
                    <p class="box-back e text-center">Sports</p>
                    <div class="sports_area" style="margin-top: 30px;">
                        <div class="items_box" style="width: 180px;">
                            <span class="e border-bottom">Name of Sport</span>
                            <br><span class="c">{{ $stOnline->vital_sports }}</span>
                        </div>
                        <div class="items_box" style="width: 180px;">
                            <span class="e border-bottom">College Team</span>
                            <br><span class="c">{{ $stOnline->vital_sports_college_team }}</span>
                        </div>
                        <div class="items_box" style="width: 180px;">
                            <span class="e border-bottom">Inter-Class</span>
                            <br><span class="c">{{ $stOnline->vital_sports_inter_class }}</span>
                        </div>
                        <div class="items_box" style="width: 180px;">
                            <span class="e border-bottom">Details/Awards</span>
                            <br><span class="c">{{ $stOnline->vital_sports_awards }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
