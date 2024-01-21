 <div class="panel panel-default">
     <div class="panel-heading"><span class="panel-title">{{ _lang('Fee Mapping') }}</span></div>

     <div class="panel-body">
         <div class="row">
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
                                <th>{{ _lang('Student ID') }}</th>
                                <th>{{ _lang('Student Roll') }}</th>
                                <th>{{ _lang('Student Name') }}</th>
                                <th>{{ _lang('Fee Head') }}</th>
                                <th>{{ _lang('Waiver') }}</th>
                                <th>{{ _lang('Amount') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($waiverConfigLists as $waiverConfigList)
                                <tr>
                                    <td>{{ $waiverConfigList->student_id }}</td>
                                    <td>{{ $waiverConfigList->roll }}</td>
                                    <td><span style="text-transform: capitalize">{{ $waiverConfigList->first_name }}</span> <span style="text-transform: capitalize">{{ $waiverConfigList->last_name }}</span></td>
                                    <td>{{ $waiverConfigList->name }}</td>
                                    <td>{{ $waiverConfigList->waiver }}</td>
                                    <td>{{ $waiverConfigList->amount }}</td>
                                    <td>
                                       <form action="{{ route('waiver-config.destroy', $waiverConfigList->id) }}" method="post">
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
