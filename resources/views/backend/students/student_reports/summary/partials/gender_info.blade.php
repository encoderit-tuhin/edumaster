 <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-8">
                 <form class="" method="post" action="{{ route('gender-wise-student-list.search') }}"
                     autocomplete="off" accept-charset="utf-8">
                     @csrf

                     <input type="hidden" name="form_type" value="gender_info">

                     <div class="col-md-4">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Academic Year') }}</label>
                             <select class="form-control select2" name="academic_year_id" required>
                                 {{ create_option('academic_years', 'id', 'session', $academicYearId) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-4">
                         <div class="form-group">
                             <label class="control-label" for="type">{{ _lang('Type') }}</label>
                             <select name="type" class="form-control select2" required>
                                 <option value="">{{ _lang('Select Type') }}</option>
                                 <option {{ $type == 'class_wise' ? 'selected' : '' }} value="class_wise">Class
                                     Wise
                                 </option>
                                 <option {{ $type == 'section_wise' ? 'selected' : '' }} value="section_wise">
                                     Section Wise
                                 </option>
                             </select>
                         </div>
                     </div>

                     <div class="col-md-2">
                         <div class="form-group">
                             <button type="submit" style="margin-top:24px;"
                                 class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                         </div>
                     </div>
                 </form>
             </div>


             <div class="col-lg-12">
                 <div class="panel-body">
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

                         @if (isset($academicYearId) && isset($type))
                             <form action="{{ route('student-list-pdf-download.store') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="gender_info">
                                 <input type="hidden" name="academic_year_id" value="{{ $academicYearId }}">
                                 <input type="hidden" name="type" value="{{ $type }}">
                                 {{-- <button type="submit" class="btn btn-primary btn-sm"></button> --}}

                                 <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                     <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                     {{ _lang('PDF Download') }}
                                 </button>

                             </form>
                         @endif
                     @endif

                     @if (isset($genderSectionWiseData) && count($genderSectionWiseData) > 0)
                         <table class="table table-bordered data-table">
                             <thead>
                                 <tr class="bg-primary text-white">
                                     <th colspan="3" class="text-left">{{ _lang('Student List (Section Wise)') }}
                                     </th>
                                     <th colspan="3" class="text-right">{{ _lang('Total Found') }} :
                                         {{ $totalGenderSectionCount }}</th>
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

                         @if (isset($academicYearId) && isset($type))
                             <form action="{{ route('student-list-pdf-download.store') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="gender_info">
                                 <input type="hidden" name="academic_year_id" value="{{ $academicYearId }}">
                                 <input type="hidden" name="type" value="{{ $type }}">
                                 <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                     <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                     {{ _lang('PDF Download') }}
                                 </button>
                             </form>
                         @endif
                     @endif

                 </div>
             </div>
         </div>

     </div>
 </div>
