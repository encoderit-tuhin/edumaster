@extends('layouts.backend')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ _lang('Update Category') }}
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('accounting-categories.update', $accountingCategory->id) }}" autocomplete="off"
                        class="form-horizontal form-groups-bordered validate" method="post" accept-charset="utf-8">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Name') }}</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $accountingCategory->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <label class="control-label">{{ _lang('Code') }}</label>
                                <input type="number" class="form-control" min="1" name="code" required
                                    value="{{ $accountingCategory->code }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                {!! generate_select(
                                    'type',
                                    App\AccountingType::getAccountingTypes(),
                                    __('Type'),
                                    $accountingCategory->type,
                                    true,
                                    __('--Select Type--'),
                                    'form-control'
                                ) !!}
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
