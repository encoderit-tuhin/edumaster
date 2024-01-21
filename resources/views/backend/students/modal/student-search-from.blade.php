 <form id="search_form" class="mt-3 params-panel validate" method="get" autocomplete="off" accept-charset="utf-8">

     <div class="col-sm-3">
         <div class="form-group">
             <label class="control-label" for="class_id_select">{{ _lang('Class') }}</label>
             <select name="class_id" id="class_id_select" class="form-control select2" required>
                 <option value="">{{ _lang('Select One') }}</option>
                 {{ create_option('classes', 'id', 'class_name', request()->class_id) }}
             </select>
         </div>
     </div>

     <div class="col-sm-3">
        <div class="form-group">
            <label class="control-label">{{ _lang('Group') }}</label>
            <select name="group_id" class="form-control select2">
                <option value="">{{ _lang('Select One') }}</option>
                {{ create_option('student_groups', 'id', 'group_name', request()->group_id) }}
            </select>
        </div>
    </div>

     <div class="col-sm-3">
         <div class="form-group">
             <label class="control-label">{{ _lang('Section') }}</label>
             <select name="section_id" class="form-control select2">
                 <option value="">{{ _lang('Select One') }}</option>
                 {{ create_option('sections', 'id', 'section_name', request()->section_id) }}
             </select>
         </div>
     </div>

     <div class="col-sm-3">
         <div class="form-group">
             <button type="submit" style="margin-top:24px;"
                 class="btn btn-primary btn-block rect-btn">{{ _lang('Search') }}</button>
         </div>
     </div>
 </form>
