@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default no-export">
                <div class="panel-heading">
					<span class="panel-title">
						{{ _lang('Roles') }}
					</span>
                    <a class="btn btn-primary btn-sm pull-right ajax-modal" data-title="{{ _lang('Add Permission Role') }}"
                        href="{{ route('permission_roles.create') }}">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>{{ _lang('Add New Role') }}
                    </a>
                </div>

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
                                <th>{{ _lang('Role Name') }}</th>
                                <th>{{ _lang('Total Permissions') }}</th>
                                <th>{{ _lang('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr id="row_{{ $role->id }}">
                                    <td>{{ $role->name }}</td>
                                    <td class='mx-2 badge bg-primary'>{{ $role->permissions->count() ?? '0' }}</td>
                                    <td>
                                        @php
                                            ob_start();
                                        @endphp
                                        <li>
                                            <a href="{{ action('RoleController@edit', $role['id']) }}"
                                                data-title="{{ _lang('Update Permission Role') }}"
                                                class="dropdown-item ajax-modal">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> {{ _lang('Edit') }}
                                            </a>
                                        </li>
                                        <li>
                                            <button class="dropdown-item p-3" type="submit"
                                                onclick="return confirm('Are you sure to delete ?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i> {{ _lang('Delete') }}
                                            </button>
                                        </li>
                                        @php
                                            $dropdownActions = ob_get_clean();
                                        @endphp

                                        <form action="{{ action('RoleController@destroy', $role['id']) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            @include('backend.partials.actions', [
                                                'dropdownActions' => $dropdownActions,
                                            ])
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
