@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default" data-collapsed="0">
                <div class="panel-heading">
                    <span class="panel-title">
                        {{ _lang('Add New Category') }}
                    </span>
                </div>
                <div class="panel-body">

                    <form action="{{ route('accounting-categories.store') }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Accouting Category Name') }}</label>
                                <input type="text" class="form-control" name="name" required
                                    value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Code') }}</label>
                                <input type="number" class="form-control" name="code" min="1"
                                    value="{{ old('code') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! generate_select(
                                    'type',
                                    App\AccountingType::getAccountingTypes(),
                                    __('Type'),
                                    old('type'),
                                    true,
                                    __('--Select Type--'),
                                    'form-control'
                                ) !!}
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
                        {{ _lang('Accounting Category List') }}
                    </span>
                </div>
                <div class="panel-body no-export">
                    <table class="table table-bordered data-table">
                        <thead>
                            <th>{{ _lang('SL No.') }}</th>
                            <th>{{ _lang('Name') }}</th>
                            <th>{{ _lang('Code') }}</th>
                            <th>{{ _lang('Action') }}</th>
                        </thead>
                        <tbody>
                            @foreach ($accountingCategories as $accountingCategory)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $accountingCategory->name }}</td>
                                    <td>{{ $accountingCategory->code }}</td>
                                    <td>
                                        <form
                                            action="{{ route('accounting-categories.destroy', $accountingCategory->id) }}"
                                            method="post">
                                            <a href="{{ route('accounting-categories.edit', $accountingCategory->id) }}"
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
