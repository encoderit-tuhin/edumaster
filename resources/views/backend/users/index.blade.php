@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    <span class="panel-title">{{ _lang('Users') }}</span>
                    <div class="pull-right">
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i> {{ _lang('Add New User') }}
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('Profile') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Email') }}</th>
                            <th>{{ _lang('User Type') }}</th>
                            <th>{{ _lang('Assigned Roles') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($users as $data)
                                <tr>
                                    <td><img src="{{ asset('uploads/images/' . $data->image) }}" width="50px"
                                            alt="">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->user_type }}</td>
                                    <td>
                                        @forelse ($data->roles as $role)
                                            <span class="label label-primary">{{ $role->name }}</span>
                                        @empty
                                            <span class="label label-danger">{{ _lang('N/A') }}</span>
                                        @endforelse
                                    </td>
                                    <td>
                                        <form action="{{ route('users.destroy', $data->id) }}" method="post">
                                            <a href="{{ route('users.show', $data->id) }}"
                                                class="btn btn-info btn-xs ajax-modal"><i class="fa fa-eye"
                                                    aria-hidden="true"></i></a>
                                            <a href="{{ route('users.edit', $data->id) }}"
                                                class="btn btn-warning btn-xs"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i></a>
                                            {{ method_field('DELETE') }}
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs btn-remove"><i
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
@endsection
