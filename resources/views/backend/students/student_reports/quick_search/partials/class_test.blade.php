 <div class="panel panel-default">
     <div class="panel-body">
         @include('backend.students.student_reports.quick_search.partials.student_info')

         <div class="row justify-content-center">
             <div class="col-lg-4">
                 <div class="card">
                     <form class="" method="post" action="#" autocomplete="off" accept-charset="utf-8">
                         @csrf
                         <div class="col-md-8">
                             <div class="form-group">
                                 <label class="control-label">{{ _lang('Class Test') }}</label>
                                 <select class="form-control select2" name="class_test_exam_id" required>
                                     <option>--Select Class Test--</option>
                                     <option>---</option>
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
         </div>

         <div class="row">

         </div>
     </div>
 </div>
