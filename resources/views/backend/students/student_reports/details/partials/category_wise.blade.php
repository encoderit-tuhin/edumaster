 <div class="panel panel-default">
     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-4">
                 <div class="card">
                     <form class="" method="post" action="{{ route('category-wise-student-list.search') }}"
                         autocomplete="off" accept-charset="utf-8">
                         @csrf

                         <input type="hidden" name="form_type" value="category_wise">

                         <div class="col-md-8">
                             <div class="form-group">
                                 <label class="control-label">{{ _lang('Category') }}</label>
                                 <select class="form-control select2" name="category_id" required>
                                     {{ create_option('student_categories', 'id', 'name', $categoryId) }}
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

                         @if (isset($categoryId))
                             <form action="{{ route('student-details-download.index') }}" method="post"
                                 style="display: inline;">
                                 @csrf
                                 <input type="hidden" name="form_type" value="category_wise">
                                 <input type="hidden" name="category_id" value="{{ $categoryId }}">

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
