 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Fees Sub Head') }}</span></div>

     <div class="panel-body">
         <div class="row">
             <div class="col-lg-4">
                 {{-- appsvan-submit params-panel --}}
                 <form method="post" class="" autocomplete="off" action="{{ route('fee-sub-head.store') }}">
                     {{ csrf_field() }}

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Name') }}</label>
                             <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                 required>
                         </div>
                     </div>

                     <div class="col-md-12">
                         <div class="form-group">
                             <label class="control-label">{{ _lang('Serial') }}</label>
                             <input type="number" class="form-control" name="serial" value="{{ old('serial') }}">
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
                                 <th>{{ _lang('Serial') }}</th>
                                 <th>{{ _lang('Name') }}</th>
                                 <th>{{ _lang('Action') }}</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($fee_sub_heads as $fee_sub_head)
                                 <tr id="row_{{ $fee_sub_head->id }}">
                                     <td>{{ $fee_sub_head->serial }}</td>
                                     <td>{{ $fee_sub_head->name }}</td>
                                     <td>
                                         <form action="{{ route('fee-sub-head.destroy', $fee_sub_head->id) }}"
                                             method="post">
                                             {{-- <button type="button" class="btn btn-warning btn-sm"
                                                 id="editButton{{ $fee_sub_head->id }}">{{ _lang('Edit') }}</button> --}}
                                             {{ csrf_field() }}
                                             <input name="_method" type="hidden" value="DELETE">

                                             <button class="btn btn-danger btn-sm show_confirm"
                                                 type="submit">{{ _lang('Delete') }}</button>
                                         </form>
                                     </td>
                                 </tr>

                                 {{-- <div class="modal fade" id="editModal{{ $fee_sub_head->id }}" role="dialog"
                                     aria-labelledby="editModal{{ $fee_sub_head->id }}Label" aria-hidden="true">
                                     <div class="modal-dialog" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title" id="editModal{{ $fee_sub_head->id }}Label">
                                                     {{ _lang('Edit Fee Type') }}</h5>
                                                 <button type="button" class="close" data-dismiss="modal"
                                                     aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <form id="editForm" method="post"
                                                 action="{{ route('fee-sub-head.update', 0) }}">
                                                 {{ csrf_field() }}
                                                 {{ method_field('PATCH') }}
                                                 <div class="modal-body">
                                                     <div class="form-group">
                                                         <label class="control-label">{{ _lang('Name') }}</label>
                                                         <input type="text" class="form-control" name="name"
                                                             id="edit_name" required>
                                                     </div>
                                                     <div class="form-group">
                                                         <label class="control-label">{{ _lang('Serial') }}</label>
                                                         <input type="number" class="form-control" name="serial"
                                                             id="edit_serial">
                                                     </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                         data-dismiss="modal">{{ _lang('Close') }}</button>
                                                     <button type="submit"
                                                         class="btn btn-primary">{{ _lang('Save Changes') }}</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div> --}}
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>

     </div>
 </div>
