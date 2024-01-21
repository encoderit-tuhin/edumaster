 <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-4">
                 <div class="card">
                     <form class="" method="post" action="{{ route('class-wise-student-list.search') }}"
                         autocomplete="off" accept-charset="utf-8">
                         @csrf

                         <input type="hidden" name="form_type" value="class_wise">

                         <div class="col-md-8">
                             <div class="form-group">
                                 <label class="control-label">{{ _lang('Class') }}</label>
                                 <select class="form-control select2" name="class_id" required>
                                     {{ create_option('classes', 'id', 'class_name', $classId) }}
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
                     @if (isset($classWiseStudents) && count($classWiseStudents) > 0)
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

                         @if (isset($classId))
                             <form action="{{ route('student-details-download.index') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="class_wise">
                                 <input type="hidden" name="class_id" value="{{ $classId }}">
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
