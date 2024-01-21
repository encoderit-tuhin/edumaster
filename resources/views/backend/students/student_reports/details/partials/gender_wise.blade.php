 <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-8">
                 <div class="card">
                     <form class="" method="post" action="{{ route('gender-wise-student-details.search') }}"
                         autocomplete="off" accept-charset="utf-8">
                         @csrf

                         <input type="hidden" name="form_type" value="gender_wise">

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
                                 <label class="control-label" for="type">{{ _lang('Gender') }}</label>
                                 <select name="type" class="form-control select2" required>
                                     <option value="">{{ _lang('Select Gender') }}</option>
                                     <option {{ $type == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                                     <option {{ $type == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                                 </select>
                             </div>
                         </div>

                         <div class="col-md-4">
                             <div class="form-group">
                                 <button type="submit" style="margin-top:24px;"
                                     class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>

             <div class="col-lg-12">
                 <div class="panel-body">
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

                         @if (isset($academicYearId) && isset($type))
                             <form action="{{ route('student-details-download.index') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="gender_wise">
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
