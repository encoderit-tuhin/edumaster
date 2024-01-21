 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Amount Fee Mapping') }}</span></div>

     <div class="panel-body">
         <form method="post" class="validate" autocomplete="off" action="{{ route('fees.store') }}">
             @csrf
             <div class="row">
                 <div class="col-lg-6">
                     <div class="form-group">
                         <label class="control-label">{{ _lang('Class') }}</label>
                         <select name="class_id" class="form-control select2">
                             <option value="">{{ _lang('Select One') }}</option>
                             {{ create_option('classes', 'id', 'class_name', old('class')) }}
                         </select>
                     </div>

                     <div class="form-group mb-5">
                         <label class="control-label">{{ _lang('Section') }}</label>
                         <select name="section_id" class="form-control select2" id="">
                             <option value="">{{ _lang('Select One') }}</option>
                             @foreach ($sections as $data)
                                 <option data-class="{{ $data->class_id }}" value="{{ $data->id }}">
                                     {{ $data->section_name }}
                                 </option>
                             @endforeach
                         </select>
                     </div>

                     <div class="form-group mt-5">
                         <label class="control-label">{{ _lang('Group') }}</label>
                         <select name="group_id" id="group" class="form-control select2">
                             <option value="">{{ _lang('Select One') }}</option>
                             {{ create_option('student_groups', 'id', 'group_name', old('group')) }}
                         </select>
                     </div>

                     <div class="form-group mt-5">
                         <label class="control-label">{{ _lang('Student Category') }}</label>
                         <select name="student_category_id" id="student_category" class="form-control select2">
                             <option value="">{{ _lang('Select One') }}</option>
                             {{ create_option('student_categories', 'id', 'name', old('name')) }}
                         </select>
                     </div>

                     <div class="form-group">
                         <label class="control-label">{{ _lang('Fee Head') }}</label>

                         <select name="fee_head_id" class="form-control select2">
                             <option value="">Select Head</option>
                             {{ create_option('fee_heads', 'id', 'name', old('fee_head_id')) }}
                         </select>
                     </div>

                     <div class="form-group">
                         <label class="control-label">{{ _lang('Fee Amount') }}</label>
                         <input name="fee_amount" class="form-control" required />
                     </div>

                     <div class="form-group">
                         <label class="control-label">{{ _lang('Fine Amount') }}</label>
                         <input name="fine_amount" class="form-control" />
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-6">
                     <div class="panel-body">
                         <div class="card card-body">
                             <h4 class="p-0 m-0 pb-4 border-bottom mb-4">Fee Fund Distribution</h4>

                             <label class="control-label">{{ _lang('Fund') }}</label>

                             <select name="fund" id="fund" class="form-control select2" required>
                                 <option value="">{{ __('--Select Fund--') }}</option>
                                 {{ create_option('accounting_funds', 'id', 'name', old('fund')) }}
                             </select>
                         </div>
                     </div>
                 </div>
             </div>
         </form>

         <div class="row">
             <div class="col-lg-12">
                 <div class="panel-body">
                     @if (\Session::has('success'))
                         <div class="alert alert-success">
                             <p>{{ \Session::get('success') }}</p>
                         </div>
                         <br />
                     @endif

                     <h4>Assigned Fee List</h4>

                     <table class="table table-bordered data-table">
                         <thead>
                             <tr>
                                 <th>{{ _lang('Class') }}</th>
                                 <th>{{ _lang('Group') }}</th>
                                 <th>{{ _lang('Category') }}</th>
                                 <th>{{ _lang('Fee Head') }}</th>
                                 <th>{{ _lang('Fee Amount') }}</th>
                                 <th>{{ _lang('Fine Amount') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($fees as $fee)
                                 <tr>
                                     <td>{{ $fee->class->class_name }}</td>
                                     <td>{{ $fee->group->group_name }}</td>
                                     <td>{{ $fee->studentCategory->name }}</td>
                                     <td>{{ $fee->feeHead->name ?? null }}</td>
                                     <td>{{ $fee->fee_amount }}</td>
                                     <td>{{ $fee->fine_amount }}</td>
                                     <td>
                                        <form action="{{ route('fees.destroy', $fee->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                         {{-- <form action="{{ route('fee-head.destroy', $fee->id) }}" method="post">
                                             <a href="{{ route('fee-head.edit', $fee->id) }}"
                                                 data-title="{{ _lang('Update Fee Type') }}"
                                                 class="btn btn-warning btn-sm ajax-modal">{{ _lang('Edit') }}</a>
                                             <input name="_method" type="hidden" value="DELETE">
                                             <button class="btn btn-danger btn-sm btn-remove"
                                                 type="submit">{{ _lang('Delete') }}</button>
                                         </form> --}}
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

     </div>
 </div>

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
         });
     </script>
 @stop
