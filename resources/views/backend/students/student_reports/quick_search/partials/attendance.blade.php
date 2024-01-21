 <div class="panel panel-default">
     <div class="panel-body">
         @include('backend.students.student_reports.quick_search.partials.student_info')

         <div class="row">
             <div class="col-lg-4">
                 <div class="card">
                     <form action="" method="post">
                         @csrf

                         <div class="form-group">
                             <label class="control-label">{{ _lang('From Date') }}</label>
                             <input type="date" class="form-control" name="from_date">
                         </div>

                         <div class="form-group">
                             <label class="control-label">{{ _lang('To Date') }}</label>
                             <input type="date" class="form-control" name="to_date">
                         </div>

                         <div class="form-group text-right">
                             <button type="submit" class="btn btn-sm btn-info">Search</button>
                         </div>
                     </form>
                 </div>
             </div>

             <div class="col-lg-8">
                 <div class="card">
                     <table class="table table-bordered data-table">
                         <thead>
                             <tr class="bg-white">
                                 <th>{{ _lang('Date') }}</th>
                                 <th>{{ _lang('In') }}</th>
                                 <th>{{ _lang('Out') }}</th>
                                 <th>{{ _lang('Status') }}</th>
                             </tr>
                         </thead>

                         <tbody>
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                             </tr>

                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
