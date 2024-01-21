@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title" >
					{{_lang('Book Issues Filter')}}
				</div>
			</div>
			<div class="panel-body">
				<form id="search_form" class="params-panel validate" action="{{ url('bookissues/filter/all') }}" method="post" autocomplete="off" accept-charset="utf-8">
					@csrf
					<div class="col-md-4">
						<div class="form-group">
							<label for="status_id" class="control-label">{{ _lang('Filter By Status') }}</label>
							<select name="status_id" class="form-control select2">
								<option value=""  {{$idSelect == '' ?? 'selected'}}>{{ _lang('Select one') }}</option>
								<option value="0" {{$idSelect == '0' ? 'selected' : ''}}>{{ _lang('ALL') }}</option>
								<option value="1" {{$idSelect == '1' ? 'selected' : ''}}>{{ _lang('OPEN') }}</option>
								<option value="2" {{$idSelect == '2' ? 'selected' : ''}}>{{ _lang('RETURNED') }}</option>
							</select>
						</div>
					</div>
                    <div class="col-md-4">
						<div class="form-group">
							<label for="user_id" class="control-label">{{ _lang('Filter By  ID') }}</label>
                            <input type="text" class="form-control" name="user_id" placeholder="Enter ID">
						</div>
					</div>
					<div class="col-md-2">
						<input class="btn btn-primary btn-block rect-btn" style="margin-top:24px" value="Search" type="submit">
					</div>
				</form>
				@if( !empty($issues) )
				<div class="col-md-12 mt-5">
					<table class="table table-bordered data-table">
						<thead>
							<tr>
								<th>#</th>
								<th>{{_lang('Book Name')}}</th>
								<th>{{_lang('Type')}}</th>
								<th>{{_lang('ID')}}</th>
								<th>{{_lang('Name')}}</th>
								<th>{{_lang('Phone')}}</th>
								<th>{{_lang('Issue Date')}}</th>
								<th>{{_lang('Status')}}</th>
								<th>{{_lang('Return Date')}}</th>
							</tr>
						</thead>
						<tbody>
							@php $i=1; @endphp
							@foreach($issues AS $data)
							<tr>
								<td>{{$i}}</td>
								<td>{{$data->book_name}}</td>
								<td>{{$data->type}}</td>
								<td>
                                    @if (!empty($data->student_id))
                                        {{$data->student_id}}
                                    @elseif (!empty($data->teacher_id))
                                        {{$data->teacher_id}}
                                    @else
                                        {{$data->staff_id}}
                                    @endif
                                </td>
								<td>
                                    @if (!empty($data->student_id))
                                        <span style="text-transform: capitalize">{{$data->student_first_name}}</span> <span style="text-transform: capitalize">{{$data->student_last_name}}</span>
                                    @elseif (!empty($data->teacher_id))
									<span style="text-transform: capitalize">{{$data->teacher_name}}</span>
                                    @else
									<span style="text-transform: capitalize">{{$data->staff_name}}</span>
                                    @endif
                                </td>
								<td>
                                    @if (!empty($data->student_id))
                                        {{$data->student_phone}}
                                    @elseif (!empty($data->teacher_id))
										{{$data->teacher_phone}}
                                    @else
										{{$data->staff_phone}}
                                    @endif
                                </td>
								<td>{{$data->issue_date}}</td>
								<td>
									@if($data->status == '1') 
										<span class="badge badge-danger">{{_lang('Open')}}</span>
									@else 
										<span class="badge badge-success">{{'Returned'}}</span> 
									@endif
								</td>
								<td>{{$data->return_date}}</td>
							</tr>
							@php $i++; @endphp
							@endforeach
						</tbody>
					</table>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection