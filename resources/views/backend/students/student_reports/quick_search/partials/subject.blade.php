 <div class="panel panel-default">
     <div class="panel-body">
         @include('backend.students.student_reports.quick_search.partials.student_info')

         <div class="row">
             <div class="col-lg-12">
                 <table class="table table-bordered data-table">
                     <thead>
                         <th>{{ _lang('Subject Name') }}</th>
                         <th>{{ _lang('Subject Code') }}</th>
                         <th>{{ _lang('Class') }}</th>
                         <th>{{ _lang('Full mark') }}</th>
                         <th>{{ _lang('Pass mark') }}</th>
                     </thead>
                     <tbody>
                         @foreach ($subjects as $data)
                             <tr>
                                 <td>{{ $data->subject_name }}</td>
                                 <td>{{ $data->subject_code }}</td>
                                 <td>{{ $data->class_name }}</td>
                                 <td>{{ $data->full_mark }}</td>
                                 <td>{{ $data->pass_mark }}</td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
