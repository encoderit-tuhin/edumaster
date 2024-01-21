@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                        <span class="panel-title">{{ _lang('Staffs List') }}</span>
                    <div class="pull-right" style="text-align: right;">
                        <a href="{{ route('staffs.create') }}" class="btn btn-info btn-sm">{{ _lang('Add New Staff') }}</a>
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
                            <th>{{ _lang('Designation') }}</th>
                            <th>{{ _lang('Blood Group') }}</th>
                            <th>{{ _lang('Status') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $data)
                                <tr>
                                    <td><img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                            alt=""></td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->user->phone ?? '--' }}</td>
                                    <td>{{ $data->user->password_static ?? '--' }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->designation }}</td>
                                    <td>{{ $data->blood }}</td>
                                    <td>
                                        <span class="badge {{ $data->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                        {{-- {{ $data->status == 1 ? 'Active' : 'Inactive' }}
                                        <br>
                                        <form action="{{ route('staffs.updateStatus') }}" method="post">
                                            @csrf
                                            <input type="number" value="{{ $data->user_id }}" name="id" hidden>
                                            <input type="hidden" name="status" value="{{ $data->status == 1 ? 0 : 1 }}">
                                            <button type="submit"
                                                class="btn btn-sm {{ $data->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                                {{ $data->status == 1 ? 'Disable' : 'Enable' }}
                                            </button>

                                        </form> --}}
                                    </td>
                                    <td>
                                        {{-- <form action="{{ route('staffs.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('staffs.show', $data->id) }}" class="btn btn-info btn-xs"><i
                                                    class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="{{ route('staffs.edit', $data->id) }}"
                                                class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
                                                    class="fa fa-trash" aria-hidden="true"></i></button>
                                        </form> --}}
                                        <div class="dropdown" id="actionDropDown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                {{ _lang('Action') }}
                                            </a>
                                            <ul class="dropdown-menu notification-items">
                                                <li>
                                                    <a href="{{ route('staffs.show', $data->id) }}"
                                                        class="dropdown-item"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        {{ _lang('View') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('staffs.edit', $data->id) }}"
                                                        class="dropdown-item">
                                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                                        {{ _lang('Edit') }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('staffs.destroy', $data->id) }}"
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
                                                    <form action="{{ route('staffs.updateStatus') }}" method="post">
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
