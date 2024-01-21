@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Leave List') }}</span>
                    <div class="pull-right" style="text-align: right;">
                        <a href="{{ route('leave.create') }}"
                            class="btn btn-info btn-sm">{{ _lang(' Leave Application') }}</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Student Name') }}</th>
                            <th>{{ _lang('Reason') }}</th>
                            <th>{{ _lang('From date') }}</th>
                            <th>{{ _lang('To date') }}</th>
                            <th>{{ _lang('Leave Type ') }}</th>
                            <th>{{ _lang('Submit  Date ') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($leaves as $data)
                                <tr>
                                    @isset($data->student)
                                        <td>
                                            {{ $data->student->first_name }}
                                            {{ $data->student->last_name }}
                                        </td>
                                    @endisset
                                    <td>{{ $data->reason }}</td>
                                    <td>{{ $data->from_date }}</td>
                                    <td>{{ $data->to_date }}</td>
                                    <td>{{ $data->leave_type_name }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>
                                        @if ($data->status == 'pending')
                                            <span class='text-info text-uppercase'>{{ $data->status }}</span>
                                        @elseif ($data->status == 'approved')
                                            <span class='text-success text-uppercase'>{{ $data->status }}</span>
                                        @elseif ($data->status == 'rejected')
                                            <span class='text-danger text-uppercase'>{{ $data->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <form action="{{ route('leave.updateStatus', $data->id) }}" method="post">
                                            @csrf
                                            @if ($data->status === 'pending')
                                                <button type="submit" value="Approved" name="status"
                                                    class="btn btn-success btn-xs btn-remove">
                                                    <i class="fa fa-check" aria-hidden="true" title="Approved"></i>
                                                </button>
                                            @endif

                                            <a href="{{ route('leave.edit', $data->id) }}" class="btn btn-warning btn-xs"
                                                title="View">
                                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                            </a>

                                            @if ($data->status === 'pending')
                                                <button type="submit" value="Rejected" name="status"
                                                    class="btn btn-danger btn-xs btn-remove">
                                                    <i title="Reject" class="fa fa-times" aria-hidden="true"></i>
                                                </button>
                                            @endif
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
@endsection
