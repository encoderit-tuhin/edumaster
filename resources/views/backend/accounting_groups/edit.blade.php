@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Group') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('accounting-groups.update', $accountingGroup->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}

                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! generate_select(
                                    'accounting_category_id',
                                    App\AccountingCategory::orderBy('name', 'asc')->pluck('name', 'id')->toArray(),
                                    __('Account Category'),
                                    get_old_value($accountingGroup->accountingCategory->name ?? '', 'accounting_category_id'),
                                    true,
                                    __('--Select Category--'),
                                    'form-control select2',
                                ) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $accountingGroup->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Code') }}</label>
                                <input type="number" class="form-control" min="1" name="code" required
                                    value="{{ $accountingGroup->code }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-info">{{ _lang('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
