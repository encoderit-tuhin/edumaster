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
   table th,
   table td {
   font-size: 12px;
   }
</style>
@endsection
@section('content')
<div class="containera" style="width:95%">
   @include('layouts.pdf.header')
   @if (isset($classWiseData) && count($classWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th>{{ _lang('Student List (Class Wise)') }}</th>
            <th>{{ _lang('Total Found') }} : {{ $totalClassCount }}</th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Total Students') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($classWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>{{ $data->total_students }}</td>
         </tr>
         @empty
         <tr>
            <td colspan="2" class="text-danger">No Student Found</td>
         </tr>
         @endforelse
      </tbody>
      <tfoot class="bg-primary text-white">
         <tr>
            <td>{{ _lang('Total') }}</td>
            <td>{{ $totalStudentCount }}</td>
         </tr>
      </tfoot>
   </table>
   @endif
   @if (isset($sectionWiseData) && count($sectionWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th colspan="2" class="text-left">{{ _lang('Student List (Section Wise)') }}
            </th>
            <th colspan="2" class="text-right">{{ _lang('Total Found') }} :
               {{ $totalSectionCount }}
            </th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Shift') }}</th>
            <th>{{ _lang('Section') }}</th>
            <th>{{ _lang('Total Students') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($sectionWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>1st Shift</td>
            <td>{{ $data->section_name ?? 'N/A' }}</td>
            <td>{{ $data->total_students }}</td>
         </tr>
         @empty
         <tr>
            <td colspan="2" class="text-danger">No Student Found</td>
         </tr>
         @endforelse
      </tbody>
      <tfoot class="bg-primary text-white">
         <tr>
            <td colspan="3" class="text-right">{{ _lang('Total') }}</td>
            <td>{{ $totalStudentCount }}</td>
         </tr>
      </tfoot>
   </table>
   @endif
   @if (isset($genderClassWiseData) && count($genderClassWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th colspan="2">{{ _lang('Student List (Class Wise)') }}</th>
            <th colspan="2">{{ _lang('Total Found') }} : {{ $totalGenderClassCount }}</th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Total Students') }}</th>
            <th>{{ _lang('Male') }}</th>
            <th>{{ _lang('Female') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($genderClassWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>{{ $data->total_students }}</td>
            <td>{{ $data->male_students }}</td>
            <td>{{ $data->female_students }}</td>
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
            <td>{{ $totalGenderStudentCount }}</td>
            <td>{{ $totalGenderMaleStudent }}</td>
            <td>{{ $totalGenderFemaleStudent }}</td>
         </tr>
      </tfoot>
   </table>
   @endif
   @if (isset($genderSectionWiseData) && count($genderSectionWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th colspan="3" class="text-left">{{ _lang('Student List (Section Wise)') }}
            </th>
            <th colspan="3" class="text-right">{{ _lang('Total Found') }} :
               {{ $totalGenderSectionCount }}
            </th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Shift') }}</th>
            <th>{{ _lang('Section') }}</th>
            <th>{{ _lang('Total Students') }}</th>
            <th>{{ _lang('Male') }}</th>
            <th>{{ _lang('Female') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($genderSectionWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>1st Shift</td>
            <td>{{ $data->section_name ?? 'N/A' }}</td>
            <td>{{ $data->total_students }}</td>
            <td>{{ $data->male_students }}</td>
            <td>{{ $data->female_students }}</td>
         </tr>
         @empty
         <tr>
            <td colspan="6" class="text-danger">No Student Found</td>
         </tr>
         @endforelse
      </tbody>
      <tfoot class="bg-primary text-white">
         <td colspan="3" class="text-right">{{ _lang('Total') }}</td>
         <td>{{ $totalGenderSectionStudentCount }}</td>
         <td>{{ $totalGenderSectionMaleStudent }}</td>
         <td>{{ $totalGenderSectionFemaleStudent }}</td>
      </tfoot>
   </table>
   @endif
   @if (isset($religionClassWiseData) && count($religionClassWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th colspan="4">{{ _lang('Student List (Class Wise)') }}</th>
            <th colspan="3">{{ _lang('Total Found') }} : {{ $totalReligionClassCount }}
            </th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Total Students') }}</th>
            <th>{{ _lang('Islam') }}</th>
            <th>{{ _lang('Christian') }}</th>
            <th>{{ _lang('Hindu') }}</th>
            <th>{{ _lang('Buddhism') }}</th>
            <th>{{ _lang('Others') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($religionClassWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>{{ $data->total_religions }}</td>
            <td>{{ $data->islam_religions }}</td>
            <td>{{ $data->christian_religions }}</td>
            <td>{{ $data->hindu_religions }}</td>
            <td>{{ $data->buddhism_religions }}</td>
            <td>{{ $data->others_religions }}</td>
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
            <td>{{ $totalReligionStudentCount }}</td>
            <td>{{ $totalReligionIslamStudents }}</td>
            <td>{{ $totalReligionChristianStudents }}</td>
            <td>{{ $totalReligionHinduStudents }}</td>
            <td>{{ $totalReligionBuddhismStudents }}</td>
            <td>{{ $totalReligionOthersStudents }}</td>
         </tr>
      </tfoot>
   </table>
   @endif
   @if (isset($religionSectionWiseData) && count($religionSectionWiseData) > 0)
   <table class="table table-bordered data-table">
      <thead>
         <tr class="bg-primary text-white">
            <th colspan="5" class="text-left">{{ _lang('Student List (Section Wise)') }}
            </th>
            <th colspan="4" class="text-right">{{ _lang('Total Found') }} :
               {{ $totalReligionSectionCount }}
            </th>
         </tr>
         <tr class="bg-white">
            <th>{{ _lang('Class') }}</th>
            <th>{{ _lang('Shift') }}</th>
            <th>{{ _lang('Section') }}</th>
            <th>{{ _lang('Total Students') }}</th>
            <th>{{ _lang('Islam') }}</th>
            <th>{{ _lang('Christian') }}</th>
            <th>{{ _lang('Hindu') }}</th>
            <th>{{ _lang('Buddhism') }}</th>
            <th>{{ _lang('Others') }}</th>
         </tr>
      </thead>
      <tbody>
         @forelse ($religionSectionWiseData as $data)
         <tr>
            <td>{{ $data->class_name }}</td>
            <td>1st Shift</td>
            <td>{{ $data->section_name ?? 'N/A' }}</td>
            <td>{{ $data->total_religions }}</td>
            <td>{{ $data->islam_religions }}</td>
            <td>{{ $data->christian_religions }}</td>
            <td>{{ $data->hindu_religions }}</td>
            <td>{{ $data->buddhism_religions }}</td>
            <td>{{ $data->others_religions }}</td>
         </tr>
         @empty
         <tr>
            <td colspan="6" class="text-danger">No Student Found</td>
         </tr>
         @endforelse
      </tbody>
      <tfoot class="bg-primary text-white">
         <tr>
            <td colspan="3" class="text-right">{{ _lang('Total') }}</td>
            <td>{{ $totalReligionSectionStudentCount }}</td>
            <td>{{ $totalReligionIslamStudentsSectionCount }}</td>
            <td>{{ $totalReligionChristianStudentsSectionCount }}</td>
            <td>{{ $totalReligionHinduStudentsSectionCount }}</td>
            <td>{{ $totalReligionBuddhismStudentsSectionCount }}</td>
            <td>{{ $totalReligionOthersStudentsSectionCount }}</td>
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