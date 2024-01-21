 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Digital Fees Config') }}</span></div>

     <div class="panel-body">
         <div class="row">
             <div class="col-lg-12">
                 {{-- appsvan-submit params-panel --}}
                 <form method="post" class="" autocomplete="off" action="{{ route('digital-fee-configs.store') }}">
                     {{ csrf_field() }}

                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Account No.') }}</label>

                             <select name="bank_account_id" class="form-control select2" required>
                                 <option value="">Select Account</option>
                                 @foreach ($bank_accounts as $bank_account)
                                     <option value="{{ $bank_account->id }}">{{ $bank_account->bank }} -
                                         {{ $bank_account->account_no }}
                                     </option>
                                 @endforeach
                             </select>
                         </div>
                     </div>

                     <div class="col-md-6">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Ledger') }}</label>

                             <select name="ledger_id" class="form-control select2" required>
                                 <option value="">Select Ledger</option>
                                 @foreach ($accountingLedgers as $accountingLedger)
                                     <option value="{{ $accountingLedger->id }}">
                                         {{ $accountingLedger->ledger_name }}
                                     </option>
                                 @endforeach
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

             <div class="col-lg-12">
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
                                 <th>{{ _lang('Account Holder Name') }}</th>
                                 <th>{{ _lang('Bank Name') }}</th>
                                 <th>{{ _lang('Branch') }}</th>
                                 <th>{{ _lang('Select Account No.') }}</th>
                                 <th>{{ _lang('Ledger Name') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>

                         <tbody>
                             @foreach ($digitalFeeConfigs as $digitalFeeConfig)
                                 <tr>
                                     <td>{{ $digitalFeeConfig->bankAccount->acc_holder_name }}</td>
                                     <td>{{ $digitalFeeConfig->bankAccount->bank }}</td>
                                     <td>{{ $digitalFeeConfig->bankAccount->branch }}</td>
                                     <td>{{ $digitalFeeConfig->bankAccount->account_no }}</td>
                                     <td>{{ $digitalFeeConfig->accountingLedger->ledger_name }}</td>
                                     <td>

                                        <form action="{{ route('digital-fee-configs.destroy', $digitalFeeConfig->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                         {{-- <form action="{{ route('fee-head.destroy', $digitalFeeConfig->id) }}"
                                             method="post">
                                             <a href="{{ route('fee-head.edit', $digitalFeeConfig->id) }}"
                                                 data-title="{{ _lang('Update Fee Type') }}"
                                                 class="btn btn-warning btn-sm ajax-modal">{{ _lang('Edit') }}</a>
                                             <a href="{{ route('fee-head.show', $digitalFeeConfig->id) }}"
                                                 data-title="{{ _lang('View Fee Type') }}"
                                                 class="btn btn-info btn-sm ajax-modal">{{ _lang('View') }}</a>
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
