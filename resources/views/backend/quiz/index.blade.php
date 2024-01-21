@extends('layouts.backend')
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="panel panel-default" data-collapsed="0">
         <div class="panel-heading">
            <div class="panel-title pull-left">
               {{ _lang('Quiz') }}
            </div>
            <div class="pull-right">
               <a class="btn btn-primary btn-sm" href="">
               <i class="fa fa-upload"></i>
               {{ _lang('Bulk Quiz ') }}
               </a>
            </div>
            <div class="clearfix"></div>
         </div>
         <form action="{{ route('quiz.store') }}" autocomplete="off"
            class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data"
            method="post" accept-charset="utf-8">
            @csrf
            <div class="panel-body">
               <div class="col-md-12">
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-12 control-label">{{ _lang('Session') }}</label>
                        <div class="col-sm-12">
                           <select class="form-control select2" name="session_id" required id='session_id'>
                           @foreach (get_table('academic_years') as $session)
                           <option value="{{ $session->id }}"
                           {{ $session->id == get_option('academic_year') ? 'selected' : '' }}>
                           {{ $session->year }} </option>
                           @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Class') }}</label>
                        <div class="col-sm-12">
                           <select name="class" class="form-control select2" id="class" required>
                              <option value="">{{ _lang('Select One') }}</option>
                              {{ create_option('classes', 'id', 'class_name') }}
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Section') }}</label>
                        <div class="col-sm-12">
                           <select name="section" class="form-control select2" id="section" required>
                              <option value="">{{ _lang('Select One') }}</option>
                              @foreach ($sections as $data)
                              <option data-class="{{ $data->class_id }}" value="{{ $data->id }}">
                                 {{ $data->section_name }}
                              </option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Group') }}</label>
                        <div class="col-sm-12">
                           <select name="group" id="group" class="form-control select2" required>
                              <option value="">{{ _lang('Select One') }}</option>
                              {{ create_option('student_groups', 'id', 'group_name') }}
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Subject') }}</label>
                        <div class="col-sm-12">
                           <select name="subject_id" id="subject_id"
                              class="form-control select2" required>
                              <option value="">{{ _lang('Select One') }}</option>
                              {{ create_option('subjects', 'id', 'subject_name') }}
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-4">
                     <div class="form-group">
                        <label class="col-sm-3 control-label">{{ _lang('Action') }}</label>
                        <div class="col-sm-12">
                           <select name="action_type" id="action_type"
                              class="form-control select2" required>
                              <option value="">{{ _lang('--Select One--') }}</option>
                              <option value="1">{{ _lang('View') }}</option>
                              <option value="2">{{ _lang('Add') }}</option>
                              <option value="3">{{ _lang('Edit') }}</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="form-group float-start">
                     <div class="col-sm-4" style="margin-left:15px">
                        <button id='viewButton' type="button" class="btn btn-info">View</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="panel-body shadow-lg" id="outPutResult" style="display: none">
               <div class="col-md-12">
                  <div id='filtered-quiz-data'> </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection
@section('js-script')
<script>
   $(window).on('load', function() {
       $("#section").next().find("ul li").css("display", "none");

       $(document).on("change", "#class", function() {
           $("#section").next().find("ul li").css("display", "none");
           var class_id = $(this).val();
           $('#section option[data-class="' + class_id + '"]').each(function() {
               var section_id = $(this).val();
               $("#section").next().find("ul li[data-value='" + section_id + "']").css(
                   "display", "block");
           });
       });


       $(document).on('change', '#class', function() {
           load_option_subject();
       });

       function load_option_subject() {
           var class_id = $("#class").val();
           var link = "{{ url('students/get_subjects/') }}";
           $.ajax({
               url: link + "/" + class_id,
               success: function(data) {
                   $('#optional_subject').html(data);
               }
           });
       }

       $('#guardian').select2({
           placeholder: "{{ _lang('Select One') }}",

           ajax: {
               dataType: "json",
               url: "{{ url('parents/get_parents') }}",
               delay: 400,
               data: function(params) {
                   return {
                       term: params.term
                   }
               },
               processResults: function(data, page) {
                   return {
                       results: data
                   };
               },
           }
       });

       $('#autoFillButton').click(function() {
           var phone = $('#phone').val();
           $.ajax({
               type: 'POST',
               url: '{{ route('fetch-student-data') }}',
               data: {
                   phone: phone,
                   _token: '{{ csrf_token() }}'
               },
               success: function(data) {
                   $('#first_name').val(data.first_name);
                   $('#last_name').val(data.last_name);
                   $('#birthday').val(data.birthday);
                   $('#gender').val(data.gender).trigger('change');
                   $('#blood_group').val(data.blood_group).trigger('change');
                   $('#religion').val(data.religion).trigger('change');
                   $('#class').val(data.class_id).trigger('change');
                   $('#group').val(data.group).trigger('change');
               }
           });
       });


   });
</script>
<script>
   $("#viewButton").click(function() {
    $("#outPutResult").css("display", "block");
       var classId = $("#class").val();
       var section = $("#section").val();
       var group = $("#group").val();
       var subject_id = $("#subject_id").val();
       var session_id = $("#session_id").val();
       var action_type = $("#action_type").val();
       console.log('action_type', action_type)
       if (!action_type) {
           alert('Please Select Action Type');
           return false;
       }


       // return false;

       $.ajax({
           url: "{{ route('quizResultSearch') }}",
           type: 'POST',
           data: {
               _token: "{{ csrf_token() }}",
               group: group,
               classId: classId,
               section: section,
               subject_id: subject_id,
               session_id: session_id,
               action_type: action_type,

           },

           success: function(data) {
               $("#filtered-quiz-data").html(data)
               console.log('data', data)

           }

       });
   })
</script>
@endsection