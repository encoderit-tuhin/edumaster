 <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-8">
                 {{-- appsvan-submit params-panel --}}
                 <form class="" method="post" action="{{ route('student-list.search') }}" autocomplete="off"
                     accept-charset="utf-8">
                     @csrf

                     <input type="hidden" name="form_type" value="total_students">

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

                         @if (isset($academicYearId) && isset($type))
                             <form action="{{ route('student-list-pdf-download.store') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="total_students">
                                 <input type="hidden" name="academic_year_id" value="{{ $academicYearId }}">
                                 <input type="hidden" name="type" value="{{ $type }}">
                                 <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                                     <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                     {{ _lang('PDF Download') }}
                                 </button>
                             </form>
                         @endif
                     @endif

                     @if (isset($sectionWiseData) && count($sectionWiseData) > 0)
                         <table class="table table-bordered data-table">
                             <thead>
                                 <tr class="bg-primary text-white">
                                     <th colspan="2" class="text-left">{{ _lang('Student List (Section Wise)') }}
                                     </th>
                                     <th colspan="2" class="text-right">{{ _lang('Total Found') }} :
                                         {{ $totalSectionCount }}</th>
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

                         @if (isset($academicYearId) && isset($type))
                             <form action="{{ route('student-list-pdf-download.store') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="total_students">
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
