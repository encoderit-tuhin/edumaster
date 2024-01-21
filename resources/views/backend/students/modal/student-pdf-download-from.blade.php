 <form id="search_form" action="{{ route('student-reports-download.index') }}" method="get" autocomplete="off"
     accept-charset="utf-8">

     <input type="hidden" name="class_id" value="{{ request()->class_id }}">
     <input type="hidden" name="group_id" value="{{ request()->group_id }}">
     <input type="hidden" name="section_id" value="{{ request()->section_id }}">

     <div class="col-sm-3">
         <div class="form-group">
             <button type="submit" style="margin-top:24px;" class="btn btn-primary rect-btn">
                 <i class="fa fa-cloud-download" aria-hidden="true"></i>
                 {{ _lang('PDF Download') }}
             </button>
         </div>
     </div>
 </form>
