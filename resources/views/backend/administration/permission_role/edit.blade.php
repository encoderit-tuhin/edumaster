@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
					<span class="panel-title">
                        {{ _lang('Update Role') }}
                    </span>
				</div>

                <div class="panel-body">
                    <form method="post" class="validate" autocomplete="off" action="{{ action('RoleController@update', $id) }}"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PATCH">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{{ _lang('Role Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $role->name }}"
                                    required>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">
                                    <h4>{{ __('Permissions') }}</h4>
                                </label>

                                <div class="form-check permission-row ml-3 border-bottom" style="padding-left: 20px;">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1"
                                        {{ App\Permission::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        style="display: block;cursor: pointer; font-weight: bold;color: green;font-size: 14px;"
                                        for="checkPermissionAll">All</label>
                                </div>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    @php
                                        $permissions = App\Permission::getpermissionsByGroupName($group->name);
                                        $j = 1;
                                    @endphp

                                    <div class="row ml-3 permission-row border-bottom">
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="{{ $i }}Management" value="{{ $group->name }}"
                                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                                    {{ App\Permission::roleHasPermissions($role, $permissions) ? 'checked' : '' }} />
                                                <label class="form-check-label text-capitalize"
                                                    for="{{ $i }}Management"
                                                    style="display: block;cursor: pointer;">
                                                    {{ str_replace(['.', '_'], ' ', $group->name) }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-9 role-{{ $i }}-management-checkbox">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-3">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="permissions[]"
                                                            id="checkPermission{{ $permission->id }}"
                                                            value="{{ $permission->name }}"
                                                            {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                        <label class="form-check-label text-capitalize"
                                                            for="checkPermission{{ $permission->id }}">
                                                            {{-- Replace dot and underscore with space --}}
                                                            {{ str_replace(['.', '_'], ' ', $permission->name) }}
                                                        </label>
                                                    </div>
                                                </div>
                                                @php $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>
                                    </div>
                                    @php $i++; @endphp
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">{{ _lang('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('backend.administration.permission_role.scripts')
@endsection
