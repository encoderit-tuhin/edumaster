 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Configure Absent Fine Form') }}</span></div>

     <div class="panel-body">
         <div class="row">
             <div class="col-lg-4">
                 <form method="post" class="" action="{{ route('absent-fines.store') }}">
                     {{ csrf_field() }}

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Class') }}</label>
                             <select name="class_ids[]" class="form-control select2" multiple>
                                 <option value="">{{ _lang('Select One') }}</option>
                                 {{ create_option('classes', 'id', 'class_name', old('class_ids')) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Period') }}</label>
                             <select name="period_ids[]" class="form-control select2" multiple>
                                 <option value="">{{ _lang('Select One') }}</option>
                                 {{ create_option('periods', 'id', 'period', old('period_ids')) }}
                             </select>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Amount') }}</label>
                             <input name="amount" class="form-control" required />
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
                                 <th>{{ _lang('Class') }}</th>
                                 <th>{{ _lang('Period') }}</th>
                                 <th>{{ _lang('Amount') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>
                         <tbody>

                             @foreach ($absentFines as $absentFine)
                                 <tr>
                                     <td>{{ $absentFine->class->class_name }}</td>
                                     <td>{{ $absentFine->period->period }}</td>
                                     <td>{{ $absentFine->fee_amount }}</td>
                                     <td>
                                        <form action="{{ route('absent-fines.destroy', $absentFine->id) }}" method="post">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm show_confirm"><i
                                                        class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form>
                                         {{-- <form action="{{ route('fee-head.destroy', $absentFine->id) }}" method="post">
                                             <a href="{{ route('fee-head.edit', $absentFine->id) }}"
                                                 data-title="{{ _lang('Update Fee Type') }}"
                                                 class="btn btn-warning btn-sm ajax-modal">{{ _lang('Edit') }}</a>
                                             <a href="{{ route('fee-head.show', $absentFine->id) }}"
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
