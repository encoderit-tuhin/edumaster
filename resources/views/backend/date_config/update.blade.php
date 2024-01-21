 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Student Accounts Date Config') }}</span></div>

     <div class="panel-body">
         <div class="row">
             {{-- <div class="col-lg-4">
                 <form method="post" class="appsvan-submit params-panel" autocomplete="off"
                     action="{{ url('administration/general_settings/update') }}">
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
                                 {{ create_option('fee_heads', 'id', 'name', old('fee_head_id')) }}
                             </select>
                         </div>
                     </div>

                     <div class="form-group">
                         <div class="col-md-12">
                             <button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
                         </div>
                     </div>
                 </form>
             </div> --}}
             <div class="col-lg-8">
                 <div class="panel-body">
                     @if (\Session::has('success'))
                         <div class="alert alert-success">
                             <p>{{ \Session::get('success') }}</p>
                         </div>
                         <br />
                     @endif
                     <table class="table table-bordered data-table">
                         <thead>
                             <tr>
                                 <th>{{ _lang('Fee Sub Head') }}</th>
                                 <th>{{ _lang('Fee Payable Date') }}</th>
                                 <th>{{ _lang('Fine Active Date') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($fee_date_configs as $fee_date_config)
                                 <tr>
                                     <td>{{ $fee_date_config->fee_sub_head_name }}</td>
                                     <td>{{ $fee_date_config->payable_date_start }}</td>
                                     <td>{{ $fee_date_config->payable_date_end }}</td>
                                     <td>
                                        <form action="{{ route('date-config.destroy', $fee_date_config->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>

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
