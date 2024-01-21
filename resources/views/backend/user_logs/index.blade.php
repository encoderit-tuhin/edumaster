@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('User Logs List') }}
                    </span>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('User') }}</th>
                            <th>{{ _lang('IP Address') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($userLogs as $userLog)
                                <tr>

                                    <td>{{ $data->user_id }}</td>
                                    <td>{{ $data->ip_address }}</td>

                                    <td>
                                        <a href="{{ route('user-logs.edit', $data->id) }}" class="btn btn-danger btn-xs"><i
                                                class="fa fa-trash" aria-hidden="true"></i></a>
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
