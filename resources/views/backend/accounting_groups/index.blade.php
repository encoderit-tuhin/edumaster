@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Add New Group') }}
                    </span>
                </div>
                <div class="panel-body">
                    <form action="{{ route('accounting-groups.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! generate_select(
                                    'accounting_category_id',
                                    App\AccountingCategory::orderBy('name', 'asc')->pluck('name', 'id')->toArray(),
                                    __('Account Category'),
                                    get_old_value(null, 'accounting_category_id'),
                                    true,
                                    __('--Select Category--'),
                                    'form-control select2',
                                ) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Accouting Group Name') }}</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info">{{ _lang('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Accounting Group List') }}
                    </span>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('SL No.') }}</th>
                            <th>{{ _lang('Group') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($accountingGroups as $accountingGroup)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $accountingGroup->accountingCategory->name ?? '' }}</td>
                                    <td>{{ $accountingGroup->name }}</td>
                                    <td>
                                        <form action="{{ route('accounting-groups.destroy', $accountingGroup->id) }}"
                                            method="post">
                                            <a href="{{ route('accounting-groups.edit', $accountingGroup->id) }}"
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
