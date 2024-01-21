@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $today = $now->format('Y-m-d');

@endphp
@extends('layouts.pdf.index')
@section('styles')
    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: rgb(214, 212, 212)
        }

       
        table th, table td{
            font-size: 12px;

        }
    </style>
@endsection
@section('content')
    <div class="containera">
        @include('layouts.pdf.header')
        @if (isset($classWiseStudents) && count($classWiseStudents) > 0)
            <div class="table-responsive">
                <table class="table table-bordered data-table">

                    <thead>
                        <tr class="bg-primary text-white">
                            <th colspan="4" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                            </th>
                            <th colspan="3" class="text-right">{{ _lang('Total Found') }} :
                                {{ count($classWiseStudents) }}</th>
                        </tr>
                        <tr class="bg-white">
                            <th>{{ _lang('Student ID') }}</th>
                            <th>{{ _lang('Roll') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Gender') }}</th>
                            <th>{{ _lang('Father`s Name') }}</th>
                            <th>{{ _lang('Mother`s Name') }}</th>
                        </tr>
                    </thead>
    
    
                    <tbody>
                        @if (isset($classWiseStudents))
                            @foreach ($classWiseStudents as $student)
                                <tr>
                                    <td>
                                        {{ $student->id }}
                                    </td>
                                    <td>
                                        {{ $student->roll }}
                                    </td>
                                    <td>
                                        {{ $student->first_name }} {{ $student->last_name }}
                                    </td>
                                    <td>
                                        {{ $student->group_name }}
                                    </td>
                                    <td>
                                        {{ $student->gender }}
                                    </td>
                                    <td>
                                        {{ $student->father_name }}
                                    </td>
                                    <td>
                                        {{ $student->mother_name }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-danger">No Student Found</td>
                            </tr>
                        @endif
    
                    </tbody>
                </table>
            </div>
        @endif
        @if (isset($sectionWiseStudents) && count($sectionWiseStudents) > 0)
            <table class="table table-bordered data-table">

                <thead>
                    <tr class="bg-primary text-white">
                        <th colspan="6" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                        </th>
                        <th colspan="5" class="text-right">{{ _lang('Total Found') }} :
                            {{ count($sectionWiseStudents) }}</th>
                    </tr>
                    <tr class="bg-white">
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Roll') }}</th>
                        <th>{{ _lang('Name') }}</th>
                        <th>{{ _lang('Group') }}</th>
                        <th>{{ _lang('Category') }}</th>
                        <th>{{ _lang('Gender') }}</th>
                        <th>{{ _lang('Religion') }}</th>
                        <th>{{ _lang('Date of Birth') }}</th>
                        <th>{{ _lang('Father`s Name') }}</th>
                        <th>{{ _lang('Mother`s Name') }}</th>
                        <th>{{ _lang('Mobile No.') }}</th>
                    </tr>
                </thead>


                <tbody>
                    @if (isset($sectionWiseStudents))
                        @foreach ($sectionWiseStudents as $student)
                            <tr>
                                <td>
                                    {{ $student->id }}
                                </td>
                                <td>
                                    {{ $student->roll }}
                                </td>
                                <td>
                                    {{ $student->first_name }} {{ $student->last_name }}
                                </td>
                                <td>
                                    {{ $student->group_name }}
                                </td>
                                <td>
                                    {{ $student->category_name }}
                                </td>
                                <td>
                                    {{ $student->gender }}
                                </td>
                                <td>
                                    {{ $student->religion }}
                                </td>
                                <td>
                                    {{ $student->birthday }}
                                </td>
                                <td>
                                    {{ $student->father_name }}
                                </td>
                                <td>
                                    {{ $student->mother_name }}
                                </td>
                                <td>
                                    {{ $student->phone }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-danger">No Student Found</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        @endif
        @if (isset($sectionGroupWiseStudents) && count($sectionGroupWiseStudents) > 0)
            <table class="table table-bordered data-table">

                <thead>
                    <tr class="bg-primary text-white">
                        <th colspan="6" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                        </th>
                        <th colspan="5" class="text-right">{{ _lang('Total Found') }} :
                            {{ count($sectionGroupWiseStudents) }}</th>
                    </tr>
                    <tr class="bg-white">
                        <th>{{ _lang('Student ID') }}</th>
                        <th>{{ _lang('Roll') }}</th>
                        <th>{{ _lang('Name') }}</th>
                        <th>{{ _lang('Group') }}</th>
                        <th>{{ _lang('Category') }}</th>
                        <th>{{ _lang('Gender') }}</th>
                        <th>{{ _lang('Religion') }}</th>
                        <th>{{ _lang('Date of Birth') }}</th>
                        <th>{{ _lang('Father`s Name') }}</th>
                        <th>{{ _lang('Mother`s Name') }}</th>
                        <th>{{ _lang('Mobile No.') }}</th>
                    </tr>
                </thead>


                <tbody>
                    @if (isset($sectionGroupWiseStudents))
                        @foreach ($sectionGroupWiseStudents as $student)
                            <tr>
                                <td>
                                    {{ $student->id }}
                                </td>
                                <td>
                                    {{ $student->roll }}
                                </td>
                                <td>
                                    {{ $student->first_name }} {{ $student->last_name }}
                                </td>
                                <td>
                                    {{ $student->group_name }}
                                </td>
                                <td>
                                    {{ $student->category_name }}
                                </td>
                                <td>
                                    {{ $student->gender }}
                                </td>
                                <td>
                                    {{ $student->religion }}
                                </td>
                                <td>
                                    {{ $student->birthday }}
                                </td>
                                <td>
                                    {{ $student->father_name }}
                                </td>
                                <td>
                                    {{ $student->mother_name }}
                                </td>
                                <td>
                                    {{ $student->phone }}
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-danger">No Student Found</td>
                        </tr>
                    @endif

                </tbody>
            </table>
        @endif
        @if (isset($categoryWiseStudents) && count($categoryWiseStudents) > 0)
                         <table class="table table-bordered data-table">

                             <thead>
                                 <tr class="bg-primary text-white">
                                     <th colspan="6" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                                     </th>
                                     <th colspan="5" class="text-right">{{ _lang('Total Found') }} :
                                         {{ count($categoryWiseStudents) }}</th>
                                 </tr>
                                 <tr class="bg-white">
                                     <th>{{ _lang('Student ID') }}</th>
                                     <th>{{ _lang('Roll') }}</th>
                                     <th>{{ _lang('Name') }}</th>
                                     <th>{{ _lang('Group') }}</th>
                                     <th>{{ _lang('Category') }}</th>
                                     <th>{{ _lang('Gender') }}</th>
                                     <th>{{ _lang('Religion') }}</th>
                                     <th>{{ _lang('Date of Birth') }}</th>
                                     <th>{{ _lang('Father`s Name') }}</th>
                                     <th>{{ _lang('Mother`s Name') }}</th>
                                     <th>{{ _lang('Mobile No.') }}</th>
                                 </tr>
                             </thead>


                             <tbody>
                                 @if (isset($categoryWiseStudents))
                                     @foreach ($categoryWiseStudents as $student)
                                         <tr>
                                             <td>
                                                 {{ $student->id }}
                                             </td>
                                             <td>
                                                 {{ $student->roll }}
                                             </td>
                                             <td>
                                                 {{ $student->first_name }} {{ $student->last_name }}
                                             </td>
                                             <td>
                                                 {{ $student->group_name }}
                                             </td>
                                             <td>
                                                 {{ $student->category_name }}
                                             </td>
                                             <td>
                                                 {{ $student->gender }}
                                             </td>
                                             <td>
                                                 {{ $student->religion }}
                                             </td>
                                             <td>
                                                 {{ $student->birthday }}
                                             </td>
                                             <td>
                                                 {{ $student->father_name }}
                                             </td>
                                             <td>
                                                 {{ $student->mother_name }}
                                             </td>
                                             <td>
                                                 {{ $student->phone }}
                                             </td>
                                         </tr>
                                     @endforeach
                                 @else
                                     <tr>
                                         <td colspan="7" class="text-danger">No Student Found</td>
                                     </tr>
                                 @endif

                             </tbody>
                         </table>
                     @endif
                     @if (isset($sectionCategoryWiseStudents) && count($sectionCategoryWiseStudents) > 0)
                     <table class="table table-bordered data-table">

                         <thead>
                             <tr class="bg-primary text-white">
                                 <th colspan="5" class="text-left">
                                     {{ _lang('Student Details (Section Category Wise)') }}
                                 </th>
                                 <th colspan="5" class="text-right">{{ _lang('Total Found') }} :
                                     {{ count($sectionCategoryWiseStudents) }}</th>
                             </tr>
                             <tr class="bg-white">
                                 <th>{{ _lang('Student ID') }}</th>
                                 <th>{{ _lang('Roll') }}</th>
                                 <th>{{ _lang('Name') }}</th>
                                 <th>{{ _lang('Group') }}</th>
                                 <th>{{ _lang('Gender') }}</th>
                                 <th>{{ _lang('Religion') }}</th>
                                 <th>{{ _lang('Date of Birth') }}</th>
                                 <th>{{ _lang('Father`s Name') }}</th>
                                 <th>{{ _lang('Mother`s Name') }}</th>
                                 <th>{{ _lang('Mobile No.') }}</th>
                             </tr>
                         </thead>


                         <tbody>
                             @if (isset($sectionCategoryWiseStudents))
                                 @foreach ($sectionCategoryWiseStudents as $student)
                                     <tr>
                                         <td>
                                             {{ $student->id }}
                                         </td>
                                         <td>
                                             {{ $student->roll }}
                                         </td>
                                         <td>
                                             {{ $student->first_name }} {{ $student->last_name }}
                                         </td>
                                         <td>
                                             {{ $student->group_name }}
                                         </td>

                                         <td>
                                             {{ $student->gender }}
                                         </td>
                                         <td>
                                             {{ $student->religion }}
                                         </td>
                                         <td>
                                             {{ $student->birthday }}
                                         </td>
                                         <td>
                                             {{ $student->father_name }}
                                         </td>
                                         <td>
                                             {{ $student->mother_name }}
                                         </td>
                                         <td>
                                             {{ $student->phone }}
                                         </td>
                                     </tr>
                                 @endforeach
                             @else
                                 <tr>
                                     <td colspan="7" class="text-danger">No Student Found</td>
                                 </tr>
                             @endif

                         </tbody>
                     </table>
                 @endif
                 @if (isset($sectionAgeWiseStudents) && count($sectionAgeWiseStudents) > 0)
                 <table class="table table-bordered data-table">

                     <thead>
                         <tr class="bg-primary text-white">
                             <th colspan="5" class="text-left">{{ _lang('Student Details (Class Wise)') }}
                             </th>
                             <th colspan="4" class="text-right">{{ _lang('Total Found') }} :
                                 {{ count($sectionAgeWiseStudents) }}</th>
                         </tr>
                         <tr class="bg-white">
                             <th>{{ _lang('Student ID') }}</th>
                             <th>{{ _lang('Roll') }}</th>
                             <th>{{ _lang('Name') }}</th>
                             <th>{{ _lang('Group') }}</th>
                             <th>{{ _lang('Gender') }}</th>
                             <th>{{ _lang('Religion') }}</th>
                             <th>{{ _lang('Date of Birth') }}</th>
                             <th>{{ _lang('Age') }}</th>
                             <th>{{ _lang('Mobile No.') }}</th>
                         </tr>
                     </thead>


                     <tbody>
                         @if (isset($sectionAgeWiseStudents))
                             @foreach ($sectionAgeWiseStudents as $student)
                                 <tr>
                                     <td>
                                         {{ $student->id }}
                                     </td>
                                     <td>
                                         {{ $student->roll }}
                                     </td>
                                     <td>
                                         {{ $student->first_name }} {{ $student->last_name }}
                                     </td>
                                     <td>
                                         {{ $student->group_name }}
                                     </td>

                                     <td>
                                         {{ $student->gender }}
                                     </td>
                                     <td>
                                         {{ $student->religion }}
                                     </td>
                                     <td>
                                         {{ $student->birthday }}
                                     </td>
                                     <td>
                                         @php
                                             $birthday = \Carbon\Carbon::parse($student->birthday);
                                             $today = \Carbon\Carbon::now();
                                             $ageYears = $today->diffInYears($birthday);
                                             $ageMonths = $today->diffInMonths($birthday) % 12;
                                             $ageDays = $today->diffInDays($birthday) % 30;
                                         @endphp

                                         {{ $ageYears }} years {{ $ageMonths }} months
                                         {{ $ageDays }} days
                                     </td>
                                     <td>
                                         {{ $student->phone }}
                                     </td>
                                 </tr>
                             @endforeach
                         @else
                             <tr>
                                 <td colspan="7" class="text-danger">No Student Found</td>
                             </tr>
                         @endif

                     </tbody>
                 </table>
             @endif
             @if (isset($genderWiseStudents) && count($genderWiseStudents) > 0)
                         <table class="table table-bordered data-table">
                             <thead>
                                 <tr class="bg-primary text-white">
                                     <th>{{ _lang('Section List') }}</th>
                                     <th>{{ _lang('Total Found') }} :
                                         {{ $totalSectionStudentGenderCount ?? 0 }}</th>
                                 </tr>
                                 <tr class="bg-white">
                                     <th>{{ _lang('Section') }}</th>
                                     <th>{{ _lang('Total Students') }}</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @forelse ($genderWiseStudents as $data)
                                     <tr>
                                         <td>{{ $data->section_name }}</td>
                                         <td>{{ $data->total_students }}</td>
                                     </tr>
                                 @empty
                                     <tr>
                                         <td colspan="4" class="text-danger">No Student Found</td>
                                     </tr>
                                 @endforelse
                             </tbody>
                             <tfoot class="bg-primary text-white">
                                 <tr>
                                     <td class="text-right">{{ _lang('Total') }}</td>
                                     <td>{{ $totalSectionStudentGenderCount ?? 0 }}</td>
                                 </tr>
                             </tfoot>
                         </table>
                     @endif
    </div>
@endsection

@section('scripts')
    <script>
        function hideHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "hidden";
            document.getElementById("testimonial-footer").style.visibility = "hidden";

        }

        function showHeaderFooter() {
            document.getElementById("testimonial-header").style.visibility = "visible";
            document.getElementById("testimonial-footer").style.visibility = "visible";

        }
    </script>
    <script>
        $(document).ready(function() {
            // Retrieve the active tab from local storage
            var activeTab = localStorage.getItem('activeTab');

            // If there is an active tab, switch to it
            if (activeTab) {
                $('#myTabs a[href="#' + activeTab + '"]').tab('show');
            }

            // Handle tab click event
            $('#myTabs a').on('shown.bs.tab', function(e) {
                // Get the href of the clicked tab
                var activeTab = $(e.target).attr('href').substr(1);

                // Store the active tab in local storage
                localStorage.setItem('activeTab', activeTab);
            });
        });
    </script>
@endsection
