 <div class="panel panel-default">

     <div class="panel-body">
         <div class="row justify-content-center">
             <div class="col-lg-6">
                 <form method="get" class="" autocomplete="off">
                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Student ID') }}</label>
                             <input class="form-control" type="number" name="student_id"
                                 value="{{ old('student_id') }}" placeholder="Student ID" required />
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                         </div>
                     </div>
                 </form>
             </div>

             <div class="col-lg-12">
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
                                 {{-- @if (isset($feeMapFeeSubHeads))
                                     @foreach ($feeMapFeeSubHeads as $feeMapFeeSubHead)
                                         <tr>
                                             <td>{{ $feeMapFeeSubHead->name }}</td>
                                             <td>
                                                 <input type="hidden" name="fee_sub_head_id"
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
                                 @endif --}}

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
