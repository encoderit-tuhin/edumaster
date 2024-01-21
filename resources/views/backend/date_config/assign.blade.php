 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Student Accounts Date Config') }}</span></div>

     <div class="panel-body">
         <div class="row">
             <div class="col-lg-4">
                 <form method="post" class="" autocomplete="off" action="{{ route('date-config.store') }}">
                     {{ csrf_field() }}

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Academic Year') }}</label>
                             <select class="form-control select2" name="academic_year" required>
                                 {{ create_option('academic_years', 'id', 'session', get_option('academic_year')) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Fee Head') }}</label>

                             <select name="fee_head_id" class="form-control select2">
                                 <option value="">Select Head</option>
                                 {!! create_option('fee_heads', 'id', 'name', isset($feeMap) ? $feeMap->fee_head_id : old('fee_head_id')) !!}
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                         </div>
                     </div>
                 </form>
             </div>
             <div class="col-lg-8">
                 <div class="panel-body">
                     @if (\Session::has('success'))
                         <div class="alert alert-success">
                             <p>{{ \Session::get('success') }}</p>
                         </div>
                         <br />
                     @endif

                     <form method="post" class="" autocomplete="off"
                         action="{{ route('fee-date-config.store') }}">
                         {{ csrf_field() }}

                         <table class="table table-bordered">
                             <thead>
                                 <tr>
                                     <th>{{ _lang('Fee Sub Head') }}</th>
                                     <th>{{ _lang('Fee Payable Date') }}</th>
                                     <th>{{ _lang('Fine Active Date') }}</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @if (isset($feeMapFeeSubHeads))
                                     @foreach ($feeMapFeeSubHeads as $feeMapFeeSubHead)
                                         <tr>
                                             <td>{{ $feeMapFeeSubHead->name }}</td>
                                             <td>
                                                 <input type="hidden" name="fee_sub_head_id[]"
                                                     value="{{ $feeMapFeeSubHead->fee_sub_head_id }}">

                                                 <input type="text" class="form-control datepicker"
                                                     name="payable_date[]" value="{{ old('payable_date') }}" required>
                                             </td>
                                             <td>
                                                 <input type="text" class="form-control datepicker"
                                                     name="fine_active_date[]" value="{{ old('fine_active_date') }}"
                                                     required>
                                             </td>
                                         </tr>
                                     @endforeach
                                 @endif

                                 <tr>
                                     <td colspan="3" class="text-right">
                                         <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                                     </td>
                                 </tr>
                             </tbody>


                         </table>
                     </form>




                 </div>
             </div>
         </div>

     </div>
 </div>
