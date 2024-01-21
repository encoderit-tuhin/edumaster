 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Fee Fine Map') }}</span></div>

     <div class="panel-body">
         <div class="row">
             <div class="col-lg-4">
                 {{-- appsvan-submit params-panel --}}
                 <form method="post" class="" autocomplete="off" action="{{ route('fees-mapping.store') }}">
                     {{ csrf_field() }}

                     <input type="hidden" name="type" value="fee_fine">

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Fee Head') }}</label>

                             <select name="fee_head_id" class="form-control select2" required>
                                 <option value="">Select Head</option>
                                 {{ create_option('fee_heads', 'id', 'name', old('fee_head_id')) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Ledger') }}</label>

                             <select name="ledger_id" class="form-control select2" required>
                                 <option value="">Select Ledger</option>
                                 {{ create_option('accounting_ledgers', 'id', 'ledger_name', old('ledger_id')) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Fund') }}</label>

                             <select name="fund_id" class="form-control select2" required>
                                 <option value="">Select Fund</option>
                                 {{ create_option('accounting_funds', 'id', 'name', old('fund_id')) }}
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
                     <table class="table table-bordered data-table">
                         <thead>
                             <tr>
                                 <th>{{ _lang('Head') }}</th>
                                 <th>{{ _lang('Ledger') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($fee_fine_mapping as $fee_map)
                                 <tr>
                                     <td>{{ $fee_map->feeHead->name }}</td>
                                     <td>{{ $fee_map->feeLedger->ledger_name }}</td>
                                     <td>
                                        <form action="{{ route('fees-mapping.destroy', $fee_map->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                         {{-- <form action="{{ route('fees-mapping.destroy', $fee_map->id) }}"
                                             method="post">
                                             <a href="{{ route('fees-mapping.edit', $fee_map->id) }}"
                                                 data-title="{{ _lang('Update Fee Type') }}"
                                                 class="btn btn-warning btn-sm ajax-modal">{{ _lang('Edit') }}</a>
                                             {{ csrf_field() }}
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
