@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Teachers List') }}</span>
                    <div class="pull-right" style="text-align: right;">
                        <a href="{{ route('teachers.create') }}"
                            class="btn btn-info btn-sm">{{ _lang('Add New Teacher') }}</a>
                    </div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Profile') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Phone') }}</th>
                            <th>{{ _lang('Password') }}</th>
                            <th>{{ _lang('Email') }}</th>
                            <th>{{ _lang('Department') }}</th>
                            <th>{{ _lang('Designation') }}</th>
                            <th>{{ _lang('Blood Group') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($teachers as $data)
                                <tr>
                                    <td><img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                            alt=""></td>
                                    <td>{{ $data->name }}</td>
                                    <td>
                                        {{ $data->user->phone ?? '--' }}
                                    </td>
                                    <td>
                                        {{ $data->user->password_static ?? '--' }}
                                    </td>
                                    <td>{{ $data->user->email ?? '--' }}</td>
                                    <td>{{ $data->department->department_name ?? '--' }}</td>
                                    <td>{{ $data->designation ?? '--' }}</td>
                                    <td>{{ $data->blood ?? '--' }}</td>
                                    <td>
                                        <span class="badge {{ $data->teacher_status == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $data->teacher_status == 1 ? 'Enable' : 'Disable' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="dropdown" id="actionDropDown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                {{ _lang('Action') }}
                                            </a>
                                            <ul class="dropdown-menu notification-items">
                                                <li>
                                                    <a href="{{ route('teachers.show', $data->id) }}"
                                                        class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        {{ _lang('View') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('teachers.edit', $data->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        {{ _lang('Edit') }}
                                                    </a>
                                                </li>

                                                <li>
                                                    @if ($data->teacher_status == 1)
                                                        <a href="{{ route('teacher.status-disable', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            {{ _lang('Disable') }}
                                                        </a>
                                                    @endif

                                                    @if ($data->teacher_status == 0)
                                                        <a href="{{ route('teacher.status-enable', $data->id) }}"
                                                            class="dropdown-item">
                                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                                            {{ _lang('Enable') }}
                                                        </a>
                                                    @endif
                                                </li>

                                                <li>
                                                    <form action="{{ route('teachers.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"
                                                            onclick="return confirm('Are you sure to delete ?')">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <form action="{{ route('teachers.updateStatus') }}" method="post">
                                                        @csrf
                                                        <input type="number" value="{{ $data->user_id }}" name="id"
                                                            hidden>
                                                        <input type="hidden" name="status"
                                                            value="{{ $data->status == 1 ? 0 : 1 }}">
                                                        <button type="submit" class="dropdown-item">
                                                            @if ($data->status != 1)
                                                                <i class="fa fa-check" aria-hidden="true"></i>
                                                            @else
                                                                <i class="fa fa-times" aria-hidden="true"></i>
                                                            @endif
                                                            {{ $data->status == 1 ? 'De-activate' : 'Activate' }}
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
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
